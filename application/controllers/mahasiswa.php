<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
		$this->load->model('all_model');
	}

	public function index()
	{
		$data["mahasiswa"] = $this->all_model->getMahasiswa()->result_array();
		$this->load->view('mahasiswa/list', $data);
	}

	public function add()
	{
		$data["prodi"] = $this->all_model->getList("prodi")->result_array();
		$this->load->view('mahasiswa/add', $data);
	}

	public function processAdd()
	{
		$akun = array(
			"username" => $this->input->post("username"),
			"password" => md5($this->input->post("password")),
			"id_role"  => 4
		); 

		$resp = $this->all_model->insertData('akun', $akun);
		if($resp == false){
			redirect(base_url('mahasiswa/add'));
		}

		$res_akun = $this->all_model->getDataByLimit('akun', 'id_user', 'desc')->row();

		if(!empty($res_akun)){
			$mahasiswa = array(
				"nim" 			=> $this->input->post("nim"),
				"nama" 			=> $this->input->post("nama"),
				"tempat_lahir" 	=> $this->input->post("tempat_lahir"),
				"tanggal_lahir" => $this->input->post("tanggal_lahir"),
				"kode_prodi"	=> $this->input->post("prodi"),
				"id_akun"		=> $res_akun->id_user
			);	
			$res = $this->all_model->insertData('mahasiswa',$mahasiswa);
			if($res == false){
				redirect(base_url('mahasiswa/add'));
			}
			redirect(base_url('mahasiswa/index'));
		}else{
			redirect(base_url('mahasiswa/add'));
		}
	}

	public function edit($id){
		$where = array("id_mahasiswa" => $id);
		$data["mahasiswa"] = $this->all_model->getDataByCondition("mahasiswa", $where)->row();
		$data["prodi"] = $this->all_model->getList("prodi")->result_array();
		$this->load->view('mahasiswa/edit', $data);
	}	

	public function processEdit(){
		$mahasiswa = array(
			"nim" 			=> $this->input->post("nim"),
			"nama" 			=> $this->input->post("nama"),
			"tempat_lahir" 	=> $this->input->post("tempat_lahir"),
			"tanggal_lahir" => $this->input->post("tanggal_lahir"),
			"kode_prodi"	=> $this->input->post("prodi")
		);	

		$condition = array("id_mahasiswa" => $this->input->post("id"));
		$res = $this->all_model->updateData('mahasiswa',$condition,$mahasiswa);
		if($res == false){
			redirect(base_url('mahasiswa/edit/' . $this->input->post("id")));
		}
		redirect(base_url('mahasiswa/index'));
	}

	public function delete($id){
		$c_mahasiswa = array(
			"id_mahasiswa" => $id
		);

		$delete_mahasiswa = $this->all_model->deleteData("mahasiswa", $c_mahasiswa);		
		redirect(base_url("mahasiswa/index"));
	}
}