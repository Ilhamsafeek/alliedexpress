<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Colombo');
	}
}

class Admin_Controller extends MY_Controller
{

	var $permission = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_chat');
		$role_data = array();
		if (empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		} else {
			$user_id = $this->session->userdata('id');
			$this->load->model('model_roles');
			$role_data = $this->model_roles->getUserRoleByUserId($user_id);

			$this->data['user_permission'] = unserialize($role_data['permission']);

			$this->permission = unserialize($role_data['permission']);


			//Chat messages
			$chat_data = $this->model_chat->getChatByUserId($user_id);
			$this->data['chat_data'] = array_slice($chat_data, 0, 5);
		}
	}

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if ($session_data['logged_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if ($session_data['logged_in'] == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{

		$this->load->view('template/header', $data);
		if ($page != 'login') {
			$this->load->view('template/navbar');
			$this->load->view('template/sidebar');
		}
		$this->load->view($page);
		$this->load->view('template/footer');
	}
}
