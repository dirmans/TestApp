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

    public function create_news()
    {
        $data = [
            'title' => 'CRUD - Dashboard',
            'user'  => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/create_news', $data);
        $this->load->view('templates/footer');
    }

    public function delete_news($id)
    {
        // query untuk memilih data karyawan berdasarkan id karyawan
        $image_path = './assets/img/news/';
        $query_get_image = $this->db->get_where('news', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            // $filename adalah variabel untuk menyimpan path gambar + nama gambar
            $filename = $image_path . $record->tumbnail;
            if (unlink($filename)) {
                // jika menghapus foto yang ada di folder gambar berhasil maka hapus data di database
                $where = array('id' => $id);
                $this->news_model->delete_news($where, 'news');
                redirect('news/');
            }
        }
    }
}
