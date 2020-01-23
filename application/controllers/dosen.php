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
		if($this->input->post("jabatan") == "kaprodi"){
			$role = 2;
		}else{
			$role = 3;
		}

		$akun = array(
			"username" => $this->input->post("username"),
			"password" => md5($this->input->post("password")),
			"id_role"  => $role
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
				"id_akun"		=> $res_akun->id_user,
				"jabatan"		=> $this->input->post("jabatan")
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
		$data["dosen"] = $this->all_model->getDataByCondition("dosen", $where)->row();
		$this->load->view('dosen/edit', $data);
	}
	
	public function processEdit(){
		if($this->input->post("jabatan") == "kaprodi"){
			$role = 2;
		}else{
			$role = 3;
		}

		$where = array("id_dosen" => (int)$this->input->post("id"));
		$dosen = $this->all_model->getDataByCondition("dosen", $where)->row();
		
		$condition = array("id_user" => $dosen->id_akun);
		$akun = $this->all_model->getDataByCondition("akun", $condition)->row();

		$d_akun = array("id_role" => $role);
		$c_akun = array("id_user" => (int)$akun->id_user);
		$r_akun = $this->all_model->updateData("akun",$c_akun,$d_akun);

		if($r_akun == true){
			$d_akun = array(
				"nik" 			=> $this->input->post("nik"),
				"nama_dosen" 	=> $this->input->post("nama"),
				"email" 		=> $this->input->post("email"),
				"jabatan"		=> $this->input->post("jabatan")
			);;

			$r_dosen = $this->all_model->updateData('dosen',$where,$dosen);
			if($r_dosen == true){
				redirect(base_url('dosen/index'));
			}else{
				redirect(base_url('dosen/edit'));
			}
		}
		redirect(base_url('dosen/edit'));
	}

	public function delete($id){
		$c_dosen = array(
			"id_dosen" => $id
		);

		$akun = $this->all_model->getDataByCondition("dosen", $c_dosen)->row();
		$c_akun = array(
			"id_user" => $akun->id_akun
		);

		$delete_akun = $this->all_model->deleteData("akun", $c_akun);
		$delete_dosen = $this->all_model->deleteData("dosen",$c_dosen);

		redirect(base_url("dosen/index"));
	}
}