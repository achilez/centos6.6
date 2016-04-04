<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_user')); 
    }


	public function index()
	{

		$user_id = NULL;
		$delete = NULL;

		extract($_POST);

		if (isset($submit)) {
			//perform delete to db here via model
			$this->mod_user->delete($user_id);
		}

		$data['fields'] = array(
			'id',
			'username',
			'created_date'
		);

		$data['conditions'] = array(
			'deleted_flag' => 0
		);

		$data['order'] = 'created_date asc';

		$data['results'] = $this->mod_user->get_users($data);

		$this->load->view('users/index',$data);

	}


}
