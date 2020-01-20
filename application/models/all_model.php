<?php 

class All_model extends CI_Model{	
	public function getList($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}