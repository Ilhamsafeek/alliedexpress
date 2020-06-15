<?php

class Model_expenses extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getExpenseData($expenseId = null)
	{
		if ($expenseId) {
			$sql = "SELECT * FROM expenses WHERE expense_id = ?";
			$query = $this->db->query($sql, array($expenseId,));
			return $query->row_array();
		}

		$sql = "SELECT * FROM expenses ORDER BY expense_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function createExpense()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$create = $this->db->insert('expenses', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}

	public function editExpense($id)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('expense_id', $id);
		$update = $this->db->update('expenses', $data);

		return ($update == true) ? true : false;
	}


	public function deleteExpense($id)
	{
		$this->db->where('expense_id', $id);
		$delete = $this->db->delete('expenses');
		return ($delete == true) ? true : false;
	}
}
