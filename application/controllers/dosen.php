<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
		$this->load->model('all_model');
	}

	public function index()
	{
		$data["dosen"] = $this->all_model->getList("dosen")->result_array();
		$this->load->view('dosen/list', $data);
	}

	public function add(){
		$this->load->view('dosen/add');
	}

	public function processAdd(){
		$akun = array(
			"username" => $this->input->post("username"),
			"password" => md5($this->input->post("password")),
			"id_role"  => 2
		); 

		$resp = $this->all_model->insertData('akun', $akun);
		if($resp == false){
			redirect(base_url('dosen/add'));
		}

		$res_akun = $this->all_model->getDataByLimit('akun', 'id_user', 'desc')->row();

		if(!empty($res_akun)){
			$dosen = array(
				"nik" 			=> $this->input->post("nik"),
				"nama_dosen" 	=> $this->input->post("nama"),
				"email" 		=> $this->input->post("email"),
				"id_akun"		=> $res_akun->id_user
			);
			$res = $this->all_model->insertData('dosen',$dosen);
			if($res == false){
				redirect(base_url('dosen/add'));
			}
		}

		redirect(base_url('dosen/index'));
	}

	public function edit($id){
		$where = array("id_dosen" => $id);
		$data["dosen"] = $this->all_model->getDataById("dosen", $where)->row();
		$this->load->view('dosen/edit', $data);
	}

	public function processEdit(){
		$dosen = array(
			"nik" 			=> $this->input->post("nik"),
			"nama_dosen" 	=> $this->input->post("nama"),
			"email" 		=> $this->input->post("email")
		);

		$condition = array("id_dosen" => $this->input->post("id"));

		$res = $this->all_model->updateData('dosen',$condition,$dosen);
		if($res == false){
			redirect(base_url('dosen/edit/' . $this->input->post("id")));
		}
		
		redirect(base_url('dosen/index'));
	}

	public function delete($id){
		$condition = array(
			"id_dosen" => $id
		);
		$res = $this->all_model->deleteData("dosen",$condition);
		redirect(base_url("dosen/index"));
	}
}