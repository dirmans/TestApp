<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['News_model']);
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'TEST - News',
            'user'  => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'news'  => $this->News_model->getAllNews()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/news', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user = $this->session->userdata('name');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config = [
                'upload_path' => './assets/img/news/',
                'allowed_types' => 'jpg|png|gif',
                'max_size' => '5120'
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'image' => $new_image,
                    'create_by' => $user,
                    'create_date' => time(),
                    'update_by' => $user,
                    'update_date' => time(),
                    'status' => 1
                ];
                $this->News_model->insertNews($data);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfuly add news!</div>');
        redirect('news');
    }
}
