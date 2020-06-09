<?php

class Model_api extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_company');
	}


	public function pushNotification($message, $type, $route, $args = null)
	{
		//log_message('error', '==============Push Notification=================');
		$company_info = $this->model_company->getCompanyData(1);
		$apiKey = $company_info['firebase_notification_api']; //'AIzaSyD4qWnv1e11t2-fZoPoPQ1_wGhCK1tOsDM';  // can get from Legecy server key on: https://console.firebase.google.com/project/connecting-hearts-zamzam/settings/cloudmessaging/android:mertics.zamzam
		$user_data = $this->model_users->getUserData();
		$targets=array_column($user_data, 'phone');
		if ($type == 'approval') {
			$user_data = $this->model_users->getUserDataByPhone($args['user_id']);
			$targets=$args['user_id'];
		}
		$to = array_column($user_data, 'app_token');
		$notification = array('body' => $message);
		$data = array(
			'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
			'sound' => 'default',
			'status' => 'done',
			'screen' => $type,
			'args' => $args,
		);

		$fields = array(
			'registration_ids' => $to,
			'notification' => $notification,
			'priority' => 'high',
			'status' => 'done',
			'data' => $data
		);

		if ($type == 'approval') {
			$fields = array(
				'to' => $user_data['app_token'],
				'notification' => $notification,
				'priority' => 'high',
				'status' => 'done',
				'data' => $data
			);
		}

		$headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');

		$url = 'https://fcm.googleapis.com/fcm/send';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);

		curl_close($ch);


		if (json_decode($result, true)['success']) {
			$notify = $this->model_api->addNotification($message, $type, $route, $args,$targets);
		}

		return json_decode($result, true);
	}

	//Project Type
	public function getNotificationData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM notifications WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM notifications ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function addNotification($message, $type, $route, $args,$user_data)
	{

		$invoice_id = $this->db->insert_id();

		$data = array();

		$data['message'] = $message;
		$data['type'] = $type;
		$data['route'] = $route;
		$data['target'] = json_encode($user_data);

		if ($type == 'approval') {
			$data['data'] = json_encode($args);
		} else {
			$data['data'] = $args;
		}
		$data['time'] = date("M d,Y h:i a");

		$insert = $this->db->insert('notifications', $data);

		return ($insert == true) ? true : false;
	}

	public function test(){
		$sql = "SELECT * FROM notifications
			    union all
			    SELECT * FROM payment_history";
		$query = $this->db->query($sql);
		return $query->result_array();	
	}
}

