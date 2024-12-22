<?php
// application/controllers/Dashboard.php

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(['employee_model', 'user_model']);
        $this->load->library('session');
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }
    
    public function index() {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard/index';
        
        // Get statistics
        $data['total_employees'] = $this->employee_model->count_employees();
        $data['total_users'] = $this->db->count_all('utilisateurs');
        
        // Get recent employees
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $data['recent_employees'] = $this->db->get('employes')->result();
        
        $this->load->view('templates/main', $data);
    }
}
