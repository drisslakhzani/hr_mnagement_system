<?php

 class UsersModel extends CI_Model {
	public function getUser() {
		$username='driss';
		$password= 'gola';
		$data=[$username,$password];
		return $data;
 }
 public function getUserByUsername($username) {
	if($username== 'driss') {
		return 'you are right';
	}else{
		return $username;
	};
 }
}
?>
