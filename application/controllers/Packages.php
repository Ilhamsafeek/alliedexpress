<?php

class Packages extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_users');
		$this->load->model('model_areas');
		$this->load->model('model_packages');
		$this->load->model('model_customers');
	}

	public function index()
	{


		$city_data = $this->model_packages->getPackageData();
		$this->data['package_data'] = $city_data;

		$customer_data = $this->model_users->getUserData('customer');
		$this->data['customer_data'] = $customer_data;

		$city_data = $this->model_areas->getCityData();
		$this->data['city_data'] = $city_data;

		$zone_data = $this->model_areas->getZoneData();
		$this->data['zone_data'] = $zone_data;

		$user_data = $this->model_users->getNonAdminData();
		$this->data['user_data'] = $user_data;
		$this->render_template('packages/index', $this->data);
	}

	public function create()
	{

		$create = $this->model_packages->createPackage();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('packages', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('packages', 'refresh');
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{
		$update = $this->model_packages->editPackage($id);
		if ($update == true) {

			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('packages', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('agents', 'refresh');
		}
	}

	public function delete($id)
	{


		$delete = $this->model_packages->delete($id);
		if ($delete == true) {
			$this->session->set_flashdata('success', 'Successfully removed');
			redirect('packages', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect('packages', 'refresh');
		}
	}

	public function track()
	{
		$this->load->view('template/header');
		$this->load->view('track');
		$this->load->view('template/footer');
	}
}
