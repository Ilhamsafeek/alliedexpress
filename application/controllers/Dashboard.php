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
		$this->render_template('dashboard');
	}

	

	public function notfound()
	{
		$this->render_template('notfound', $this->data);
	}
}
