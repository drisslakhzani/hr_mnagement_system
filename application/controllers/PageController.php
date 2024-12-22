<?php
// defined('BASEPATH') OR exit("No direct script access allowed");
class PageController extends CI_Controller {
	public function blog ($blog = "") {
		$this->load->database();
		echo "this the blog number $blog";
	}
}


 
?>



