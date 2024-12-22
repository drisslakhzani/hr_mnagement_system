<?php
class Route_filters {
    private $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    public function auth_check() {
        // Get current controller
        $controller = $this->CI->router->class;
        
        // Controllers that don't require authentication
        $public_controllers = array('auth');
        
        // Controllers that require admin role
        $admin_controllers = array('users');
        
        // Check if authentication is required
        if (!in_array($controller, $public_controllers)) {
            if (!$this->CI->session->userdata('logged_in')) {
                redirect('auth');
            }
            
            // Check if admin rights are required
            if (in_array($controller, $admin_controllers) && 
                $this->CI->session->userdata('role') !== 'Admin') {
                $this->CI->session->set_flashdata('error', 'Access Denied');
                redirect('dashboard');
            }
        }
    }
}
