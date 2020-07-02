<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Career extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Career_model']);
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        session_check();
    }

    public function index()
    {
        $data = [
            'title' => 'TEST - Career',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'career' => $this->Career_model->getAllCareer()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/career', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $code = $this->input->post('code_career');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user = $this->session->userdata('name');

        $data = [
            'code_career' => $code,
            'title' => $title,
            'content' => $content,
            'create_by' => $user,
            'create_date' => time(),
            'status' => 1
        ];
        $this->Career_model->insertCareer($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Data career has been created!</div>');
        redirect('career');
    }

    public function edit()
    {
        $id = $this->input->post('id_career');
        $code = $this->input->post('code_career');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $user = $this->session->userdata('name');

        $data = [
            'code_career' => $code,
            'title' => $title,
            'content' => $content,
            'update_by' => $user,
            'update_date' => time(),
            'status' => $status
        ];
        $this->Career_model->updateCareer($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Data career has been updated!</div>');
        redirect('career');
    }
}
