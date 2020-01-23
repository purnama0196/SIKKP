<?php 

class All_model extends CI_Model{	
	public function getList($table){		
		return $this->db->get_where($table);
	}	

	public function insertData($table, $data){
		$this->db->insert($table, $data);
		return true;
	}

	public function getDataByLimit($table, $condition, $order){
		return $this->db->order_by($condition, $order)->get($table, 1);
	}

	public function getDataByCondition($table, $condition){
		return $this->db->where($condition)->get($table);
	}

	public function updateData($table, $condition, $data){
		$this->db->where($condition);
		$this->db->update($table,$data);
		return true;
	}

	public function deleteData($table,$condition){
		$this->db->where($condition);
		$this->db->delete($table);
	}

	public function getKaProdi(){
		$query = "SELECT a.*, d.nama_dosen FROM `dosen` d left JOIN akun a on a.id_user = d.id_akun
				 where a.id_role = 2";
		return $this->db->query($query);
	}

	public function getMahasiswa(){
		$query = "SELECT m.*, p.prodi FROM `mahasiswa` m left JOIN prodi p on m.kode_prodi = p.id_prodi";
		return $this->db->query($query);
	}

	public function getProgressKKP($role){
		$query = "SELECT fpk.* FROM `form_pengajuan_kkp_detail` f left JOIN mahasiswa m on f.nim_mahasiswa = m.nim left join akun a on a.id_role = m.id_akun left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
		where fpk.status_approval = 0 and a.id_role = " . $role;
		return $this->db->query($query);
	}

	public function getApprovalKKP($role){
		$query = "SELECT fpk.* FROM `form_pengajuan_kkp_detail` f left JOIN mahasiswa m on f.nim_mahasiswa = m.nim left join akun a on a.id_role = m.id_akun left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
		where fpk.status_approval = 1 and a.id_role = " . $role;
		return $this->db->query($query);
	}

	public function getRejectKKP($role){
		$query = "SELECT fpk.* FROM `form_pengajuan_kkp_detail` f left JOIN mahasiswa m on f.nim_mahasiswa = m.nim left join akun a on a.id_role = m.id_akun left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
		where fpk.status_approval = 2 and a.id_role = " . $role;
		return $this->db->query($query);
	}
}