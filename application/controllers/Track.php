<?php

class Track extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();


		$this->data['page_title'] = 'Track';
		$this->load->model('model_packages');
	}

	public function index()
	{
		$city_data = $this->model_packages->getPackageData();
		$this->data['package_data'] = $city_data;
		$this->load->view('template/header',$this->data);
		$this->load->view('track');
		$this->load->view('template/footer');
	}

	
}
