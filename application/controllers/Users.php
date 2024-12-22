<?php


class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        
        // Check if user is logged in and is admin
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== 'Admin') {
            $this->session->set_flashdata('error', 'Access Denied');
            redirect('dashboard');
        }
    }
    
    public function index() {
		// Get the search term from the GET request
		$search = $this->input->get('search');
		
		// Fetch the users based on the search term
		if ($search) {
			$data['users'] = $this->user_model->get_users_by_search($search);
		} else {
			$data['users'] = $this->user_model->get_users(); // Get all users if no search
		}
	
		$data['search'] = $search;  // Pass search term to the view
		$data['title'] = 'Gestion des utilisateurs';
		$data['content'] = 'users/index';
		$this->load->view('templates/main', $data);
	}
	
    
    public function create() {
		$this->load->library('form_validation');
		
		// Set validation rules for the form inputs
		$this->form_validation->set_rules('prenom', 'Prénom', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('login', 'Login', 'required|is_unique[utilisateurs.login]');
		$this->form_validation->set_rules('mot_de_passe', 'Mot de Passe', 'required|min_length[6]');
		$this->form_validation->set_rules('role', 'Rôle', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Ajouter un nouvel utilisateur';
			$data['content'] = 'users/create';
			$this->load->view('templates/main', $data);
		} else {
			// Collect form data and insert into the database
			$user_data = array(
				'prenom' => $this->input->post('prenom'),
				'nom' => $this->input->post('nom'),
				'login' => $this->input->post('login'),
				'mot_de_passe' => password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT),
				'role' => $this->input->post('role')
			);
			
			// Insert the user into the database
			if ($this->user_model->create_user($user_data)) {
				$this->session->set_flashdata('success', 'Utilisateur ajouté avec succès');
			} else {
				$this->session->set_flashdata('error', 'Erreur lors de l\'ajout de l\'utilisateur');
			}
			redirect('users');
		}
	}
    
    public function edit($id) {
		$this->load->library('form_validation');
		
		// Set validation rules for the form inputs
		$this->form_validation->set_rules('prenom', 'Prénom', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('role', 'Rôle', 'required');
		
		// If the form is not valid, reload the form with errors
		if ($this->form_validation->run() === FALSE) {
			$data['user'] = $this->user_model->get_user($id);
			$data['title'] = 'Modifier l\'utilisateur';
			$data['content'] = 'users/edit';
			$this->load->view('templates/main', $data);
		} else {
			// Collect form data
			$user_data = array(
				'prenom' => $this->input->post('prenom'),
				'nom' => $this->input->post('nom'),
				'role' => $this->input->post('role')
			);
			
			// Update password only if provided
			if ($this->input->post('mot_de_passe')) {
				$user_data['mot_de_passe'] = password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT);
			}
			
			// Update the user data in the database
			if ($this->user_model->update_user($id, $user_data)) {
				$this->session->set_flashdata('success', 'Utilisateur mis à jour avec succès');
			} else {
				$this->session->set_flashdata('error', 'Erreur lors de la mise à jour de l\'utilisateur');
			}
			redirect('users');
		}
	}
	
    
    public function delete($id) {
        // Prevent deleting self
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Vous ne pouvez pas supprimer votre propre compte');
            redirect('users');
        }
        
        if ($this->user_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'Utilisateur supprimé avec succès');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la suppression de l\'utilisateur');
        }
        redirect('users');
    }
}

