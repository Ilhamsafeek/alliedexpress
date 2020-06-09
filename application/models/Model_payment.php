<?php

class Model_payment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
		$this->load->model('model_project');
	}


	// get the orders item data
	public function getOrdersItemData($order_id = null)
	{
		if (!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM invoice_detail WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('user_id');

		$invoice_id = $this->db->insert_id();
		$data = array(

			'date_time' => $this->input->post('payment_date'),
			'customer' => $this->input->post('customer'),
			'type' => 'Payment',
			'paid_status' => 'closed',
			'total' => $this->input->post('amount'),
			'user_id' => $user_id,
		);

		$insert = $this->db->insert('sales', $data);

		return ($invoice_id) ? $invoice_id : false;
	}

	public function countOrderItem($order_id)
	{
		if ($order_id) {
			$sql = "SELECT * FROM order_items WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}



	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('invoice');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('order_items');
			return ($delete == true && $delete_item) ? true : false;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}


	// Payment

	public function createPayment()
	{
		unset($_POST['paymentMethodNonce']);
		$paymentid = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$data['date_time'] = date("M d,Y");


		$insert = $this->db->insert('payment_history', $data);


		return ($insert == true) ? true : false;
	}


	/* get the orders data */
	public function getPaymentData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM payment_history INNER JOIN projects ON payment_history.project_id=projects.appeal_id 
			INNER JOIN project_sub_categories ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id
			INNER JOIN project_category ON projects.project_category_id=project_category.project_category_id
			INNER JOIN project_type ON projects.project_type_id=project_type.project_type_id
			 WHERE payment_history.user_id = ? ORDER BY payment_history.payment_id DESC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM payment_history INNER JOIN projects ON payment_history.project_id=projects.appeal_id 
		INNER JOIN project_sub_categories ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id
		INNER JOIN project_category ON projects.project_category_id=project_category.project_category_id
		INNER JOIN project_type ON projects.project_type_id=project_type.project_type_id
		ORDER BY payment_history.payment_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getMonthlyReceivedDonation()
	{
		$sql = "SELECT SUM(paid_amount) AS total_collected, SUBSTRING_INDEX(`date_time`, ' ', 1) AS month FROM payment_history WHERE status='approved' AND date_time LIKE ? GROUP BY SUBSTRING_INDEX(`date_time`, ' ', 1)";
		$query = $this->db->query($sql, array('%' . date("Y")));
		return $query->result_array();
	}

	public function updateBankSlip($id, $imageUrl)
	{
		log_message('error', 'model payment===============================' . $id . '....' . $imageUrl);
		$this->db->set('slip_url', $imageUrl);
		$this->db->where('payment_id', $id);
		$update = $this->db->update('payment_history');

		return $update;
	}

	public function editPayment($data)
	{
		if (empty($_FILES['receipt']['name'])) {
			unset($_FILES['receipt']);
		}

		$receipt = null;


		if (!empty($_FILES['receipt']['name'])) {
			$document_filename = date("Ymdhis") . "-" . $_FILES['receipt']['name'];
			$receipt =  base_url('assets/documents/receipt/') . $document_filename;

			// Set preference
			$config['upload_path'] = 'assets/documents/receipt/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $document_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('receipt')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}
		if ($data['status'] == 'approved') {
			$this->db->set('receipt_url', $receipt);
		}else{
			$this->db->set('cancel_reason',$data['cancel_reason']);
		}
		$this->db->set('status', $data['status']);
		$this->db->where('payment_id', $data['id']);
		$approve = $this->db->update('payment_history');

		$update = true;
		if ($data['status'] == 'approved') {
			$update = $this->model_project->updateCollectedAmount($data['project_id'], $data['paid_amount']);
		}
		return ($update == true && $approve == true) ? true : false;
	}

	public function getTotalDonation()
	{
		$sql = "SELECT SUM(paid_amount) AS total FROM payment_history WHERE status='approved'";
		$query = $this->db->query($sql);

		return $query->row_array()['total'];
	}


}
