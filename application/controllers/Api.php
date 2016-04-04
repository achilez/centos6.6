<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_user','mod_blog')); 
    }


	public function index() {

		echo 'Welcome to Blog API';

	}

	public function get_all_blog(){

		$data['base_url'] = base_url();
		$data['return'] = $this->mod_blog->get_all_blog($data);
		echo json_encode($data['return']);

	}

	public function create() {

		$fields = array(
			'email_address' => $params['email_address'],
			'password' => $params['password'],
			'username' => $params['username'],
			'first_name' => $params['first_name'],
			'last_name' => $params['last_name'],
		);

		$fields['created_date'] = date('Y-m-d H:i:s');
		//perform the insert on db
		$result = $this->db->insert($this->table, $fields);

		if($result) {
		    $this->response($data, 200);
		} else {
			$this->response(array('error' => 'error :-( '),400);
		}

	}

	public function edit($id = 0)
	{

		$fields = array(
			'email_address' => $params['email_address'],
			'password' => $params['password'],
			'username' => $params['username'],
			'first_name' => $params['first_name'],
			'last_name' => $params['last_name'],
		);


		//check if data exist
	 	$conditions = array(
			'id' => $params['user_id'],
			'deleted_flag' => 0
		);
		$query = $this->db->get_where($this->table,$conditions);
		$results = $query->result_array();

		if (!empty($results)){
			$fields['updated_date'] = date('Y-m-d H:i:s');
			//perform the update on db
			$this->db->where($conditions);
			$this->db->update($this->table, $fields);

			if($result) {
			    $this->response($data, 200);
			} else {
				$this->response(array('error' => 'error :-( '),400);
			}
			
		} 

	} // end function edit



	public function delete($params)
	{

		if ($params) {
			foreach ($params as $user_id) {
				$fields = array(
					'deleted_flag' => 1,
				);
				
				$conditions = array(
					'id' => $user_id,
				);

				$this->db->where($conditions);
				$result = $this->db->update($this->table, $fields);

				if($result) {
				    $this->response($data, 200);
				} else {
					$this->response(array('error' => 'error :-( '),400);
				}

			}
		}
	}


}
