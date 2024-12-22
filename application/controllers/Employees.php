<?php
// application/controllers/Employees.php

class Employees extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->library('session');

		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
	}

	// application/controllers/Employees.php

	public function index()
	{
		$searchTerm = $this->input->get('search'); // Get the search term from the query string

		// If no search term, get all employees
		if ($searchTerm) {
			$data['employees'] = $this->employee_model->search_employees($searchTerm);
		} else {
			$data['employees'] = $this->employee_model->get_employees(); // Get all employees
		}

		$data['title'] = 'Liste des Employés';
		$data['content'] = 'employees/index';
		$this->load->view('templates/main', $data);
	}


	public function create()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Add New Employee';
			$data['content'] = 'employees/create';
			$this->load->view('templates/main', $data);
		} else {
			$employee_data = array(
				'prenom' => $this->input->post('firstname'),
				'nom' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'adresse' => $this->input->post('adress'),
				'telephone' => $this->input->post('phone'),
				'poste' => $this->input->post('position')
			);

			if ($this->employee_model->create_employee($employee_data)) {
				$this->session->set_flashdata('success', 'Employee added successfully');
			} else {
				$this->session->set_flashdata('error', 'Error adding employee');
			}
			redirect('employees');
		}
	}

	public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		// Fetch the employee data
		$data['employee'] = $this->employee_model->get_employee($id); // Ensure this method returns the correct employee object

		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Edit Employee';
			$data['content'] = 'employees/edit';
			$this->load->view('templates/main', $data);
		} else {
			// Process the form and update the employee data
			$employee_data = array(
				'prenom' => $this->input->post('firstname'),
				'nom' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'adresse' => $this->input->post('adress'),
				'telephone' => $this->input->post('phone'),
				'poste' => $this->input->post('position')
			);

			if ($this->employee_model->update_employee($id, $employee_data)) {
				$this->session->set_flashdata('success', 'Employee updated successfully');
			} else {
				$this->session->set_flashdata('error', 'Error updating employee');
			}
			redirect('employees');
		}
	}

	public function delete($id)
	{
		if ($this->employee_model->delete_employee($id)) {
			$this->session->set_flashdata('success', 'Employee deleted successfully');
		} else {
			$this->session->set_flashdata('error', 'Error deleting employee');
		}
		redirect('employees');
	}

	public function search()
	{
		$search = $this->input->get('q');
		$data['employees'] = $this->employee_model->search_employees($search);
		$this->load->view('employees/table', $data);
	}
}
