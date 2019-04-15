<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realtime extends CI_Controller {
	public function index()
	{
        $data['page_title'] = 'Realtime';
		$this->load->view('template/header', $data);
		$this->load->view('realtime');
		$this->load->view('template/footer');
	}
}
