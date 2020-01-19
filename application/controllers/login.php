<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function processLogin(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$cek = $this->login_model->cek_login("akun", $data)->num_rows();
		
		if($cek > 0){
			redirect(base_url('home'));
		}else{
			redirect(base_url('login'));
		}
	}
}