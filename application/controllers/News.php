<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('news_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title' => 'CRUD - Dashboard',
            'user'  => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'news'  => $this->news_model->archives('news')
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/news', $data);
        $this->load->view('templates/footer');
    }
}
