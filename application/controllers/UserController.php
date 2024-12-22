<?php

class UserController extends CI_Controller {
	public function index(){
		$this->load->model("UsersModel","users");
		$users= $this->users->getUser();
		foreach($users as $user){
			print_r($user) ;
	}
}
	public function findUser($username){
		$this->load->model("UsersModel","users");
		$user= $this->users->getUserByUsername($username);
		echo "$user" ;
	}
}


?>
