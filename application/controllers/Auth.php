<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CRUD - Login';
            $this->load->view('auth/login', $data);
        } else {
            // fungsi proses login
            $this->__login();
        }
    }

    private function __login()
    {
        // proses login inputan email & password
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // memanggil data dari tabel user untuk email yang login
        $user = $this->User_model->getUserByEmail($email);

        // jika user ada 
        if ($user) {
            // jika user aktif
            if ($user['user_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data); // mengambil data session yang login
                    if ($user['role_id'] == 1) {
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CRUD - Registration';
            $this->load->view('auth/registration', $data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'user_active' => 0, // 1 = aktif | 2 = non-aktif
                'role_id' => 1 // 1 = admin | 2 = user
            ];
            // generate token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'created_date' => time() // waktu sekarang
            ];
            $this->User_model->insertUser($data);
            $this->User_model->insertUserToken($user_token);
            // fungsi kirim email untuk aktivasi email
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Successfuly registration. Enjoy your explore!</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        //konfigurasi email
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'testappnamrid@gmail.com',
            'smtp_pass' => 'PVjVftVoFhkXtBftB0j6',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->email->initialize($config);
        $this->email->from('testappnamrid@gmail.com', 'CRUD Admin');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click <a href=' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '>here</a> to verify your account.');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">here</a> to reset your password.');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->User_model->getUserByEmail($email);

        // jika user ada
        if ($user) {
            $user_token = $this->User_model->getUserTokenByToken($token);
            // jika token ada
            if ($user_token) {
                // jika token expired
                if (time() - $user_token['created_date'] < 60 * 60 * 12) { // waktu sekarang - value dari attrb created_date dimana kurang dari 12 jam maka token dianggap expired
                    $this->User_model->updateUserActive($email);
                    $this->User_model->deleteUserToken($email);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->User_model->deleteUserToken($email);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Activation failed. Token invalid!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Activation failed. Email not registered!</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'CRUD - Forgot Password';
            $this->load->view('auth/forgotpassword', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->User_model->getUserByActive($email);

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'created_date' => time()
                ];
                $this->User_model->insertUserToken($user_token);
                // fungsi kirim email untuk verifikasi lupa password
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->User_model->getUserByEmail($email);

        if ($user) {
            $user_token = $this->User_model->getUserTokenByToken($token);
            if ($user_token) {
                if (time() - $user_token['created_date'] < 60 * 60 * 12) { // waktu sekarang - value dari attrb created_date dimana kurang dari 12 jam maka token dianggap expired
                    // membuat session sementara untuk reset password yang hanya bisa diakses melalui link reset password pada email user
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Reset password failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password failed! Wrong token!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password failed. Wrong email!</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        // menendang paksa user yang ingin reset password tanpa melalui email yang terdaftar
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'CRUD - Change Password';
            $this->load->view('auth/changepassword');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->User_model->updatePassword($email, $password);
            $this->User_model->deleteUserToken($email);
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed please login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!</div>');
        redirect('auth');
    }
}
