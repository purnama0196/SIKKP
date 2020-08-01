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

	public function getListKKPById($id){
		if($id != 0){
			$query = "SELECT fpk.*, a.username as username, p.prodi as nama_prodi FROM `form_pengajuan_kkp` fpk left JOIN prodi p on fpk.prodi = p.id_prodi left join akun a on a.id_user = fpk.id_pengaju where fpk.id_pengaju = " . $id;
		}else{
			$query = "SELECT fpk.*, a.username as username, p.prodi as nama_prodi FROM `form_pengajuan_kkp` fpk left JOIN prodi p on fpk.prodi = p.id_prodi left join akun a on a.id_user = fpk.id_pengaju";
		}
		return $this->db->query($query);
	}

	public function getListKKPByIdForm($id){
		$query = "SELECT fpk.*, a.username as username, p.prodi as nama_prodi FROM `form_pengajuan_kkp` fpk left JOIN prodi p on fpk.prodi = p.id_prodi left join akun a on a.id_user = fpk.id_pengaju where fpk.id_form = " . $id;
			return $this->db->query($query);
	}

	public function getListKKPDetailByIdKKP($id_form){
		$query = "SELECT fpkd.*, fpk.judul FROM `form_pengajuan_kkp_detail` fpkd left JOIN form_pengajuan_kkp fpk on fpk.id_form = fpkd.id_form where fpkd.id_form = " . $id_form;
		return $this->db->query($query);
	}

	public function getListDopimById($id){
		if($id != 0){
			$query = "SELECT fpd.*, a.username as username, d.* FROM `form_pengajuan_dopim` fpd left join akun a on a.id_user = fpd.id_pengaju left join dosen d on d.id_dosen = fpd.kaprodi where fpd.id_pengaju = " . $id;
		}else{
			$query = "SELECT fpd.*, a.username as username, d.* FROM `form_pengajuan_dopim` fpd left JOIN akun a on a.id_user = fpd.id_pengaju left join dosen d on d.id_dosen = fpd.kaprodi";
		}
		return $this->db->query($query);
	}

	public function getListDopimByFormDopim($id){
		$query = "SELECT fpd.*, a.username as username FROM `form_pengajuan_dopim` fpd left join akun a on a.id_user = fpd.id_pengaju where fpd.id_form_dopim = " . $id;
		return $this->db->query($query);
	}

	public function getListDopimByIdFormPengajuan($id){
		$query = "SELECT fpd.*, a.username as username, p.prodi as nama_prodi FROM `form_pengajuan_kkp` fpk left JOIN prodi p on fpk.prodi = p.id_prodi left join akun a on a.id_user = fpk.id_pengaju where fpk.id_form = " . $id;
		return $this->db->query($query);
	}

	public function getProdiByUser($id){
		$query = "SELECT a.*, m.*, d.* from akun a left join mahasiswa m on m.id_akun = a.id_user
				  left join dosen d on d.id_prodi = m.kode_prodi where 
				 a.id_user = " . $id;
		return $this->db->query($query);
	}

	public function getApproveKKPByKaprodi($role, $id){
		// $query = "SELECT fpk.* FROM `form_pengajuan_kkp_detail` f left JOIN mahasiswa m on f.nim_mahasiswa = m.nim left join akun a on a.id_role = m.id_akun left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
  //           where fpk.status_approval = 4 and a.id_role = 4";
  		$query = "SELECT fpk.* FROM form_pengajuan_kkp_detail f
            left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
            left join mahasiswa m on m.nim = f.nim_mahasiswa
            left join akun a on a.id_user = m.id_akun
            where fpk.status_approval = 4 and a.id_user = " . $id;
		return $this->db->query($query);
	}

	public function getApproveDopimByKaprodi($role, $id){
		// $query = "SELECT fpk.* FROM `form_pengajuan_kkp_detail` f left JOIN mahasiswa m on f.nim_mahasiswa = m.nim left join akun a on a.id_role = m.id_akun left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form  
  //           where fpk.status_approval = 4 and a.id_role = 4";
  		$query = "SELECT fpk.* FROM form_pengajuan_kkp_detail f
            left join form_pengajuan_kkp fpk on fpk.id_form = f.id_form
            left join form_pengajuan_dopim fpd on fpd.id_kkp = fpk.id_form  
            left join mahasiswa m on m.nim = f.nim_mahasiswa
            left join akun a on a.id_user = m.id_akun
            where fpd.status_approval = 4 and a.id_user = " . $id;
		return $this->db->query($query);
	}
}