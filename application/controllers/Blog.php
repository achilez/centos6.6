<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_user','mod_blog')); 
    }


	public function index() {

		if (!$this->session->userdata('logged_in'))
			redirect('blog/login');

		$data['base_url'] = base_url();
		$data['results'] = $this->mod_blog->get_all_blog($data);

		$this->load->view('blog/index', $data);

	}

	public function login() {

		if ($this->session->userdata('logged_in'))
			redirect('blog/index');


		$this->load->view('blog/login');

	}

	public function auth() {


		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_account');
		$this->form_validation->set_rules('password','Password','required|md5|trim');

		if ($this->form_validation->run()) {
			redirect('blog/index');
		} else {
			$this->load->view('blog/login');
		}

	}

	public function logout(){

		$this->session->sess_destroy();
		$this->session->set_userdata('logged_in', FALSE);
		redirect('blog/login');


	}

	public function validate_account() {

		if ($this->mod_user->can_login()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_account', 'Invalid account');
			return false;			
		}

	}

	public function post($slug) {

		if (!$this->session->userdata('logged_in'))
			redirect('blog/login');

		$data['base_url'] = base_url();
		$data['results'] = $this->mod_blog->get_post_by_slug($slug);
		$data['comments'] = $this->mod_blog->get_comments_by_post($slug);

		$this->load->view('blog/post', $data);
		
	}

}
