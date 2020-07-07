<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['News_model']);
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        session_check();
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

    private function _uploadConfig()
    {
        $config = [
            'upload_path' => './assets/img/news/',
            'allowed_types' => 'jpg|png|gif',
            'max_size' => '5120'
        ];
        $this->load->library('upload', $config);
    }

    public function add()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user = $this->session->userdata('name');

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            // load fungsi config upload
            $this->_uploadConfig();

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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Successfuly add news!</div>');
        redirect('news');
    }

    public function edit()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user = $this->session->userdata('name');
        $id_news = $this->input->post('id_news');
        $old_image = $this->input->post('old_image');
        $status = $this->input->post('status');

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            // load fungsi config upload
            $this->_uploadConfig();

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                if ($old_image != $new_image) {
                    unlink(FCPATH . './assets/img/news/' . $old_image);
                }
                $this->db->set('image', $new_image);
                $this->db->where('id_news', $id_news);
                $this->db->update('news');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'title' => $title,
            'content' => $content,
            'update_by' => $user,
            'update_date' => time(),
            'status' => $status
        ];
        $this->News_model->updateNews($data, $id_news);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Successfuly add news!</div>');
        redirect('news');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $image = $this->input->post('image');
        if ($image) {
            unlink(FCPATH . './assets/img/news/' . $image);
        }
        $this->News_model->deleteNews($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Successfuly delete news!</div>');
        redirect('news');
    }
}
