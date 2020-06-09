<?php

class Model_seeds extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserDataByDeviceID($device_id)
	{

		$sql = "SELECT * FROM seeds_users WHERE device_id = ?";
		$query = $this->db->query($sql, array($device_id));
		return $query->row_array();
	}

	public function getUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM seeds_users WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM seeds_users ORDER BY user_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getPostData()
	{

		$sql = "SELECT * FROM seeds_posts INNER JOIN seeds_users ON seeds_posts.device_id=seeds_users.device_id ORDER BY seeds_posts.post_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createAccount($data)
	{

		if ($data) {
			$create = $this->db->insert('seeds_users', $data);

			$user_id = $this->db->insert_id();
			return ($create == true) ? true : false;
		}
	}


	public function createPost($data)
	{

		if ($data) {
			$create = $this->db->insert('seeds_posts', $data);

			$user_id = $this->db->insert_id();
			return ($create == true) ? true : false;
		}
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

	public function updateAccount($device_id, $data)
	{

		$this->db->where('device_id', $device_id);
		$update = $this->db->update('seeds_users', $data);

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

	public function deletePost($id)
	{
		$this->db->where('post_id', $id);
		$delete = $this->db->delete('seeds_posts');
		return ($delete == true) ? true : false;
	}

}
