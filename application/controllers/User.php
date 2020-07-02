<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        session_check();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data = [
            'title' => 'TEST - User',
            'user' => $this->User_model->getUserByEmail($email),
            'data' => $this->User_model->getAllUser()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $old_image = $this->input->post('old_image');

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '5120';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . '/assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">User : ' . $this->session->userdata('email') . ' has been updated!</div>');
        redirect('user');
    }

    public function delete()
    {
        $image = $this->input->post('image');
        $id = $this->uri->segment(3);
        if ($image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $image);
            $this->User_model->deleteUser($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Succesfully delete user.</div>');
            redirect('user');
        } else {
            $this->User_model->deleteUser($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Succesfully delete user.</div>');
            redirect('user');
        }
    }
}
