<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {

	protected $table = 'users';

    function __construct()
    {
        parent::__construct();
    } //construct


	public function get_users($params){
		$this->db->select($params['fields']); //select the fields from table
		$this->db->order_by($params['order']);
		$query = $this->db->get_where($this->table,$params['conditions']);

		return $query->result_array();
	} //get_users

	public function update($params){

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
			
		} else {
			$fields['created_date'] = date('Y-m-d H:i:s');
			//perform the insert on db
			$this->db->insert($this->table, $fields);

		}

		
	} // update

	public function delete($params){

		if ($params) {
			foreach ($params as $user_id) {
				$fields = array(
					'deleted_flag' => 1,
				);
				
				$conditions = array(
					'id' => $user_id,
				);

				$this->db->where($conditions);
				$this->db->update($this->table, $fields);
			}
		}

	} // delete

	public function can_login(){

		$login = false;
		$this->db->where('email_address',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('users');

		foreach($query->result() as $i=>$row){
			$tag = array(
			                   'user_id'  => $row->id,
			                   'email_address'     => $row->email_address,
			                   'username'     => $row->username,
			                   'first_name'     => $row->first_name,
			                   'last_name'     => $row->last_name,
			                   'logged_in' => TRUE
			               );


			$this->session->set_userdata($tag);
			$login = true;

		}
		return $login;

	}


} //class
