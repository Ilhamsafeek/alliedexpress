<?php

class Agents extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_users');
		$this->load->model('model_areas');
	}

	public function index()
	{

		$user_data = $this->model_users->getUserData('agent');
		$this->data['user_data'] = $user_data;
		$city_data = $this->model_areas->getCityData();
		$this->data['city_data'] = $city_data;
		$this->render_template('agents/index', $this->data);
	}

	public function create()
	{

		if (!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('roles', 'Role', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');


		if ($this->form_validation->run() == TRUE) {
			// true case
			$password = $this->password_hash($this->input->post('password'));
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $password,
				'email' => $this->input->post('email'),
				'firstname' => $this->input->post('fname'),
				'lastname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'role_id' => $this->input->post('roles')
			);

			$create = $this->model_users->create($data);
			if ($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('users/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('users/create', 'refresh');
			}
		} else {
			// false case
			$role_data = $this->model_roles->getRoleData();
			$this->data['role_data'] = $role_data;

			$this->render_template('users/create', $this->data);
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{
		$update = $this->model_users->editUser($id);
		if ($update == true) {

			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('agents', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('agents', 'refresh');
		}
	}

	public function delete($id)
	{

		if (!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if ($id) {
			if ($this->input->post('confirm')) {


				$delete = $this->model_users->delete($id);
				if ($delete == true) {
					$this->session->set_flashdata('success', 'Successfully removed');
					redirect('users/', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error occurred!!');
					redirect('users/delete/' . $id, 'refresh');
				}
			} else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}
		}
	}
}
