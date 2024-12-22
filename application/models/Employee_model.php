<?php
// application/models/Employee_model.php

class Employee_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_employees() {
        return $this->db->get('employes')->result();
    }
    
    public function get_employee($id) {
        return $this->db->get_where('employes', ['id' => $id])->row();
    }
    
    public function create_employee($data) {
        return $this->db->insert('employes', $data);
    }
    
    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employes', $data);
    }
    
    public function delete_employee($id) {
        return $this->db->delete('employes', ['id' => $id]);
    }
    
    public function count_employees() {
        return $this->db->count_all('employes');
    }
    
	public function search_employees($search) {
        // Use 'like' for each column you want to search on
        $this->db->like('prenom', $search);      // Search in 'prenom'
        $this->db->or_like('email', $search);
		$this->db->or_like('nom', $search);      // Search in 'nom'
        $this->db->or_like('adresse', $search);  // Search in 'adresse'
        $this->db->or_like('telephone', $search);// Search in 'telephone'
        $this->db->or_like('poste', $search);    // Search in 'poste'

        // Fetch the filtered results
        return $this->db->get('employes')->result();
    }
}
