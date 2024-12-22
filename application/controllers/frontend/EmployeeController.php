<?php
defined("BASEPATH") OR exit("No direct script access allowed");
class EmployeeController extends CI_Controller {

	public function index(){
		$this->load->model('EmployeeModel');
		$data['employee']= $this->EmployeeModel->getEmployee();
		$this->load->view('template/header');
		$this->load->view('frontend/employee', $data);
		$this->load->view('template/footer');
		
	}
	
	public function create(){
		$this->load->view('template/header');
		$this->load->view('frontend/create');
		$this->load->view('template/footer');
	}

	public function store(){

		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('phone','Phone Number','required');
		$this->form_validation->set_rules('email','Email Adress','required');
		if($this->form_validation->run()){
			$data=[
				'first_name'=> $this->input->post('first_name'),
				'last_name'=> $this->input->post('last_name'),
				'phone'=> $this->input->post('phone'),
				'email'=> $this->input->post('email'),
			];
			$this->load->model('EmployeeModel');
			$this->EmployeeModel->insertEmployee($data);
			redirect(base_url('employee'));
		}else{
			$this->create() ;
		}
		
	}
	public function edit($id){
		$this->load->view('template/header');
		$this->load->model('EmployeeModel');
		$data['employee']= $this->EmployeeModel->editEmployee($id);
		$this->load->view('frontend/edit', $data);
		$this->load->view('template/footer');
	}


	public function update($id){

		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('phone','Phone Number','required');
		$this->form_validation->set_rules('email','Email Adress','required');
		if($this->form_validation->run()){
			$data=[
				'first_name'=> $this->input->post('first_name'),
				'last_name'=> $this->input->post('last_name'),
				'phone'=> $this->input->post('phone'),
				'email'=> $this->input->post('email'),
			];
			$this->load->model('EmployeeModel');
			$this->EmployeeModel->updateEmployee($id,$data);
			redirect(base_url('employee'));
		}else{
			$this->edit($id) ;
		}
		
	}
	public function delete($id){
		$this->load->model('EmployeeModel');
		$this->EmployeeModel->deleteEmployee($id);
		redirect(base_url('employee'));
	}

}
?>
