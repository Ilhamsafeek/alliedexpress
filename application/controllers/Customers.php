<?php

class Customers extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customers';

		$this->load->model('model_customers');
		$this->load->model('model_users');
	}

	public function index()
	{


		$customer_data = $this->model_users->getUserData('customer');


		$this->data['customer_data'] = $customer_data;

		$this->render_template('customers/index', $this->data);
	}

	public function create()
	{
		$password = $this->password_hash($this->input->post('password'));

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$data['password'] = $password;
		$create = $this->model_users->create($data);
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('customers/', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('customers/', 'refresh');
		}
	}


	public function edit($id = null)
	{
		if (empty($this->input->post('password'))) {

			$data = array();
			foreach ($_POST as $key => $value) {
				$data[$key] = $value;
			}

			$update = $this->model_users->edit($data, $id);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('customers', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('customers', 'refresh');
			}
		} else {


			$password = $this->password_hash($this->input->post('password'));

			$data = array();
			foreach ($_POST as $key => $value) {
				$data[$key] = $value;
			}
			$data['password'] = $password;

			$update = $this->model_users->edit($data, $id);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully updated');
				redirect('customers', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('customers', 'refresh');
			}
		}
	}

	public function delete($id)
	{

		if ($id) {

			$delete = $this->model_users->delete($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('customers/', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('customers/', 'refresh');
			}
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
}
