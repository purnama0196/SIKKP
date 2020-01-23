<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
		$this->load->model('all_model');
	}

	public function index()
	{
		$where = array("id_role" => 2);

		$data["prodi"] = $this->all_model->getList("prodi")->result_array();
		$this->load->view('prodi/list', $data);
	}

	public function add(){
		$data["kaprodi"] = $this->all_model->getKaProdi()->result_array();
		$this->load->view('prodi/add', $data);
	}

	public function processAdd(){
		$prodi = array(
			"prodi" => $this->input->post("prodi"),
			"kaprodi" => $this->input->post("kaprodi")
		); 

		$resp = $this->all_model->insertData('prodi', $prodi);
		if($resp == false){
			redirect(base_url('prodi/add'));
		}
		redirect(base_url('prodi/index'));
	}

	public function edit($id){
		$where = array("id_prodi" => $id);
		$data["prodi"] = $this->all_model->getDataByCondition("prodi", $where)->row();
		$data["kaprodi"] = $this->all_model->getKaProdi()->result_array();
		$this->load->view('prodi/edit', $data);
	}

	public function processEdit(){
		$prodi = array(
			"prodi" 			=> $this->input->post("prodi"),
			"kaprodi" 			=> $this->input->post("kaprodi")
		);

		$condition = array("id_prodi" => $this->input->post("id"));

		$res = $this->all_model->updateData('prodi',$condition,$prodi);
		if($res == false){
			redirect(base_url('prodi/edit/' . $this->input->post("id")));
		}
		
		redirect(base_url('prodi/index'));
	}

	public function delete($id){
		$c_prodi = array(
			"id_prodi" => $id
		);

		$delete_prodi = $this->all_model->deleteData("prodi", $c_prodi);		
		redirect(base_url("prodi/index"));
	}
}