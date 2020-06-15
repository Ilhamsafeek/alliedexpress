<?php

class Payment extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_expenses');
		$this->load->model('model_packages');
		$this->load->model('model_customers');
		$this->load->model('model_payment');
	}

	public function customer()
	{

		$customer_payment_data = $this->model_payment->getCustomerPaymentData();
		$this->data['customer_payment_data'] = $customer_payment_data;


		$city_data = $this->model_packages->getPackageData();
		$this->data['package_data'] = $city_data;

		$customer_data = $this->model_users->getUserData('customer');
		$this->data['customer_data'] = $customer_data;

		$this->render_template('payment/customer', $this->data);
	}

	public function createCustomerPayment()
	{

		$create = $this->model_payment->createCustomerPayment();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('payment/customer', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('payment/customer', 'refresh');
		}
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

	public function deleteCustomerPayment($id)
	{

		if ($id) {

			$delete = $this->model_payment->deleteCustomerPayment($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('payment/customer', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('payment/customer', 'refresh');
			}
		}
	}

	//Agent to office  settlement

	public function agentToOffice()
	{

		$settlement_data = $this->model_payment->getAgentSettlementData();
		$this->data['settlement_data'] = $settlement_data;


		$city_data = $this->model_packages->getPackageData();
		$this->data['package_data'] = $city_data;

		$customer_data = $this->model_users->getUserData('customer');
		$this->data['customer_data'] = $customer_data;

		$this->render_template('payment/agent_to_office', $this->data);
	}

	public function createAgentSettlement()
	{

		$create = $this->model_payment->createAgentSettlement();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('payment/agenttooffice', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('payment/agenttooffice', 'refresh');
		}
	}


	public function deleteSettlement($id)
	{

		if ($id) {

			$delete = $this->model_payment->deleteSettlement($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('payment/agenttooffice', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('payment/agenttooffice', 'refresh');
			}
		}
	}
}
