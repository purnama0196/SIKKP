<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('all_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function processLogin(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$cek = $this->all_model->getDataByCondition("akun", $data)->num_rows();
		
		if($cek > 0){
			$data = $this->all_model->getDataByCondition("akun", $data)->row();

			$data_session = array(
				'username' => $data->username,
				'status'   => 1,
				'role'	   => $data->id_role,
				'id'	   => $data->id_user
			);

			if($data->id_role == 4){
				$reject = $this->all_model->getRejectKKP((int)$data->id_role);
				$this->session->set_flashdata('reject', $reject->status_approval);

				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			}

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