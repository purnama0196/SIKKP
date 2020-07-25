<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dopim extends CI_Controller {
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
			$data['dopim'] = $this->all_model->getListDopimById(0)->result_array();
		}else{
			$data['dopim'] = $this->all_model->getListDopimById((int)$this->session->userdata('id'))->result_array();
		}
		$data['dosen'] = $this->all_model->getList('dosen')->result_array();
		$this->load->view('dopim/list', $data);
	}

	public function add()
	{
		$data['kkp'] = $this->all_model->getListKKPById((int)$this->session->userdata('id'))->row();
		$data["user"] = $this->all_model->getProdiByUser($this->session->userdata('id'))->row();
		$data["dosen"] = $this->all_model->getList("dosen")->result_array();
		$this->load->view('dopim/add', $data);
	}

	public function processAdd(){
		$data = array(
			'kaprodi' 	 => $this->input->post('kaprodi'),
			'id_dosen'  => $this->input->post('id_dosen'),
			'topik'  => $this->input->post('topik'),
			'tujuan_tema' => $this->input->post('tujuan_tema'),
			'id_kkp' => $this->input->post('id_kkp'),
			'id_pengaju' => (int)$this->session->userdata('id'),
			'status_approval' => 0,
			'judul_laporan_kkp' => $this->input->post('judul_laporan_kkp')
		); 
		$res = $this->all_model->insertData('form_pengajuan_dopim', $data);
		if($res == true){
			redirect(base_url() . 'dopim/index');
		}

		redirect(base_url() . 'dopim/add');
	}

	public function edit($id_form)
	{
		$data["user"] = $this->all_model->getProdiByUser($this->session->userdata('id'))->row();
		$data["dosen"] = $this->all_model->getList("dosen")->result_array();
		$data['dopim']   = $this->all_model->getListDopimByFormDopim($id_form)->row();
		$this->load->view('dopim/edit', $data);
	}

	public function processEdit(){
		$data = array(
			'id_form_dopim' => $this->input->post('id_form_dopim'),
			'id_dosen'  => $this->input->post('id_dosen'),
			'topik'  => $this->input->post('topik'),
			'tujuan_tema' => $this->input->post('tujuan_tema'),
			'id_pengaju' => (int)$this->session->userdata('id'),
			'status_approval' => 0
		); 
		$condition = array(
			'id_form_dopim' => $this->input->post('id_form_dopim')
		);

		$res = $this->all_model->updateData('form_pengajuan_dopim', $condition, $data);
		if($res == true){
			redirect(base_url() . 'dopim/index');
		}

		redirect(base_url() . 'dopim/edit');
	}

	public function detail($id_form){
		// $data['dopim']   		  = $this->all_model->getListKKPByIdForm($id_form_pengajuan)->row();
		// $data['dopim_detail']   = $this->all_model->getListKKPDetailByIdKKP($id_form_pengajuan)->result_array();
		$dopim = $this->all_model->getListDopimByFormDopim($id_form)->row();
		$data["user"] = $this->all_model->getProdiByUser($this->session->userdata('id'))->row();
		$data["dosen"] = $this->all_model->getList("dosen")->result_array();
		$data['dopim']   = $dopim;
		$data['kkp_detail']   = $this->all_model->getListKKPDetailByIdKKP($dopim->id_kkp)->result_array();
		$data['kkp']   		  = $this->all_model->getListKKPByIdForm($dopim->id_kkp)->row();
		$this->load->view('dopim/detail', $data);
	}

	public function addDetail($id_form_pengajuan){
		$data['dopim'] = $this->all_model->getListKKPByIdForm($id_form_pengajuan)->row();
		$this->load->view('dopim-detail/add', $data);
	}

	public function processAddDetail($id_form_pengajuan){
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

	public function approveKaProdi($id_form_dopim){
		$data = array('status_approval' => 2);
		$condition = array('id_form_dopim' => $id_form_dopim);
		$res = $this->all_model->updateData('form_pengajuan_dopim', $condition, $data);
		redirect(base_url() . 'dopim/index');
	}

	public function rejectKaProdi($id_form_dopim){
		$data = array('status_approval' => 3);
		$condition = array('id_form_dopim' => $id_form_dopim);
		$res = $this->all_model->updateData('form_pengajuan_dopim', $condition, $data);
		redirect(base_url() . 'dopim/index');
	}

	public function approveAdmin($id_form_dopim){
		$data = array('status_approval' => 4);
		$condition = array('id_form_dopim' => $id_form_dopim);
		$res = $this->all_model->updateData('form_pengajuan_dopim', $condition, $data);
		redirect(base_url() . 'dopim/index');
	}

	public function rejectAdmin($id_form_dopim){
		$data = array('status_approval' => 5);
		$condition = array('id_form_dopim' => $id_form_dopim);
		$res = $this->all_model->updateData('form_pengajuan_dopim', $condition, $data);
		redirect(base_url() . 'dopim/index');
	}
}