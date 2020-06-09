<?php

class Model_job extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	/* get the orders data */
	public function getJobData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM job WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM job ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function createJob()
	{
	
		$invoice_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
	
		$data['date_time'] = date("M d,Y h:i a");
		

		$insert = $this->db->insert('job', $data);

		return ($insert == true) ? true : false;
	}

	

	public function edit()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		
		$this->db->where('id', $data['id']);
		$update = $this->db->update('job', $data);

		return ($update == true) ? true : false;
	}


	public function delete()
	{
		    
			$this->db->where('id', $this->input->post('id'));
			$delete = $this->db->delete('job');
			return $delete;
		
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}


	
}
