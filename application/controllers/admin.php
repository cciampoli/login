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
		
		$this -> form_validation ->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[4]');

		if ($this -> form_validation -> run() !== FALSE) {
			// Then query the DB because the form was filled out correctly
			$this->load->model('admin_model');
			$res = $this
					->admin_model 
					->verify_user(
						$this->input->post('email_address'), 
						$this->input->post('password'));
			if ($res !== FALSE) {
				// Person has account
				$_SESSION['username'] = $this->input->post('email_address');
				$_SESSION['user_id'] = $res->id;
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
		$this->form_validation->set_rules('first_name','First Name','required|max_length[40]');
		$this->form_validation->set_rules('last_name','Last Name','required|max_length[40]');
		$this->form_validation->set_rules('email_address','Email Address','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[4]');
		
		// Run rules and do something if they check out
		if($this->form_validation->run() !== FALSE){
			// Register the new user into the database, and currently set their account to inactive
			$this->load->model('admin_model');
			// Randomly generate a number to use as their activation key.  Send it to the model with the
			// post values.
			$random = rand(1122, 9999);
			$res = $this
					->admin_model
					->register_user(
						$this->input->post('first_name'),
						$this->input->post('last_name'),
						$this->input->post('email_address'),
						$this->input->post('password'),
						$random
					);
			if($res!==FALSE){
				// Send the user an email with the randomly generated number, and a link to where
				// they can input it.  Once they input and submit the key (random value) their account
				// will be set as active.
				redirect('admin');
			}
		}
		$this->load->view('register');
	}

	public function validate() {
		$this->load->model('admin_model');
		$res = $this
				->admin_model
				->validate_user(
					$this->input->get('first_name'),
					$this->input->get('key')
				);
		if($res!==FALSE){
			redirect('admin');
		} else {
			$this->load->view('sorry');
		}
	}
	
	public function test($name){
		echo $name . '<br/>';
	}

}
?>