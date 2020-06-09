<?php

class Model_dashboard extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
		$this->load->model('model_project');
	}


	// Payment

	/* get the orders data */
	public function getPaymentData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM payment_history INNER JOIN projects ON payment_history.project_id=projects.appeal_id 
								 WHERE payment_history.user_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM payment_history INNER JOIN projects ON payment_history.project_id=projects.appeal_id 
			ORDER BY payment_history.id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
