<?php

class Users extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_users');
	}

	public function index()
	{

		$user_data = $this->model_users->getUserData();

		$this->data['user_data'] = $user_data;

		$this->render_template('users/index', $this->data);
	}

	public function profile()
	{
		$user_data = $this->model_users->getUserData('all', $this->session->userdata()['id']);

		$this->data['account_data'] = $user_data;

		$this->render_template('profile/index', $this->data);
	}


	public function create($page)
	{

		$password = $this->password_hash($this->input->post('password'));

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$data['password'] = $password;


		$create = $this->model_users->create($data);
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully created');
			redirect($page, 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect($page, 'refresh');
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id, $page)
	{


		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		if (empty($this->input->post('password'))) {
			unset($data['password']);
		} else {
			$password = $this->password_hash($this->input->post('password'));
			$data['password'] = $password;
		}
		$update = $this->model_users->editUser($data, $id);
		if ($update == true) {
			$this->session->set_flashdata('success', 'Successfully created');
			redirect($page, 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect($page, 'refresh');
		}
	}

	public function delete($id, $page)
	{

		$delete = $this->model_users->delete($id);
		if ($delete == true) {
			$this->session->set_flashdata('success', 'Successfully removed');
			redirect($page, 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect($page, 'refresh');
		}
	}
}
