<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_model', 'Login_model']);
    }

    public function index()
    {
        session_check_is_login();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'TEST - Login';
            $this->load->view('auth/login', $data);
        } else {
            // fungsi proses login
            $this->Login_model->login();
        }
    }

    public function registration()
    {
        session_check_is_login();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'TEST - Registration';
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
            $this->Login_model->sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">
            Successfuly registration. Enjoy your explore!</div>');
            redirect('auth');
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
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">
                    ' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->User_model->deleteUserToken($email);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
                    Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
            Activation failed. Token invalid!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
        Activation failed. Email not found or not registered!</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        session_check_is_login();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'TEST - Forgot Password';
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
                $this->Login_model->sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">
                Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
                    Reset password failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
                Reset password failed! Wrong token!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="message">
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
            $data['title'] = 'TEST - Change Password';
            $this->load->view('auth/changepassword');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->User_model->updatePassword($email, $password);
            $this->User_model->deleteUserToken($email);
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">
            Password has been changed. Please login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">
        You have been logged out!</div>');
        redirect('auth');
    }
}
