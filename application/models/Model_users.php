<?php

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getUserData($type, $userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users 
			INNER JOIN city ON city.city_id=users.city_id
			INNER JOIN zone ON city.zone_id=zone.zone_id 
			
			WHERE users.user_id = ? AND users.type = ?";
			$query = $this->db->query($sql, array($userId, $type));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users 
		INNER JOIN city ON city.city_id=users.city_id
		INNER JOIN zone ON city.zone_id=zone.zone_id 
		WHERE users.type = ? ORDER BY users.user_id DESC";
		$query = $this->db->query($sql, $type);
		return $query->result_array();
	}

	public function getNonAdminData()
	{


		$sql = "SELECT * FROM users 
		INNER JOIN city ON city.city_id=users.city_id
		INNER JOIN zone ON city.zone_id=zone.zone_id 
		WHERE users.type <> ? ORDER BY users.user_id DESC";
		$query = $this->db->query($sql, 'admin');
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


	// User Hit
	public function createUserHit($data = '')
	{

		if ($data) {
			$create = $this->db->insert('user_hit', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function countUserHit()
	{
		$sql = "SELECT COUNT(DISTINCT phone) AS user_hit, FROM_UNIXTIME(`time_stamp`, '%Y-%m') as time_stamp FROM user_hit GROUP BY FROM_UNIXTIME(`time_stamp`, '%Y-%m')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function countTotalRegistration()
	{
		$sql = "SELECT COUNT(*) AS total, FROM_UNIXTIME(`registered_time_stamp`, '%Y-%m') as time_stamp FROM users GROUP BY FROM_UNIXTIME(`registered_time_stamp`, '%Y-%m')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function edit($data = array(), $id = null, $role_id = null)
	{
		$this->db->where('user_id', $id);
		$update = $this->db->update('users', $data);

		if ($role_id) {
			// user group
			$update_user_role = array('role_id' => $role_id);
			$this->db->where('user_id', $id);
			$user_role = $this->db->update('users', $update_user_role);
			return ($update == true && $user_role == true) ? true : false;
		}

		return ($update == true) ? true : false;
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
