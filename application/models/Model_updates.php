<?php

class Model_updates extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
	}

	//Sermon updates
	public function getSermonData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM sermons INNER JOIN channels ON sermons.channel_id=channels.channel_id WHERE sermons.sermon_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM sermons INNER JOIN channels ON sermons.channel_id=channels.channel_id ORDER BY sermons.sermon_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function create()
	{
		

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$data['date'] = date("M d, Y");
		$insert = $this->db->insert('sermons', $data);
		$sermon_id = $this->db->insert_id();
		$notify = $this->model_api->pushNotification("Watch Video " . $this->input->post('title'), " sermon", "play", $sermon_id);
		return ($insert == true) ? true : false;
	}

	public function edit($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->where('sermon_id', $id);
		$update = $this->db->update('sermons', $data);

		return ($update == true) ? true : false;
	}


	public function delete($id)
	{
		if ($id) {
			$this->db->where('sermon_id', $id);
			$delete = $this->db->delete('sermons');
			return $delete;
		}
	}


	//Zamzam updates
	public function getZamZamUpdatesData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM zamzam_updates WHERE zamzam_updates.update_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM zamzam_updates ORDER BY zamzam_updates.update_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function createZamUpdates()
	{
		if (empty($_FILES['image_url']['name'])) {
			unset($_FILES['image_url']);
		}
		$sub_category_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}


		if (!empty($_FILES['image_url']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['image_url']['name'];
			$data['image_url'] =  base_url('assets/images/zamzamupdates/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/zamzamupdates/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('image_url')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$data['date_time'] = date("M d,Y h:i a");
		$insert = $this->db->insert('zamzam_updates', $data);
		$sermon_id = $this->db->insert_id();
		return ($insert == true) ? true : false;
	}

	public function editZamUpdates($id = null)
	{
		if (empty($_FILES['image_url']['name'])) {
			unset($_FILES['image_url']);
		}
		$sub_category_id = $this->db->insert_id();

		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}


		if (!empty($_FILES['image_url']['name'])) {
			$photo_filename = date("Y-m-d-h-i-s") . "-" . $_FILES['image_url']['name'];
			$data['image_url'] =  base_url('assets/images/zamzamupdates/') . $photo_filename;

			// Set preference
			$config['upload_path'] = 'assets/images/zamzamupdates/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['overwrite'] = TRUE;
			$config['max_size'] = '2048000'; // max_size in kb
			$config['file_name'] = $photo_filename;

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('image_url')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}

		$this->db->where('update_id', $id);
		$update = $this->db->update('zamzam_updates', $data);

		return ($update == true) ? true : false;
	}


	public function deleteZamUpdates($id)
	{
		if ($id) {
			$this->db->where('update_id', $id);
			$delete = $this->db->delete('zamzam_updates');
			return $delete;
		}
	}
}
