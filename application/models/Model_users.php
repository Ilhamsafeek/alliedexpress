<?php

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getUserData($type, $userId = null)
	{
		if ($type == 'customer') {
			if ($userId) {
				$sql = "SELECT * FROM users 		
				WHERE users.user_id = ? AND users.type = ?";
				$query = $this->db->query($sql, array($userId, $type));
				return $query->row_array();
			}

			$sql = "SELECT * FROM users 
			WHERE users.type = ? ORDER BY users.user_id DESC";
			$query = $this->db->query($sql, $type);
			return $query->result_array();
		}
		if ($userId) {
			$sql = "SELECT * FROM users 			
			INNER JOIN zone ON users.zone_id=zone.zone_id 			
			WHERE users.user_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users 		
		INNER JOIN zone ON users.zone_id=zone.zone_id 
		WHERE users.type = ? ORDER BY users.user_id DESC";
		$query = $this->db->query($sql, $type);
		return $query->result_array();
	}

	public function getNonAdminData()
	{

		$sql = "SELECT * FROM users 
	
		INNER JOIN zone ON users.zone_id=zone.zone_id 
		WHERE users.type <> ? AND users.type <> ? ORDER BY users.user_id DESC";
		$query = $this->db->query($sql, array('admin', 'staff'));
		return $query->result_array();
	}


	public function create($data = '')
	{

		if ($data) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}




	public function editUser($data, $id)
	{

		$this->db->where('user_id', $id);
		$update = $this->db->update('users', $data);

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
		$this->db->where('user_id', $id);
		$delete = $this->db->delete('users');
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
