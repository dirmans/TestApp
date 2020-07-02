<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// cek session jika tidak ada session maka akan dialihkan langsung ke auth
		session_check();
	}

	public function index()
	{
		$data = [
			'title' => 'TEST - Dashboard',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/footer');
	}
}
