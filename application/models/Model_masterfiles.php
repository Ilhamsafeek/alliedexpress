<?php

class Model_masterfiles extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
	}

	//Project Type
	public function getProjectTypeData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM project_type INNER JOIN users ON project_type.manager_id=users.user_id WHERE project_type.project_type_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM project_type INNER JOIN users ON project_type.manager_id=users.user_id ORDER BY project_type.project_type_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function createProjectType()
	{

		$invoice_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$insert = $this->db->insert('project_type', $data);

		return ($insert == true) ? true : false;
	}

	public function editProjectType($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->where('project_type_id', $id);
		$update = $this->db->update('project_type', $data);

		return ($update == true) ? true : false;
	}


	public function deleteProjectType($id)
	{
		if ($id) {
			$this->db->where('project_type_id', $id);
			$delete = $this->db->delete('project_type');
			return $delete;
		}
	}

	// Project Category

	public function getProjectCategoryData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM project_category INNER JOIN project_type ON project_category.project_type_id=project_type.project_type_id WHERE project_category.project_category_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM project_category INNER JOIN project_type ON project_category.project_type_id=project_type.project_type_id ORDER BY project_category.project_category_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createProjectCategory()
	{
		if (empty($_FILES['photo']['name'])) {
			unset($_FILES['photo']);
		}
		$invoice_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		if (!empty($_FILES['photo']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['photo']['name'];
			$data['photo'] =  base_url('assets/images/project_supportive/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}
		$insert = $this->db->insert('project_category', $data);

		return ($insert == true) ? true : false;
	}

	public function editProjectCategory($id = null)
	{
		if (empty($_FILES['photo']['name'])) {
			unset($_FILES['photo']);
		}
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		if (!empty($_FILES['photo']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['photo']['name'];
			$data['photo'] =  base_url('assets/images/project_supportive/') . $photo_filename;


			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}
		$this->db->where('project_category_id', $id);
		$update = $this->db->update('project_category', $data);

		return ($update == true) ? true : false;
	}


	public function deleteProjectCategory($id)
	{
		if ($id) {
			$this->db->where('project_category_id', $id);
			$delete = $this->db->delete('project_category');
			return $delete;
		}
	}

	// Sub Category
	public function getSubCategoryData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM project_sub_categories INNER JOIN project_category ON project_sub_categories.project_category_id=project_category.project_category_id WHERE project_sub_categories.project_sub_category_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM project_sub_categories INNER JOIN project_category ON project_sub_categories.project_category_id=project_category.project_category_id  ORDER BY project_sub_categories.project_sub_category_id DESC";
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
		$this->db->where('project_sub_category_id', $id);
		$update = $this->db->update('project_sub_categories', $data);

		return ($update == true) ? true : false;
	}


	public function deleteSubCategory($id)
	{
		if ($id) {
			$this->db->where('project_sub_category_id', $id);
			$delete = $this->db->delete('project_sub_categories');
			return $delete;
		}
	}


	// Mahalla
	public function getMahallaData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM mahalla WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM mahalla ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createMahalla()
	{

		$sub_category_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}


		$insert = $this->db->insert('mahalla', $data);

		return ($insert == true) ? true : false;
	}

	public function editMahalla($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('id', $id);
		$update = $this->db->update('mahalla', $data);

		return ($update == true) ? true : false;
	}


	public function deleteMahalla($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('mahalla');
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


	// Channels
	public function getChannelData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM channels WHERE channel_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT c.* , (SELECT Count(s.channel_id) FROM sermons s WHERE s.channel_id = c.channel_id AND s.type='Jumma Bayan') as total_jumma, (SELECT Count(s.channel_id) FROM sermons s WHERE s.channel_id = c.channel_id AND s.type='Special Bayan') as total_special FROM channels c ORDER BY channel_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createChannel()
	{
		if (empty($_FILES['photo']['name'])) {
			unset($_FILES['photo']);
		}
		$sub_category_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}


		if (!empty($_FILES['photo']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['photo']['name'];
			$data['photo'] =  base_url('assets/images/project_supportive/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$insert = $this->db->insert('channels', $data);

		return ($insert == true) ? true : false;
	}

	public function editChannel($id = null)
	{
		if (empty($_FILES['photo']['name'])) {
			unset($_FILES['photo']);
		}
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		if (!empty($_FILES['photo']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['photo']['name'];
			$data['photo'] =  base_url('assets/images/project_supportive/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$this->db->where('channel_id', $id);
		$update = $this->db->update('channels', $data);

		return ($update == true) ? true : false;
	}

	public function deleteChannel($id)
	{
		if ($id) {
			$this->db->where('channel_id', $id);
			$delete = $this->db->delete('channels');
			return $delete;
		}
	}

	// Implementor Types
	public function getImplementorTypesData($id = null)
	{
		$implementor_type_id = $this->db->insert_id();

		if ($id) {
			$sql = "SELECT * FROM implementor_types WHERE implementor_type_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM implementor_types ORDER BY implementor_type_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createImplementorType()
	{

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}



		$insert = $this->db->insert('implementor_types', $data);

		return ($insert == true) ? true : false;
	}

	public function editImplementorType($id = null)
	{

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->where('implementor_type_id', $id);
		$update = $this->db->update('implementor_types', $data);

		return ($update == true) ? true : false;
	}

	public function deleteImplementorType($id)
	{
		if ($id) {
			$this->db->where('implementor_type_id', $id);
			$delete = $this->db->delete('implementor_types');
			return $delete;
		}
	}


	// Implementors
	public function getImplementorData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM implementors INNER JOIN implementor_types ON implementors.implementor_type_id=implementor_types.implementor_type_id WHERE implementors.implementor_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM implementors INNER JOIN implementor_types ON implementors.implementor_type_id=implementor_types.implementor_type_id  ORDER BY implementors.implementor_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createImplementor()
	{
		if (empty($_FILES['document']['name'])) {
			unset($_FILES['document']);
		}

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		if (!empty($_FILES['document']['name'])) {
			$document_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['document']['name'];
			$data['document'] =  base_url('assets/images/project_supportive/') . $document_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $document_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('document')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}


		$insert = $this->db->insert('implementors', $data);

		return ($insert == true) ? true : false;
	}

	public function editImplementor($id = null)
	{
		if (empty($_FILES['document']['name'])) {
			unset($_FILES['document']);
		}

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		

		if (!empty($_FILES['document']['name'])) {
			$document_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['document']['name'];
			$data['document'] =  base_url('assets/images/project_supportive/') . $document_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/project_supportive/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $document_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('document')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$this->db->where('implementor_id', $id);
		$update = $this->db->update('implementors', $data);

		return ($update == true) ? true : false;
	}

	public function deleteImplementor($id)
	{
		if ($id) {
			$this->db->where('implementor_id', $id);
			$delete = $this->db->delete('implementors');
			return $delete;
		}
	}
}
