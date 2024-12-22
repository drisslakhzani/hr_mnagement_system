<?php
// application/controllers/Auth.php

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }
    
    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }
    
    public function login() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        
        $user = $this->user_model->authenticate($login, $password);
        
        if ($user) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'login' => $user->login,
                'role' => $user->role,
                'logged_in' => TRUE
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials');
            redirect('auth');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
