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

	public function getDataById($table, $condition){
		return $this->db->where($condition)->get($table);
	}

	public function updateData($table, $condition, $data){
		$this->db->where($condition);
		$this->db->update($table,$data);
		return true;
	}

	function deleteData($table,$condition){
		$this->db->where($condition);
		$this->db->delete($table);
	}
}