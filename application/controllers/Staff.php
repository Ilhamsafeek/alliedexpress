<?php

class Staff extends Admin_Controller
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
		$user_data = $this->model_users->getUserData('staff');
		$this->data['user_data'] = $user_data;

		$this->render_template('staff/index', $this->data);
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
			redirect('users/index', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('users/index', 'refresh');
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
