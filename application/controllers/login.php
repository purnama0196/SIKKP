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
			if($data->id_role == 4){
				$approve_kkp = $this->all_model->getApproveKKPByKaprodi($data->id_role, $data->id_user)->row();
				$approve_dopim = $this->all_model->getApproveDopimByKaprodi($data->id_role, $data->id_user)->row();
				// var_dump($data->id_role);exit();
				// $reject = $this->all_model->getKKPDetail()->result_array();
				// var_dump($reject);exit();
				// $this->session->set_flashdata('approve', $approve->status_approval);

				$data_session = array(
					'username' => $data->username,
					'status'   => 1,
					'role'	   => $data->id_role,
					'id'	   => $data->id_user,
					'approve_kkp'  => $approve_kkp->status_approval,
					'approve_dopim'  => $approve_dopim->status_approval
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			}

			$data_session = array(
				'username' => $data->username,
				'status'   => 1,
				'role'	   => $data->id_role,
				'id'	   => $data->id_user
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