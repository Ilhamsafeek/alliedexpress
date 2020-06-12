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
		$user_data = $this->model_users->getUserData('admin');

		$this->data['account_data'] = $user_data;

		$this->render_template('profile/index', $this->data);
	}


	public function create($page)
	{


		$password = $this->password_hash($this->input->post('password'));
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $password,
			'email' => $this->input->post('email'),
			'commission' => $this->input->post('commission'),
			'phone' => $this->input->post('phone'),
			'type' => $this->input->post('type'),
			'city_id' => $this->input->post('city_id'),

		);

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

		if (empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
			$data = array(
				'username' => $this->input->post('username'),

				'email' => $this->input->post('email'),
				'commission' => $this->input->post('commission'),
				'phone' => $this->input->post('phone'),
				'city_id' => $this->input->post('city_id'),

			);

			$update = $this->model_users->edit($data, $id);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect($page, 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect($page, 'refresh');
			}
		} else {


			$password = $this->password_hash($this->input->post('password'));

			$data = array(
				'password' => $password,
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'commission' => $this->input->post('commission'),
				'phone' => $this->input->post('phone'),
				'city_id' => $this->input->post('city_id'),

			);

			$update = $this->model_users->edit($data, $id);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully updated');
				redirect($page, 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect($page, 'refresh');
			}
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
