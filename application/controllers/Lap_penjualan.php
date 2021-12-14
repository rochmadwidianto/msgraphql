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

		// graphql client / request
		
		// attribute / data dibawah ini disediakan oleh server namun tidak digunakan
		// id, kons_id, kons_telp, kons_alamat, inv_id, inv_deskripsi, inv_stok, inv_harga
		$query = <<<GQL
			query {
				penjualan {
					kons_nama
					inv_nama
					tanggal
					jumlah
					nominal
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$this->page_data['lap_penjualan'] = $_arrData->penjualan;
		$this->load->view('lap_penjualan/list', $this->page_data);
	}
}

/* End of file Lap_penjualan.php */
/* Location: ./application/controllers/Lap_penjualan.php */