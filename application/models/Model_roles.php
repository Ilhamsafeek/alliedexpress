<?php 

class Model_roles extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getRoleData($roleId = null) 
	{
		if($roleId) {
			$sql = "SELECT * FROM roles WHERE id = ?";
			$query = $this->db->query($sql, array($roleId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM roles WHERE id!=? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1)); //if array 1 it will not show super admin role
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('roles', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('roles', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('roles');
		return ($delete == true) ? true : false;
	}

	public function existInUserRole($id)
	{
		$sql = "SELECT * FROM users WHERE role_id = ?";
		$query = $this->db->query($sql, array($id));
		return ($query->num_rows() == 1) ? true : false;
	}
	public function getUserRoleByUserId($user_id) 
	{
		$sql = "SELECT * FROM users 
		INNER JOIN roles ON roles.id = users.role_id 
		WHERE users.user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->row_array();
		return $result;

	}
}