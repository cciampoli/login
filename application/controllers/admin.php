<?php

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		session_start();
		$this -> load -> library('form_validation');
	}

	function index() {
		$this -> load -> view('login_view');
	}

	public function login() {
		
		$this -> form_validation -> set_rules('email_address', 'Email Address', 'required|valid_email');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[4]');

		if ($this -> form_validation -> run() !== FALSE) {
			// Then query the DB because the form was filled out correctly
			$this -> load -> model('admin_model');
			$res = $this -> admin_model -> verify_user($this -> input -> post('email_address'), $this -> input -> post('password'));
			if ($res !== FALSE) {
				// Person has account
				$_SESSION['username'] = $this -> input -> post('email_address');
				$_SESSION['user_id'] = $res -> id;
				redirect('welcome');
			}
		}
		$this -> load -> view('login_view');
	}

	public function logout() {
		session_destroy();
		$this -> load -> view('login_view');
	}
	
	public function register() {
		// Set form validation rules
		$this->load->view('register');
	}

}
?>