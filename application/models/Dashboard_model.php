<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model {

	private $_dbDefault;
	private $_dbKonsumen;
	private $_dbInventory;
	private $_dbPenjualan;

	public function __construct()
	{
		$this->_dbDefault	= $this->getValueByKey('db_default');
		$this->_dbInventory	= $this->getValueByKey('db_inventory');
		$this->_dbKonsumen	= $this->getValueByKey('db_konsumen');
		$this->_dbPenjualan	= $this->getValueByKey('db_penjualan');

		parent::__construct();
	}

	public function getValueByKey($key = '')
	{
		return ($query = $this->db->get_where('settings', ['key' => $key], 1)) && $query->num_rows() > 0 ? $query->row()->value : null;
	}

	public function CountDataKonsumen() {

        return $this->db->count_all_results($this->_dbKonsumen.'.konsumen');
	}

	public function CountDataInventory() {

        return $this->db->count_all_results($this->_dbInventory.'.inventory');
	}

	public function CountDataPenjualan() {

        return $this->db->count_all_results($this->_dbPenjualan.'.penjualan');
	}

	function CountDataKonsumenPerBulan(){
		$this->db->select("
			SUM(IF(counter.`data_bulan` = '1', counter.`data_jumlah`, 0)) AS jan,
			SUM(IF(counter.`data_bulan` = '2', counter.`data_jumlah`, 0)) AS feb,
			SUM(IF(counter.`data_bulan` = '3', counter.`data_jumlah`, 0)) AS mar,
			SUM(IF(counter.`data_bulan` = '4', counter.`data_jumlah`, 0)) AS apr,
			SUM(IF(counter.`data_bulan` = '5', counter.`data_jumlah`, 0)) AS mei,
			SUM(IF(counter.`data_bulan` = '6', counter.`data_jumlah`, 0)) AS jun,
			SUM(IF(counter.`data_bulan` = '7', counter.`data_jumlah`, 0)) AS jul,
			SUM(IF(counter.`data_bulan` = '8', counter.`data_jumlah`, 0)) AS aug,
			SUM(IF(counter.`data_bulan` = '9', counter.`data_jumlah`, 0)) AS sep,
			SUM(IF(counter.`data_bulan` = '10', counter.`data_jumlah`, 0)) AS okt,
			SUM(IF(counter.`data_bulan` = '11', counter.`data_jumlah`, 0)) AS nov,
			SUM(IF(counter.`data_bulan` = '12', counter.`data_jumlah`, 0)) AS des
		FROM bulan_ref
		LEFT JOIN (
			SELECT 
				MONTH(DATE(created_at)) AS data_bulan,
				COUNT(kons_id) AS data_jumlah
			FROM ".$this->_dbKonsumen.".konsumen
			WHERE 
				YEAR(DATE(created_at)) = YEAR(DATE(NOW()))
			GROUP BY MONTH(DATE(created_at))
						
			ORDER BY MONTH(DATE(created_at)) ASC
		) AS counter
			ON counter.`data_bulan` = bulan_id
		");

		return $this->db->get()->result();
	}

	function CountDataInventoryPerBulan(){
		$this->db->select("
			SUM(IF(counter.`data_bulan` = '1', counter.`data_jumlah`, 0)) AS jan,
			SUM(IF(counter.`data_bulan` = '2', counter.`data_jumlah`, 0)) AS feb,
			SUM(IF(counter.`data_bulan` = '3', counter.`data_jumlah`, 0)) AS mar,
			SUM(IF(counter.`data_bulan` = '4', counter.`data_jumlah`, 0)) AS apr,
			SUM(IF(counter.`data_bulan` = '5', counter.`data_jumlah`, 0)) AS mei,
			SUM(IF(counter.`data_bulan` = '6', counter.`data_jumlah`, 0)) AS jun,
			SUM(IF(counter.`data_bulan` = '7', counter.`data_jumlah`, 0)) AS jul,
			SUM(IF(counter.`data_bulan` = '8', counter.`data_jumlah`, 0)) AS aug,
			SUM(IF(counter.`data_bulan` = '9', counter.`data_jumlah`, 0)) AS sep,
			SUM(IF(counter.`data_bulan` = '10', counter.`data_jumlah`, 0)) AS okt,
			SUM(IF(counter.`data_bulan` = '11', counter.`data_jumlah`, 0)) AS nov,
			SUM(IF(counter.`data_bulan` = '12', counter.`data_jumlah`, 0)) AS des
		FROM bulan_ref
		LEFT JOIN (
			SELECT 
				MONTH(DATE(created_at)) AS data_bulan,
				COUNT(inv_id) AS data_jumlah
			FROM ".$this->_dbInventory.".inventory
			WHERE 
				YEAR(DATE(created_at)) = YEAR(DATE(NOW()))
			GROUP BY MONTH(DATE(created_at))
						
			ORDER BY MONTH(DATE(created_at)) ASC
		) AS counter
			ON counter.`data_bulan` = bulan_id
		");

		return $this->db->get()->result();
	}

	function CountDataPenjualanPerBulan(){
		$this->db->select("
			SUM(IF(counter.`data_bulan` = '1', counter.`data_jumlah`, 0)) AS jan,
			SUM(IF(counter.`data_bulan` = '2', counter.`data_jumlah`, 0)) AS feb,
			SUM(IF(counter.`data_bulan` = '3', counter.`data_jumlah`, 0)) AS mar,
			SUM(IF(counter.`data_bulan` = '4', counter.`data_jumlah`, 0)) AS apr,
			SUM(IF(counter.`data_bulan` = '5', counter.`data_jumlah`, 0)) AS mei,
			SUM(IF(counter.`data_bulan` = '6', counter.`data_jumlah`, 0)) AS jun,
			SUM(IF(counter.`data_bulan` = '7', counter.`data_jumlah`, 0)) AS jul,
			SUM(IF(counter.`data_bulan` = '8', counter.`data_jumlah`, 0)) AS aug,
			SUM(IF(counter.`data_bulan` = '9', counter.`data_jumlah`, 0)) AS sep,
			SUM(IF(counter.`data_bulan` = '10', counter.`data_jumlah`, 0)) AS okt,
			SUM(IF(counter.`data_bulan` = '11', counter.`data_jumlah`, 0)) AS nov,
			SUM(IF(counter.`data_bulan` = '12', counter.`data_jumlah`, 0)) AS des
		FROM bulan_ref
		LEFT JOIN (
			SELECT 
				MONTH(penj_tanggal) AS data_bulan,
				COUNT(penj_id) AS data_jumlah
			FROM ".$this->_dbPenjualan.".penjualan
			WHERE 
				YEAR(penj_tanggal) = YEAR(DATE(NOW()))
			GROUP BY MONTH(penj_tanggal)
						
			ORDER BY MONTH(penj_tanggal) ASC
		) AS counter
			ON counter.`data_bulan` = bulan_id
		");

		return $this->db->get()->result();
	}
}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */