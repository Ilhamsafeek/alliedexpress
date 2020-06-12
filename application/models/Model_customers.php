<?php

class Model_customers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getCustomerData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM customers WHERE customer_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM customers ORDER BY customer_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function create()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$create = $this->db->insert('customers', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}


	public function edit($id)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('customer_id', $id);
		$update = $this->db->update('customers', $data);

		return ($update == true) ? true : false;
	}



	public function delete($id)
	{
		$this->db->where('customer_id', $id);
		$delete = $this->db->delete('customers');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countTotalDonors()
	{
		$sql = "SELECT DISTINCT(user_id)  FROM payment_history";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function getDonors()
	{
		$sql = "SELECT DISTINCT(user_id) FROM payment_history";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function countryWiseTotalUsers()
	{
		$sql = "SELECT COUNT(*) AS total_users, country FROM users GROUP BY country";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
