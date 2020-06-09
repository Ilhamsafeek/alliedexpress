<?php

class Model_project extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
		$this->load->model('model_masterfiles');
	}

	/* get the orders data */
	public function getProjectData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM projects INNER JOIN project_sub_categories 
			ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id 
			INNER JOIN project_category 
			ON projects.project_category_id=project_category.project_category_id
			INNER JOIN project_type 
			ON projects.project_type_id=project_type.project_type_id
			WHERE projects.id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		// $sql = "SELECT * FROM projects INNER JOIN project_sub_categories ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id ORDER BY projects.id DESC";
		$sql = "SELECT * FROM projects INNER JOIN project_sub_categories 
							ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id 
							INNER JOIN project_category 
							ON projects.project_category_id=project_category.project_category_id
							INNER JOIN project_type 
							ON projects.project_type_id=project_type.project_type_id
							ORDER BY projects.id DESC";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProjectDataByAppealID($appeal_id = null)
	{

		$sql = "SELECT * FROM projects INNER JOIN project_sub_categories 
			ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id 
			INNER JOIN project_category 
			ON projects.project_category_id=project_category.project_category_id
			INNER JOIN project_type 
			ON projects.project_type_id=project_type.project_type_id
			WHERE projects.appeal_id = ?";
		$query = $this->db->query($sql, array($appeal_id));
		return $query->row_array();

		return $query->result_array();
	}


	public function create()
	{
		$user_id = $this->session->userdata('user_id');

		$invoice_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		if (!empty($_FILES['featured_image']['name'])) {
			$photo_filename = date("Ymdhis") . "-" . $_FILES['featured_image']['name'];
			$data['featured_image'] =  base_url('assets/images/project_supportive/img/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/img/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('featured_image')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$data['user_id'] = $user_id;
		$data['collected'] = '0';
		$data['date'] = date("M d, Y");
		$data['rating'] = $this->calculateRating($data);

		$data['appeal_id'] = $this->generateAppealId($data);

		$insert = $this->db->insert('projects', $data);
		$notify = $this->model_api->pushNotification("Posted New Appeal", "project", "", $data['appeal_id']);

		return ($insert == true) ? true : false;
	}

	public function generateAppealId($data)
	{
		$category_data = $this->model_masterfiles->getSubCategoryData($data['project_sub_category_id']);


		$expr = '/(?<=\s|^)[A-Z]/';
		preg_match_all($expr, $category_data['category'], $matches);
		$short_code = implode('', $matches[0]);
		$sql = "SELECT appeal_id AS maximum_appeal_id FROM projects WHERE appeal_id LIKE ? ORDER BY LENGTH(appeal_id) DESC,appeal_id DESC LIMIT 0,1";
		$query = $this->db->query($sql, array($short_code . '%'));

		$id = 1;
		if ($query->num_rows() == 1) {
			$manixum_appeal_id = $query->row_array()['maximum_appeal_id'];
			preg_match("|\d+|", $manixum_appeal_id, $matches);
			$id = (int) $matches[0] + 1;
		}

		return $short_code . $id;
	}

	public function countOrderItem($order_id)
	{
		if ($order_id) {
			$sql = "SELECT * FROM order_items WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function edit($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$data['rating'] = $this->calculateRating($data);

		if (!empty($_FILES['featured_image']['name'])) {
			$photo_filename = date("Ymdhis") . "-" . $_FILES['featured_image']['name'];
			$data['featured_image'] =  base_url('assets/images/project_supportive/img/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/img/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('featured_image')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$this->db->where('id', $id);
		$update = $this->db->update('projects', $data);

		return ($update == true) ? true : false;
	}

	//Update funtion created in addition to edit function 

	public function update($data)
	{

		$this->db->where('id', $data['id']);
		$update = $this->db->update('projects', $data);

		return ($update == true) ? true : false;
	}

	public function updateCollectedAmount($id, $amount)
	{
		$amount = (float) $amount;
		$collected = 'collected+' . $amount;
		$this->db->set('collected', $collected, false);
		$this->db->where('appeal_id', $id);
		$update = $this->db->update('projects');

		return ($update == true) ? true : false;
	}



	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('projects');
			return $delete;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}


	/* get the categories data */
	public function getSubCategoryData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM project_sub_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM project_sub_categories ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createSubCategory()
	{

		$sub_category_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}


		$insert = $this->db->insert('project_sub_categories', $data);

		return ($insert == true) ? true : false;
	}

	public function editSubCategory($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('id', $id);
		$update = $this->db->update('project_sub_categories', $data);

		return ($update == true) ? true : false;
	}


	public function deleteSubCategory($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('project_sub_categories');
			return $delete;
		}
	}

	public function calculateRating($data)
	{
		$rating = 0;

		//Married Status
		if ($data['married_status'] == 'Single') {
			$rating = 0.5;
		} elseif ($data['married_status'] == 'Widow') {
			$rating = 1.5;
		} else {
			$rating = 1;
		}

		//Age		
		if ((int) $data['age'] >= 30 && (int) $data['age'] <= 40) {
			$rating = $rating + 0.5;
		} elseif ((int) $data['age'] >= 40 && (int) $data['age'] <= 50) {
			$rating = $rating + 1.5;
		} elseif ((int) $data['age'] > 50) {
			$rating = $rating + 1;
		}

		//Income		
		if ((int) $data['income'] <= 10000) {
			$rating = $rating + 1.5;
		} elseif ((int) $data['income'] >= 10000 && (int) $data['income'] <= 25000) {
			$rating = $rating + 1;
		} elseif ((int) $data['income'] > 25000) {
			$rating = $rating + 1;
		}

		//Children		
		if ((int) $data['children'] >= 3) {
			$rating = $rating + 1.5;
		} else {
			$rating = $rating + 1;
		}

		return $rating;
	}

	/* get the orders data */
	public function getPaymentData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM payment_history WHERE payment_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payment_history ORDER BY payment_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function countTotalProjects()
	{
		$sql = "SELECT * FROM projects";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countTotalCompletedProjects()
	{
		$sql = "SELECT * FROM projects WHERE amount<=collected AND completed_percentage<>'100'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countTotalInprogressProjects()
	{
		$sql = "SELECT * FROM projects WHERE completed_percentage='100'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function getCountrywiseProjects()
	{
		$sql = "SELECT COUNT(*) AS total, district FROM projects GROUP BY district";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getMonthlyProjects()
	{
		$sql = "SELECT COUNT(*) AS total_projects, SUBSTRING_INDEX(`date`, ' ', 1) AS month FROM projects WHERE date LIKE ? GROUP BY SUBSTRING_INDEX(`date`, ' ', 1)";
		$query = $this->db->query($sql, array('%' . date("Y")));
		return $query->result_array();
	}


	public function TypeWiseProjects()
	{
		$sql = "SELECT COUNT(*) AS total_projects, project_type.project_type as project_type FROM projects INNER JOIN project_sub_categories 
		ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id 
		INNER JOIN project_category 
		ON projects.project_category_id=project_category.project_category_id
		INNER JOIN project_type 
		ON projects.project_type_id=project_type.project_type_id
		GROUP BY projects.project_type_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function TypeWiseCollection()
	{
		$sql = "SELECT Sum(collected) AS total_collected, project_type.project_type as project_type FROM projects INNER JOIN project_sub_categories 
		ON projects.project_sub_category_id=project_sub_categories.project_sub_category_id 
		INNER JOIN project_category 
		ON projects.project_category_id=project_category.project_category_id
		INNER JOIN project_type 
		ON projects.project_type_id=project_type.project_type_id
		GROUP BY projects.project_type_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getTotalTransfered()
	{
		$sql = "SELECT (SUM(transfered_25)+SUM(transfered_50)+SUM(transfered_75)+SUM(transfered_100)) AS total FROM projects";
		$query = $this->db->query($sql);

		return $query->row_array()['total'];
	}
}
