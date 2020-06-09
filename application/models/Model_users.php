<?php

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserDataByPhone($phone)
	{

		$sql = "SELECT * FROM users INNER JOIN roles ON users.role_id=roles.id WHERE users.phone = ?";
		$query = $this->db->query($sql, array($phone));
		return $query->row_array();
	}

	public function getUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users ORDER BY user_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getUserRole($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$role_id = $result['role_id'];
			$g_sql = "SELECT * FROM roles WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($role_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
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

	public function editUser($id)
	{
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
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

		$this->db->where('phone',$data['phone']);
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
