<?php

class Model_packages extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getPackageData($packageId = null)
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
