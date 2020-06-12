<?php

class Customers extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customers';

		$this->load->model('model_customers');
		// $this->load->model('model_roles');
	}

	public function index()
	{


		$customer_data = $this->model_customers->getCustomerData();


		$this->data['customer_data'] = $customer_data;

		$this->render_template('customers/index', $this->data);
	}

	public function create()
	{

		// $this->form_validation->set_rules('company', 'Company', 'required');
		// $this->form_validation->set_rules('name', 'Name', 'trim|required');
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[customers.email]');
		// $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[8]');
		// $this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		// $this->form_validation->set_rules('account_no', 'Account Number', 'trim|required');
		// $this->form_validation->set_rules('branch', 'Branch', 'trim|required');


		// if ($this->form_validation->run() == TRUE) {

		$create = $this->model_customers->create();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('customers/', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('customers/', 'refresh');
		}
		// } 
	}


	public function edit($id = null)
	{
		$update = $this->model_customers->edit($id);
		if ($update == true) {

			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('customers/', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('customers/', 'refresh');
		}
	}

	public function delete($id)
	{

		if ($id) {

			$delete = $this->model_customers->delete($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('customers/', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('customers/', 'refresh');
			}
		}
	}
}
