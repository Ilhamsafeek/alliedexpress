<?php

class Model_chat extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getChatTopicsByPhone($phone)
	{

		$sql = "SELECT * FROM chat_topics INNER JOIN users ON chat_topics.from_user=users.user_id WHERE chat_topics.from_user = ? OR chat_topics.to_user = ? ORDER BY chat_id DESC";
		$query = $this->db->query($sql, array($phone, $phone));
		return $query->result_array();
	}

	public function getChatById($chat_id = null)
	{
		if ($chat_id) {
			$sql = "SELECT * FROM chat WHERE chat.chat_id = ? ORDER BY message_id ASC";
			$query = $this->db->query($sql, array($chat_id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM chat ORDER BY message_id ASC";
		$query = $this->db->query($sql, array($chat_id));
		return $query->result_array();
	}

	public function getChatByUserId($user = null)
	{
		if ($user) {
			$sql = "SELECT * FROM chat INNER JOIN chat_topics ON chat.chat_id=chat_topics.chat_id WHERE chat_to_user = ? OR chat_from_user=? ORDER BY time_stamp DESC";
			$query = $this->db->query($sql, array($user, $user));
			return $query->result_array();
		}
	}


	public function getChatTopics($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM chat_topics WHERE chat_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM chat_topics ORDER BY chat_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getChatTopicsByUserId($userId)
	{

		$sql = "SELECT * FROM chat_topics WHERE from_user = ? OR to_user = ? ORDER BY chat_id DESC";
		$query = $this->db->query($sql, array($userId, $userId));
		return $query->result_array();
	}


	public function createChatTopic()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$create = $this->db->insert('chat_topics', $data);

		$user_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}


	public function createChat($new_chat_data)
	{
		$data = array();
		foreach ($new_chat_data as $key => $value) {
			$data[$key] = $value;
		}
		$chat_id = $data['chat_id'];
		if ($data['chat_id'] == 0) {
			unset($data['chat_id']);
			unset($data['message']);
			$create = $this->db->insert('chat_topics', $data);

			$chat_id = $this->db->insert_id();
		}
		$date = new DateTime();
		$chat_data = array();
		$chat_data['message'] = $new_chat_data['message'];
		$chat_data['chat_id'] = $chat_id;
		$chat_data['chat_from_user'] = $new_chat_data['from_user'];
		$chat_data['chat_to_user'] = $new_chat_data['to_user'];
		$chat_data['time_stamp'] = $date->format('U');

		$create = $this->db->insert('chat', $chat_data);

		$message_id = $this->db->insert_id();

		return ($create == true) ? true : false;
	}
}
