<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KKP extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 1){
			redirect(base_url("login"));
		}
		$this->load->model('all_model');
	}

	public function index()
	{
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ){
			$data['kkp'] = $this->all_model->getListKKPById(0)->result_array();
		}else{
			$data['kkp'] = $this->all_model->getListKKPById((int)$this->session->userdata('id'))->result_array();
		}
		$this->load->view('kkp/list', $data);
	}

	public function add()
	{
		$data['prodi'] = $this->all_model->getList("prodi")->result_array();
		$this->load->view('kkp/add', $data);
	}

	public function processAdd(){
		$data = array(
			'judul' 	 => $this->input->post('judul'),
			'penerima_satu'  => $this->input->post('penerima1'),
			'penerima_dua'  => $this->input->post('penerima2'),
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
			'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
			'prodi' => (int)$this->input->post('prodi'),
			'divisi' => $this->input->post('divisi'),
			'id_pengaju' => (int)$this->session->userdata('id'),
			'status_approval' => 0
		); 
		// var_dump($data);exit();

		$res = $this->all_model->insertData('form_pengajuan_kkp', $data);
		if($res == true){
			redirect(base_url() . 'kkp/index');
		}

		redirect(base_url() . 'kkp/add');
	}

	public function edit($id_form)
	{
		$data['prodi'] = $this->all_model->getList("prodi")->result_array();
		$data['kkp']   = $this->all_model->getListKKPByIdForm($id_form)->row();
		$this->load->view('kkp/edit', $data);
	}

	public function processEdit(){
		$data = array(
			'id_form' => $this->input->post('id_form'),
			'judul' 	 => $this->input->post('judul'),
			'penerima_satu'  => $this->input->post('penerima1'),
			'penerima_dua'  => $this->input->post('penerima2'),
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
			'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
			'prodi' => (int)$this->input->post('prodi'),
			'divisi' => $this->input->post('divisi'),
			'id_pengaju' => (int)$this->session->userdata('id'),
			'status_approval' => 0
		); 

		$condition = array(
			'id_form' => $this->input->post('id_form')
		);

		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		if($res == true){
			redirect(base_url() . 'kkp/index');
		}

		redirect(base_url() . 'kkp/edit');
	}

	public function detail($id_form){
		$data['kkp']   		  = $this->all_model->getListKKPByIdForm($id_form)->row();
		$data['kkp_detail']   = $this->all_model->getListKKPDetailByIdKKP($id_form)->result_array();
		$this->load->view('kkp/detail', $data);
	}


	public function addDetail($id_form){
		$data['kkp'] = $this->all_model->getListKKPByIdForm($id_form)->row();
		$this->load->view('kkp-detail/add', $data);
	}

	public function processAddDetail($id_form){
		$data = array(
			'nim_mahasiswa'   => $this->input->post('nim_mahasiswa'),
			'nama_mahasiswa'  => $this->input->post('nama_mahasiswa'),
			'email'  		  => $this->input->post('email'),
			'telepon'	 	  => $this->input->post('telepon'),
			'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
			'program_studi' => $this->input->post('program_studi'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'id_form' => (int)$id_form
		); 
		// var_dump($data);exit();

		$res = $this->all_model->insertData('form_pengajuan_kkp_detail', $data);
		if($res == true){
			redirect(base_url() . 'kkp/detail/' . $id_form);
		}

		redirect(base_url() . 'kkp/addDetail/' . $id_form);
	}

	public function deleteDetail($id, $id_form){
		$data = array('id_form_detail' => $id);
		$res = $this->all_model->deleteData('form_pengajuan_kkp_detail', $data);
		redirect(base_url() . 'kkp/detail/' . $id_form);
	}

	public function sendApproval($id_form){
		$data = array('status_approval' => 1);
		$condition = array('id_form' => $id_form);
		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		redirect(base_url() . 'kkp/index');
	}

	public function approveKaProdi($id_form){
		$data = array('status_approval' => 2);
		$condition = array('id_form' => $id_form);
		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		redirect(base_url() . 'kkp/index');
	}

	public function rejectKaProdi($id_form){
		$data = array('status_approval' => 3);
		$condition = array('id_form' => $id_form);
		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		redirect(base_url() . 'kkp/index');
	}

	public function approveAdmin($id_form){
		$data = array('status_approval' => 4);
		$condition = array('id_form' => $id_form);
		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		redirect(base_url() . 'kkp/index');
	}

	public function rejectAdmin($id_form){
		$data = array('status_approval' => 5);
		$condition = array('id_form' => $id_form);
		$res = $this->all_model->updateData('form_pengajuan_kkp', $condition, $data);
		redirect(base_url() . 'kkp/index');
	}
}


