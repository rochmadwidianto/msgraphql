<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_konsumen extends MY_Controller {

	var $API_GraphQL = '';

	public function __construct()
	{
		parent::__construct();
		
		$this->API_GraphQL	= '';

		$this->page_data['page']->title 	= 'Laporan Konsumen';
		$this->page_data['page']->menu 		= 'laporan';
		$this->page_data['page']->submenu 	= 'lap_konsumen';
	}

	public function index()
	{
		ifPermissions('lap_konsumen_list');

		// graphql client / request
		// attribute "id" tersedia tapi tidak digunakan
		$query = <<<GQL
			query {
				konsumen {
					nama
					telp
					alamat
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$this->page_data['lap_konsumen'] = $_arrData->konsumen;
		$this->load->view('lap_konsumen/list', $this->page_data);
	}
}

/* End of file Lap_konsumen.php */
/* Location: ./application/controllers/Lap_konsumen.php */