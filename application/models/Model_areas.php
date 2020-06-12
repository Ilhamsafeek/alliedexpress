<?php

class Model_areas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getAreaData($areaId = null)
	{
		if ($areaId) {
			$sql = "SELECT * FROM areas WHERE area_id = ?";
			$query = $this->db->query($sql, array($areaId,));
			return $query->row_array();
		}

		$sql = "SELECT * FROM areas ORDER BY area_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getCityData($areaId = null)
	{
		if ($areaId) {
			$sql = "SELECT * FROM city INNER JOIN zone ON city.zone_id=zone.zone_id WHERE city.city_id = ?";
			$query = $this->db->query($sql, array($areaId,));
			return $query->row_array();
		}

		$sql = "SELECT * FROM city INNER JOIN zone ON city.zone_id=zone.zone_id ORDER BY city_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getZoneData($areaId = null)
	{
		if ($areaId) {
			$sql = "SELECT * FROM zone WHERE zone_id = ?";
			$query = $this->db->query($sql, array($areaId,));
			return $query->row_array();
		}

		$sql = "SELECT * FROM zone ORDER BY zone_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function createCity()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$create = $this->db->insert('city', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}

	public function editCity($id)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('city_id', $id);
		$update = $this->db->update('city', $data);

		return ($update == true) ? true : false;
	}


	public function deleteCity($id)
	{
		$this->db->where('city_id', $id);
		$delete = $this->db->delete('city');
		return ($delete == true) ? true : false;
	}


	public function createZone()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$create = $this->db->insert('zone', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}

	public function editZone($id)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('zone_id', $id);
		$update = $this->db->update('zone', $data);

		return ($update == true) ? true : false;
	}


	public function deleteZone($id)
	{
		$this->db->where('zone_id', $id);
		$delete = $this->db->delete('zone');
		return ($delete == true) ? true : false;
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
		$this->db->where('user_id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}
}
