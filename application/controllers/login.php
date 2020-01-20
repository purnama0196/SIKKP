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
			$data = $this->login_model->cek_login("akun", $data)->row();

			$data_session = array(
				'username' => $data->username,
				'status'   => 1,
				'role'	   => $data->id_role
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('home'));
		}else{
			redirect(base_url('login'));
		}
	}

	public function processLogout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}