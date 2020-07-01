<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indexi extends CI_Controller
{
	public function index()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/home');
		$this->load->view('pages/template/footer');
	}

	public function about()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/navbar');
		$this->load->view('pages/about');
		$this->load->view('pages/template/footer');
	}
}
