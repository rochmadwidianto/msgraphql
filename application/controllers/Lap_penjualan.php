<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_penjualan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Laporan Penjualan';
		$this->page_data['page']->menu 		= 'laporan';
		$this->page_data['page']->submenu 	= 'lap_penjualan';
	}

	public function index()
	{
		ifPermissions('lap_penjualan_list');

		$this->page_data['lap_penjualan'] = $this->penjualan_model->GetData();
		$this->load->view('lap_penjualan/list', $this->page_data);
	}
}

/* End of file Lap_penjualan.php */
/* Location: ./application/controllers/Lap_penjualan.php */