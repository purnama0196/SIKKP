<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->load->view('dosen/list');
	}

	public function add(){
		$this->load->view('dosen/add');
	}
}