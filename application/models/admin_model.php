<?php

class Admin_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function verify_user($email,$password)
	{
		$q = $this
				->db
				->where('email_address',$email)
				->where('password',sha1($password))
				->where('status','active')
				->limit(1)
				->get('users');
		if($q->num_rows() > 0){
			return $q->row();
		}
		return false;
	}
	
	public function register_user($first_name,$last_name,$email_address,$password)
	{
		$q = $this
				->db
				->set('first_name',$first_name)
				->set('last_name',$last_name)
				->set('email_address',$email_address)
				->set('password',sha1($password))
				->insert('users');
	}	
}

?>