<?php

class Areas extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';

		$this->load->model('model_areas');
		// $this->load->model('model_roles');
	}

	public function index()
	{

		$area_data = $this->model_areas->getAreaData();
		$this->data['area_data'] = $area_data;
		$this->render_template('areas/index', $this->data);
	}

	public function city()
	{

		$city_data = $this->model_areas->getCityData();
		$this->data['city_data'] = $city_data;
		$zone_data = $this->model_areas->getZoneData();
		$this->data['zone_data'] = $zone_data;
		$this->render_template('city/index', $this->data);
	}

	public function zone()
	{

		$zone_data = $this->model_areas->getZoneData();
		$this->data['zone_data'] = $zone_data;

		$this->render_template('zone/index', $this->data);
	}



	public function createCity()
	{

		$create = $this->model_areas->createCity();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('areas/city/', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('areas/city/', 'refresh');
		}
		// } 
	}


	public function editCity($id = null)
	{
		$update = $this->model_areas->editCity($id);
		if ($update == true) {
			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('areas/city', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('areas/city', 'refresh');
		}
	}

	public function deleteCity($id)
	{

		if ($id) {

			$delete = $this->model_areas->deleteCity($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('areas/city/', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('areas/city/', 'refresh');
			}
		}
	}



	public function createZone()
	{

		$create = $this->model_areas->createZone();
		if ($create == true) {
			$this->session->set_flashdata('success', 'Successfully Created');
			redirect('areas/zone/', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('areas/zone/', 'refresh');
		}
		// } 
	}


	public function editZone($id = null)
	{
		$update = $this->model_areas->editZone($id);
		if ($update == true) {
			$this->session->set_flashdata('success', 'Successfully updated');
			redirect('areas/zone', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('areas/zone', 'refresh');
		}
	}

	public function deleteZone($id)
	{

		if ($id) {

			$delete = $this->model_areas->deleteZone($id);
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Successfully removed');
				redirect('areas/zone/', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('areas/zone/', 'refresh');
			}
		}
	}
}
