<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_inventory extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Laporan Inventory';
		$this->page_data['page']->menu 		= 'laporan';
		$this->page_data['page']->submenu 	= 'lap_inventory';
	}

	public function index()
	{
		ifPermissions('lap_inventory_list');

		// graphql client / request
		// attribute "id" tersedia tapi tidak digunakan
		$query = <<<GQL
			query {
				inventory {
					nama
					deskripsi
					stok
					harga
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$this->page_data['lap_inventory'] = $_arrData->inventory;
		$this->load->view('lap_inventory/list', $this->page_data);
	}
}

/* End of file Lap_inventory.php */
/* Location: ./application/controllers/Lap_inventory.php */