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
					id
					nama
					deskripsi
					stok
					harga
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$_dataList = array();
		foreach($_arrData->inventory as $key => $list) {

			// get jumlah inventory yang terjual
			$_jmlTerjual = $this->penjualan_model->GetTerjualByInvId($list->id);
			if(!is_null($_jmlTerjual)) {
				$_jmlTerjual = (int)$_jmlTerjual->jumlah_terjual;
			} else {
				$_jmlTerjual = 0;
			}

			$_dataList[$key] = (object) array(
				'id' => $list->id,
				'nama' => $list->nama,
				'deskripsi' => $list->deskripsi,
				'stok' => ((int)$list->stok - (int)$_jmlTerjual),
				'harga' => $list->harga
			);
		}

		$this->page_data['lap_inventory'] = $_dataList;
		$this->load->view('lap_inventory/list', $this->page_data);
	}
}

/* End of file Lap_inventory.php */
/* Location: ./application/controllers/Lap_inventory.php */