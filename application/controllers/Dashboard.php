<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata()['type'] == 'admin') {
			$this->render_template('dashboard');
		} else {
			redirect('packages/', 'refresh');
		}
	}



	public function notfound()
	{
		$this->render_template('notfound');
	}
}
