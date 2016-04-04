<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_user')); 
    }


	public function index()
	{
		$user_id = NULL;
		$email_address = NULL;
		$password = NULL;
		$username = NULL;
		$first_name = NULL;
		$last_name = NULL;
		$submit = NULL;

		extract($_POST);

		$params['user_id'] = $user_id;
		$params['email_address'] = $email_address;
		$params['password'] = md5($password);
		$params['username'] = $username;
		$params['first_name'] = $first_name;
		$params['last_name'] = $last_name;

		if (isset($submit)) {
			//perform insert/update to db here via model
			$this->mod_user->update($params);
		}

		$this->load->view('register/index');

	}




}
