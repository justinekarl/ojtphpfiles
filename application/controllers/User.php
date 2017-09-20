<?php
class User extends CI_Controller {
	
// 	function User (){
// 		parent::CI_Controller();
// 		$this->view_data['base_url'] = base_url();
// 	}
	
	function index(){
		$this->register();
	}
	
	function register(){
		$this->load->view('view_register',$this->view_data);
	}
	
}