<?php

class Model_admins extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAdminData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE user_id = ? AND password <> ''";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE password <> '' ORDER BY user_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getAdminRole($userId = null)
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
			$create = $this->db->insert('admins', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $role_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('admins', $data);

		if ($role_id) {
			// user group
			$update_user_role = array('role_id' => $role_id);
			$this->db->where('id', $id);
			$user_role = $this->db->update('admins', $update_user_role);
			return ($update == true && $user_role == true) ? true : false;
		}

		return ($update == true) ? true : false;
	}

	public function updateByPhone($data = array(), $phone)
	{
		$this->db->where('phone', $phone);
		$update = $this->db->update('admins', $data);


		return ($update == true) ? true : false;
	}


	public function delete($id)
	{
		$data = array(
			'password' => '',
		
		);
		$this->db->where('user_id', $id);
		$update = $this->db->update('users', $data);

		return ($update == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM admins WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
