<?php

class Expenses extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_expenses');
		// $this->load->model('model_roles');
	}

	public function index()
	{

		$espense_data = $this->model_expenses->getExpenseData();
		$this->data['expense_data'] = $espense_data;
		$this->render_template('expenses/index', $this->data);
	}


	public function createExpense()
	{

		$create = $this->model_expenses->createExpense();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('expenses', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('expenses', 'refresh');
		}
		// } 
	}


	public function editExpense($id = null)
	{
		$update = $this->model_expenses->editExpense($id);
		if ($update == true) {
			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('expenses', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('expenses', 'refresh');
		}
	}

	public function deleteExpense($id)
	{

		if ($id) {

			$delete = $this->model_expenses->deleteExpense($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('expenses', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('expenses', 'refresh');
			}
		}
	}
}
