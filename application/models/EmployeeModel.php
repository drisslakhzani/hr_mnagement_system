<?php

class EmployeeModel extends CI_Model{
	public function getEmployee(){
		$query = $this->db->get('employers');
		return $query->result();
	}
	public function insertEmployee($data){
		$this->db->insert("employers",$data);

	}
	public function editEmployee($id){
		$query=$this->db->get_where("employers",["id"=>$id]);
		return $query->row();
	}
	public function updateEmployee($id,$data){
		$this->db->where("id",$id);
		$this->db->update("employers",$data);
	}
	public function deleteEmployee($id){
		$this->db->where("id",$id);
		$this->db->delete("employers");
	}
}


?>
