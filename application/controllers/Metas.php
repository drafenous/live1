<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metas extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('metas');
		$this->load->view('template/footer');
	}
}
