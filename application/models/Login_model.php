<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function login()
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
                        'role_id' => $user['role_id'],
                        'name' => $user['name'],
                    ];
                    $this->session->set_userdata($data); // mengambil data session yang login
                    redirect('home');
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

    function sendEmail($token, $type)
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
            $this->email->message('
            Hello, for verification your account. You can use this url in below :
            <br><br>
            <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">VERIFY ACCOUNT</a>
            <br><br>
            Enjoy your explore.');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Hello, for reset your password. You can use this url in below :
            <br><br>
            <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">RESET PASSWORD</a>
            <br><br>
            Enjoy your explore.');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
