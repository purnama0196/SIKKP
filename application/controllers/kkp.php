<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KKP extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
		$this->load->model('all_model');
	}

	public function add()
	{
		$data["prodi"] = $this->all_model->getList("prodi")->result_array();
		$this->load->view('kkp/add', $data);
	}
}