<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indexi extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model(['News_model']);
	}

	public function index()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/template/top');
		$this->load->view('pages/home');
		$this->load->view('pages/template/footer');
	}

	public function about()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/template/top');
		$this->load->view('pages/about');
		$this->load->view('pages/template/footer');
	}

	public function news()
	{
		$data['news'] = $this->News_model->getAllNews();

		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/news',$data);
		$this->load->view('pages/template/footer');
	}
}
