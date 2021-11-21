<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 		= 'Dashboard';
	}

	public function index()
	{
		// get user by id
		$data_user = $this->users_model->GetDataById(logged('id'));
		
		// for statistik chart
		$_getDataBulan	= $this->bulan_model->get();

		// arr bulan
		$_arrBulan = array();
		foreach($_getDataBulan as $list) {
			$_arrBulan[]	= $list->bulan_nama;
		}

		$this->page_data['arr_bulan']	= json_encode($_arrBulan);
		// end - for statistik chart

		$this->page_data['user'] 		= $this->users_model->GetDataById(logged('id'));
		$this->page_data['user']->role 	= $this->roles_model->getByWhere([
			'id'=> logged('role')
		])[0];
		$this->page_data['user']->activity = $this->activity_model->getByWhere([
			'user'=> logged('id')
		], [ 'order' => ['id', 'desc'] ]);
		
		// identifikasi role user
		$this->page_data['user_role'] 	= (int)$data_user->role;

		$this->load->view('dashboard', $this->page_data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */