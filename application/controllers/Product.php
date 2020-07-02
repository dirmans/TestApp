
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Product_model', 'User_model']);
        // cek session jika tidak ada session maka akan dialihkan langsung ke auth
        session_check();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data = [
            'title' => 'TEST - Product',
            'user' => $this->User_model->getUserByEmail($email),
            'data' => $this->Product_model->getAllProduct()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/product', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $code_product = $this->input->post('code_product');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $user = $this->session->userdata('name');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '5120';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $data = [
                    'code_product' => $code_product,
                    'name' => $name,
                    'category' => $category,
                    'image' => $new_image,
                    'create_by' => $user,
                    'update_on' => time(),
                    'update_by' => $user,
                    'status' => 1
                ];
                $this->Product_model->insertProduct($data);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Successfuly new add product!</div>');
        redirect('product');
    }

    public function edit()
    {
        $code = $this->input->post('code_product');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $old_image = $this->input->post('old_image');
        $user = $this->session->userdata('name');

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '5120';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                if ($old_image != $new_image) {
                    unlink(FCPATH . '/assets/img/product/' . $old_image);
                }
                $this->db->set('image', $new_image);
                $this->db->where('code_product', $code);
                $this->db->update('product');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'name' => $name,
            'category' => $category,
            'update_by' => $user,
            'update_on' => time()
        ];
        $this->Product_model->updateProduct($data, $code);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Product ' . $code . ' has been updated!</div>');
        redirect('product');
    }

    public function delete()
    {
        $image = $this->input->post('image');
        $id = $this->uri->segment(3);
        if ($image) {
            unlink(FCPATH . 'assets/img/product/' . $image);
            $this->Product_model->deleteProduct($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Succesfully delete product.</div>');
            redirect('product');
        } else {
            $this->Product_model->deleteProduct($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="message">Succesfully delete product.</div>');
            redirect('product');
        }
    }
}
