<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gravacoes extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('gravacoes');
		$this->load->view('template/footer');
	}
}
