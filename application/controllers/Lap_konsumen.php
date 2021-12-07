<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_konsumen extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Laporan Konsumen';
		$this->page_data['page']->menu 		= 'laporan';
		$this->page_data['page']->submenu 	= 'lap_konsumen';
	}

	public function index()
	{
		ifPermissions('lap_konsumen_list');

		$this->page_data['lap_konsumen'] = $this->konsumen_model->GetData();
		$this->load->view('lap_konsumen/list', $this->page_data);
	}
}

/* End of file Lap_konsumen.php */
/* Location: ./application/controllers/Lap_konsumen.php */