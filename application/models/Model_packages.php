<?php

class Model_packages extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getPackageData($packageId = null, $userType = null)
	{
		if ($packageId) {
			$sql = "SELECT * FROM packages 
			INNER JOIN users ON packages.customer_id=users.user_id
			INNER JOIN city ON packages.city_id=city.city_id
			INNER JOIN zone ON zone.zone_id=city.zone_id
			WHERE packages.package_id = ?";
			$query = $this->db->query($sql, array($packageId));
			return $query->row_array();
		}


		$sql = "SELECT * FROM packages 
		INNER JOIN users ON packages.customer_id=users.user_id
		INNER JOIN city ON packages.city_id=city.city_id
			INNER JOIN zone ON zone.zone_id=city.zone_id
		ORDER BY packages.package_id DESC";
		$query = $this->db->query($sql);

		$session_data = $this->session->userdata();

		if ($session_data['logged_in'] == TRUE) {
			if ($this->session->userdata()['type'] == 'customer') {
				$sql = "SELECT * FROM packages 
		INNER JOIN users ON packages.customer_id=users.user_id
		INNER JOIN city ON packages.city_id=city.city_id
			INNER JOIN zone ON zone.zone_id=city.zone_id
			WHERE packages.customer_id = ?
		ORDER BY packages.package_id DESC";
				$query = $this->db->query($sql, $this->session->userdata()['id']);
			} elseif ($this->session->userdata()['type'] == 'rider' || $this->session->userdata()['type'] == 'agent') {
				$sql = "SELECT * FROM packages 
		INNER JOIN users ON packages.customer_id=users.user_id
		INNER JOIN city ON packages.city_id=city.city_id
			INNER JOIN zone ON zone.zone_id=city.zone_id
			WHERE packages.rider_or_agent_id = ?
		ORDER BY packages.package_id DESC";
				$query = $this->db->query($sql, $this->session->userdata()['id']);
			}
		}
		return $query->result_array();
	}


	public function createPackage()

	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$create = $this->db->insert('packages', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}


	public function editPackage($id)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('package_id', $id);
		$update = $this->db->update('packages', $data);

		return ($update == true) ? true : false;
	}

	public function updateByPhone()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->where('phone', $data['phone']);
		$update = $this->db->update('users', $data);

		return ($update == true) ? true : false;
	}


	public function delete($id)
	{
		$this->db->where('package_id', $id);
		$delete = $this->db->delete('packages');
		return ($delete == true) ? true : false;
	}

	public function countTotalPackages()
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



	//Reports

	public function totalMonthlyPackages()
	{

		$sql = "SELECT DISTINCT(package_id) FROM packages WHERE MONTH(date) = MONTH(CURRENT_DATE())";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function totalDailyPackages()
	{

		$sql = "SELECT DISTINCT(package_id) FROM packages WHERE DAY(date) = DAY(CURRENT_DATE())";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function totalMonthlyStatusPackages($status)
	{

		$sql = "SELECT DISTINCT(package_id) FROM packages WHERE MONTH(last_status_update_date) = MONTH(CURRENT_DATE()) AND delivery_status=?";
		$query = $this->db->query($sql, $status);
		return $query->num_rows();
	}

	public function totalDailyStatusPackages($status)
	{

		$sql = "SELECT DISTINCT(package_id) FROM packages WHERE DAY(last_status_update_date) = DAY(CURRENT_DATE()) AND delivery_status=?";
		$query = $this->db->query($sql, $status);
		return $query->num_rows();
	}


	public function totalMonthlyCOD()
	{

		$sql = "SELECT SUM(cod_amount)  AS total FROM packages WHERE MONTH(last_status_update_date) = MONTH(CURRENT_DATE()) AND delivery_status='delivered'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalDailyCOD()
	{

		$sql = "SELECT SUM(cod_amount) AS total FROM packages WHERE DAY(last_status_update_date) = DAY(CURRENT_DATE()) AND delivery_status='delivered'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalMonthlyCourier()
	{
		$sql = "SELECT SUM(courier_charge)  AS total FROM packages WHERE MONTH(last_status_update_date) = MONTH(CURRENT_DATE()) AND delivery_status='delivered'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalDailyCourier()
	{
		$sql = "SELECT SUM(courier_charge) AS total FROM packages WHERE DAY(last_status_update_date) = DAY(CURRENT_DATE()) AND delivery_status='delivered'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalMonthlyExpense()
	{
		$sql = "SELECT SUM(amount)  AS total FROM expenses WHERE MONTH(date) = MONTH(CURRENT_DATE())";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalDailyExpense()
	{
		$sql = "SELECT SUM(amount) AS total FROM expenses WHERE DAY(date) = DAY(CURRENT_DATE())";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalMonthlyPending()
	{
		$sql = "SELECT (SUM(cod_amount)-SUM(courier_charge)) AS total FROM packages WHERE MONTH(last_status_update_date) = MONTH(CURRENT_DATE()) AND (delivery_status='delivered' || delivery_status='returned') AND customer_payment_id=''";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function totalDailyPending()
	{
		$sql = "SELECT (SUM(cod_amount)-SUM(courier_charge)) AS total FROM packages WHERE DAY(last_status_update_date) = DAY(CURRENT_DATE()) AND (delivery_status='delivered' || delivery_status='returned') AND customer_payment_id=''";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function monthlyCourierCharge()
	{
		$sql = "SELECT SUM(courier_charge) AS total, MONTH(last_status_update_date) AS month 
		FROM packages 
		WHERE YEAR(last_status_update_date) = YEAR(CURRENT_DATE()) 
		AND (delivery_status='delivered' OR delivery_status='returned')
		GROUP BY MONTH(last_status_update_date)";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function monthlyExpenses()
	{
		$sql = "SELECT SUM(amount) AS total, MONTH(date) AS month 
		FROM expenses 
		WHERE YEAR(date) = YEAR(CURRENT_DATE()) 
		GROUP BY MONTH(date)";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
