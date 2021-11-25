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
		$_getKonsumenByMonth	= $this->dashboard_model->CountDataKonsumenPerBulan();
		$_getInventoryByMonth	= $this->dashboard_model->CountDataInventoryPerBulan();
		$_getPenjualanByMonth	= $this->dashboard_model->CountDataPenjualanPerBulan();

		// arr bulan
		$_arrBulan = array();
		foreach($_getDataBulan as $list) {
			$_arrBulan[]	= $list->bulan_nama;
		}
		// arr konsumen by month
		$_arrKonsumenByMonth = array();
		foreach ($_getKonsumenByMonth as $row) {
			$_arrKonsumenByMonth = array((int)$row->jan, (int)$row->feb, (int)$row->mar, (int)$row->apr, (int)$row->mei, (int)$row->jun, (int)$row->jul, (int)$row->aug, (int)$row->sep, (int)$row->okt, (int)$row->nov, (int)$row->des);
		}
		// arr inventory by month
		$_arrInventoryByMonth = array();
		foreach ($_getKonsumenByMonth as $row) {
			$_arrInventoryByMonth = array((int)$row->jan, (int)$row->feb, (int)$row->mar, (int)$row->apr, (int)$row->mei, (int)$row->jun, (int)$row->jul, (int)$row->aug, (int)$row->sep, (int)$row->okt, (int)$row->nov, (int)$row->des);
		}
		// arr penjualan by month
		$_arrPenjualanByMonth = array();
		foreach ($_getPenjualanByMonth as $row) {
			$_arrPenjualanByMonth = array((int)$row->jan, (int)$row->feb, (int)$row->mar, (int)$row->apr, (int)$row->mei, (int)$row->jun, (int)$row->jul, (int)$row->aug, (int)$row->sep, (int)$row->okt, (int)$row->nov, (int)$row->des);
		}

		$this->page_data['arr_bulan']	= json_encode($_arrBulan);
		$this->page_data['arr_konsumen_by_month']	= json_encode($_arrKonsumenByMonth);
		$this->page_data['arr_inventory_by_month']	= json_encode($_arrInventoryByMonth);
		$this->page_data['arr_penjualan_by_month']	= json_encode($_arrPenjualanByMonth);
		// end - for statistik chart

		$this->page_data['total_konsumen']	= $this->dashboard_model->CountDataKonsumen();
		$this->page_data['total_inventory']	= $this->dashboard_model->CountDataInventory();
		$this->page_data['total_penjualan']	= $this->dashboard_model->CountDataPenjualan();

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