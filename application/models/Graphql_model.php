<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graphql_model extends CI_Model {

	public $_tableKonsumen	= 'konsumen';
	public $_tableInventory	= 'inventory';
	public $_tablePenjualan	= 'penjualan';
	
	public $_dbDefault;
	public $_dbKonsumen;
	public $_dbInventory;
	public $_dbPenjualan;
	
	private $user_role;

	public function __construct() {

		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		
		$this->_dbDefault	= $this->settings_model->getValueByKey('db_default');
		$this->_dbInventory	= $this->settings_model->getValueByKey('db_inventory');
		$this->_dbKonsumen	= $this->settings_model->getValueByKey('db_konsumen');
		$this->_dbPenjualan	= $this->settings_model->getValueByKey('db_penjualan');
		
		parent::__construct();
	}

	// user
	public function GetDataUser() {

		return $this->db->get($this->_dbDefault.'.users')->result();
	}

	public function GetDataUserById($id) {

		$this->db->where($this->_dbDefault.'.users.id', $id);
		return $this->db->get($this->_dbDefault.'.users')->row();
	}

	// konsumen
	public function GetDataKonsumen() {

		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbKonsumen.'.'.$this->_tableKonsumen.'.kons_user_id');
		$this->db->group_by($this->_dbKonsumen.'.'.$this->_tableKonsumen.'.kons_id');
		$this->db->order_by($this->_dbKonsumen.'.'.$this->_tableKonsumen.'.kons_nama', 'asc');
		
		return $this->db->get($this->_dbKonsumen.'.'.$this->_tableKonsumen)->result();
	}

	public function GetDataKonsumenById($id) {
		
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbKonsumen.'.'.$this->_tableKonsumen.'.kons_user_id');
		$this->db->where($this->_dbKonsumen.'.'.$this->_tableKonsumen.'.kons_id', $id);
		
        return $this->db->get($this->_dbKonsumen.'.'.$this->_tableKonsumen)->row();
	}

	// inventory
	public function GetDataInventory() {

		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbInventory.'.'.$this->_tableInventory.'.inv_user_id');
		$this->db->group_by($this->_dbInventory.'.'.$this->_tableInventory.'.inv_id');
		$this->db->order_by($this->_dbInventory.'.'.$this->_tableInventory.'.inv_nama', 'asc');

		return $this->db->get($this->_dbInventory.'.'.$this->_tableInventory)->result();
	}

	public function GetDataInventoryById($id) {

		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbInventory.'.'.$this->_tableInventory.'.inv_user_id');
		$this->db->where($this->_dbInventory.'.'.$this->_tableInventory.'.inv_id', $id);

        return $this->db->get($this->_dbInventory.'.'.$this->_tableInventory)->row();
	}

	// penjualan
	public function GetDataPenjualan() {
		$this->db->join($this->_dbKonsumen.'.konsumen', $this->_dbKonsumen.'.konsumen.kons_id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_kons_id');
		$this->db->join($this->_dbInventory.'.inventory', $this->_dbInventory.'.inventory.inv_id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_inv_id');
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_user_id');

		$this->db->group_by($this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_id');
		$this->db->order_by($this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_tanggal', 'desc');
		
		return $this->db->get($this->_dbPenjualan.'.'.$this->_tablePenjualan)->result();
	}

	public function GetDataPenjualanById($id) {
		$this->db->join($this->_dbKonsumen.'.konsumen', $this->_dbKonsumen.'.konsumen.kons_id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_kons_id');
		$this->db->join($this->_dbInventory.'.inventory', $this->_dbInventory.'.inventory.inv_id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_inv_id');
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_user_id');

		$this->db->where($this->_dbPenjualan.'.'.$this->_tablePenjualan.'.penj_id', $id);
		
        return $this->db->get($this->_dbPenjualan.'.'.$this->_tablePenjualan)->row();
	}
}

/* End of file Graphql_model.php */
/* Location: ./application/models/Graphql_model.php */