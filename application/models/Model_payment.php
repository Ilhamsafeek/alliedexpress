<?php

class Model_payment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
		$this->load->model('model_project');
	}


	public function getCustomerPaymentData($payment_id = null)
	{
		if ($payment_id) {
			$sql = "SELECT * FROM customer_payment INNER JOIN users ON customer_payment.customer_id=users.user_id WHERE customer_payment_id = ?";
			$query = $this->db->query($sql, array($payment_id,));
			return $query->row_array();
		}
		$sql = "SELECT * FROM customer_payment INNER JOIN users ON customer_payment.customer_id=users.user_id  ORDER BY customer_payment_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function createCustomerPayment()
	{


		$date = date_create();

		$data = array(
			'date' => $this->input->post('date'),
			'customer_id' => $this->input->post('customer_id'),
			'packages' => $this->input->post('packages'),
			'sub_total' => $this->input->post('sub_total'),
			'total_courier' => $this->input->post('total_courier'),
			'total' => $this->input->post('total'),
			'customer_payment_receipt_no' => date_timestamp_get($date)
		);


		$packageArray = explode(',', $this->input->post('packages'));

		$insert = $this->db->insert('customer_payment', $data);
		$invoice_id = $this->db->insert_id();
		foreach ($packageArray as $key => $package_id) {
			$this->updatePackage($invoice_id, $package_id);
		}


		return ($invoice_id) ? $invoice_id : false;
	}


	public function getAgentSettlementData($payment_id = null)
	{
		if ($payment_id) {
			$sql = "SELECT * FROM agent_to_office_settlement WHERE settlement_id = ?";
			$query = $this->db->query($sql, array($payment_id,));
			return $query->row_array();
		}
		$sql = "SELECT * FROM agent_to_office_settlement ORDER BY settlement_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createAgentSettlement()
	{

		$date = date_create();

		$data = array(
			'date' => $this->input->post('date'),
			'packages' => $this->input->post('packages'),
			'sub_total' => $this->input->post('sub_total'),
			'total_courier' => $this->input->post('total_courier'),
			'total' => $this->input->post('total'),
			'settlement_receipt_no' => date_timestamp_get($date)
		);

		$packageArray = explode(',', $this->input->post('packages'));

		$insert = $this->db->insert('agent_to_office_settlement', $data);
		$invoice_id = $this->db->insert_id();
		foreach ($packageArray as $key => $package_id) {

			$this->db->set('settlement_id', $invoice_id);
			$this->db->where('package_id', $package_id);
			$update = $this->db->update('packages');
		}


		return ($invoice_id) ? $invoice_id : false;
	}


	public function updatePackage($customer_payment_id, $package_id)
	{
		$this->db->set('customer_payment_id', $customer_payment_id);
		$this->db->where('package_id', $package_id);
		$update = $this->db->update('packages');

		return $update;
	}

	public function deleteCustomerPayment($id)
	{
		if ($id) {

			$this->db->where('customer_payment_id', $id);
			$delete_item = $this->db->delete('customer_payment');

			$this->db->set('customer_payment_id', '');
			$this->db->where('customer_payment_id', $id);
			$update = $this->db->update('packages');

			return ($delete_item) ? true : false;
		}
	}


	public function deleteSettlement($id)
	{
		if ($id) {

			$this->db->where('settlement_id', $id);
			$delete_item = $this->db->delete('agent_to_office_settlement');

			$this->db->set('settlement_id', '');
			$this->db->where('settlement_id', $id);
			$update = $this->db->update('packages');

			return ($delete_item) ? true : false;
		}
	}
}
