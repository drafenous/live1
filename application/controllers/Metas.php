<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metas extends CI_Controller {
	public function index()
	{
        $data['page_title'] = 'Metas';
		$this->load->view('template/header', $data);
		$this->load->view('metas');
		$this->load->view('template/footer');
	}
}
