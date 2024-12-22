<?php
// application/models/User_model.php

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function authenticate($login, $password) {
        $user = $this->db->get_where('utilisateurs', ['login' => $login])->row();
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
    
    public function create_user($data) {
		// Remove the 'password' key if it exists, since we use 'mot_de_passe' in the DB
		unset($data['password']);  // Remove password field to prevent extra insert
		$data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_DEFAULT);  // Ensure mot_de_passe is hashed
	
		return $this->db->insert('utilisateurs', $data);
	}

	public function get_users_by_search($search = NULL) {
		if ($search) {
			$this->db->like('nom', $search);
			$this->db->or_like('prenom', $search);
			$this->db->or_like('login', $search);
			$this->db->or_like('role', $search);
		}
		return $this->db->get('utilisateurs')->result();
	}
	
	public function get_users() {
		return $this->db->get('utilisateurs')->result();
	}
	
    
    public function get_user($id) {
        return $this->db->get_where('utilisateurs', ['id' => $id])->row();
    }
    
    public function update_user($id, $data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        $this->db->where('id', $id);
        return $this->db->update('utilisateurs', $data);
    }
    
    public function delete_user($id) {
        return $this->db->delete('utilisateurs', ['id' => $id]);
    }
}
