<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->not_logged_in();
		$this->load->model('model_packages');
		$this->load->model('model_users');
	}

	public function index()
	{
		if ($this->session->userdata()['type'] == 'admin') {

			//Line 1
			$city_data = $this->model_packages->totalMonthlyPackages();
			$this->data['monthly_total_packages'] = $city_data;

			$city_data = $this->model_packages->totalDailyPackages();
			$this->data['daily_total_packages'] = $city_data;

			$city_data = $this->model_packages->totalMonthlyStatusPackages('delivered');
			$this->data['monthly_total_delivered_packages'] = $city_data;

			$city_data = $this->model_packages->totalDailyStatusPackages('delivered');
			$this->data['daily_total_delivered_packages'] = $city_data;

			$city_data = $this->model_packages->totalMonthlyStatusPackages('returned');
			$this->data['monthly_total_returned_packages'] = $city_data;

			$city_data = $this->model_packages->totalDailyStatusPackages('returned');
			$this->data['daily_total_returned_packages'] = $city_data;

			$city_data = $this->model_packages->totalMonthlyStatusPackages('canceled');
			$this->data['monthly_total_canceled_packages'] = $city_data;

			$city_data = $this->model_packages->totalDailyStatusPackages('canceled');
			$this->data['daily_total_canceled_packages'] = $city_data;

			//Line 2
			$city_data = $this->model_packages->monthlyCourierCharge();
			$result = array();
			for ($x = 1; $x <= 12; $x++) {
				$result[strval($x)] = 0;
				foreach ($city_data as $k => $v) {

					if ($x == (int) $v['month']) {
						$result[strval($x)] = (float) $v['total'];
					}
				}
			}
			$this->data['monthly_courier_charge_data'] = $result;


			$city_data = $this->model_packages->monthlyExpenses();
			$result = array();
			for ($x = 1; $x <= 12; $x++) {
				$result[strval($x)] = 0;
				foreach ($city_data as $k => $v) {

					if ($x == (int) $v['month']) {
						$result[strval($x)] = (float) $v['total'];
					}
				}
			}
			$this->data['monthly_expenses_data'] = $result;
			$this->data['test'] = $city_data;


			//Line 3
			$city_data = $this->model_packages->totalMonthlyCOD();
			$this->data['monthly_total_cod'] = $city_data['total'];

			$city_data = $this->model_packages->totalDailyCOD();
			$this->data['daily_total_cod'] = $city_data['total'];

			$city_data = $this->model_packages->totalMonthlyCourier();
			$this->data['monthly_total_courier'] = $city_data['total'];

			$city_data = $this->model_packages->totalDailyCourier();
			$this->data['daily_total_courier'] = $city_data['total'];

			$city_data = $this->model_packages->totalMonthlyExpense();
			$this->data['monthly_total_expense'] = $city_data['total'];

			$city_data = $this->model_packages->totalDailyExpense();
			$this->data['daily_total_expense'] = $city_data['total'];

			$city_data = $this->model_packages->totalMonthlyPending();
			$this->data['monthly_total_pending'] = $city_data['total'];

			$city_data = $this->model_packages->totalDailyPending();
			$this->data['daily_total_pending'] = $city_data['total'];

			// Line 4

			$customer_data = $this->model_users->getUserData('customer');
			$this->data['customer_data'] = $customer_data;

			$this->render_template('dashboard', $this->data);
		} else {
			redirect('packages/', 'refresh');
		}
	}



	public function notfound()
	{
		$this->render_template('notfound');
	}
}
