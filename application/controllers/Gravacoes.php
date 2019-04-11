<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gravacoes extends CI_Controller {
	public function index()
	{
        $data['page_title'] = 'Gravações';
		$this->load->view('template/header', $data);
		$this->load->view('gravacoes');
		$this->load->view('template/footer');
	}
}
