<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

	public $table 		= 'penjualan';
	public $table_key	= 'penj_id';
	private $user_role;
	private $_dbDefault;
	private $_dbKonsumen;
	private $_dbInventory;
	private $_dbPenjualan;

	public function __construct()
	{
		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		
		$this->_dbDefault	= $this->settings_model->getValueByKey('db_default');
		$this->_dbInventory	= $this->settings_model->getValueByKey('db_inventory');
		$this->_dbKonsumen	= $this->settings_model->getValueByKey('db_konsumen');
		$this->_dbPenjualan	= $this->settings_model->getValueByKey('db_penjualan');
		
		parent::__construct();
	}

	public function GetData() {
		$this->db->join($this->_dbKonsumen.'.konsumen', $this->_dbKonsumen.'.konsumen.kons_id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_kons_id');
		$this->db->join($this->_dbInventory.'.inventory', $this->_dbInventory.'.inventory.inv_id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_inv_id');
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_user_id');
		$this->db->group_by($this->_dbPenjualan.'.'.$this->table.'.penj_id');
		$this->db->order_by($this->_dbPenjualan.'.'.$this->table.'.penj_tanggal', 'desc');
        return $this->db->get($this->_dbPenjualan.'.'.$this->table)->result();
	}

	public function GetDataById($id) {
		$this->db->join($this->_dbKonsumen.'.konsumen', $this->_dbKonsumen.'.konsumen.kons_id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_kons_id');
		$this->db->join($this->_dbInventory.'.inventory', $this->_dbInventory.'.inventory.inv_id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_inv_id');
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_user_id');
		$this->db->where($this->_dbPenjualan.'.'.$this->table.'.penj_id', $id);
		$this->db->group_by($this->_dbPenjualan.'.'.$this->table.'.penj_id');
        return $this->db->get($this->_dbPenjualan.'.'.$this->table)->row();
	}

	public function GetTerjualByInvId($inv_id, $penj_id = null) {
		$this->db->select('COUNT(penj_jumlah) AS jumlah_terjual');
		$this->db->from($this->_dbPenjualan.'.'.$this->table);
		$this->db->join($this->_dbInventory.'.inventory', $this->_dbInventory.'.inventory.inv_id = '.$this->_dbPenjualan.'.'.$this->table.'.penj_inv_id');
		$this->db->where($this->_dbPenjualan.'.'.$this->table.'.penj_inv_id', $inv_id);
		
		if(!is_null($penj_id)) {
			$this->db->where_not_in($this->_dbPenjualan.'.'.$this->table.'.penj_id', $penj_id);
		}

		$this->db->group_by($this->_dbPenjualan.'.'.$this->table.'.penj_inv_id');
        return $this->db->get()->row();
	}

	function CreateData($data) {
		$this->db->insert($this->_dbPenjualan.'.'.$this->table, $data);
		return $this->db->insert_id();
	}

	function UpdateData($id, $data) {
		$this->db->where($this->_dbPenjualan.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->update($this->_dbPenjualan.'.'.$this->table, $data);
		return $id;
	}

	function DeleteData($id) {
		$this->db->where($this->_dbPenjualan.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->delete($this->_dbPenjualan.'.'.$this->table);
		return true;
	}
}

/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */