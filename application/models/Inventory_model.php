<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

	public $table 		= 'inventory';
	public $table_key 	= 'inv_id';
	private $user_role;
	private $_dbDefault;
	private $_dbInventory;

	public function __construct()
	{
		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		
		$this->_dbDefault	= $this->settings_model->getValueByKey('db_default');
		$this->_dbInventory	= $this->settings_model->getValueByKey('db_inventory');
		
		parent::__construct();
	}

	public function GetData() {
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbInventory.'.'.$this->table.'.inv_user_id');
		$this->db->group_by($this->_dbInventory.'.'.$this->table.'.inv_id');
		$this->db->order_by($this->_dbInventory.'.'.$this->table.'.inv_nama', 'asc');
        return $this->db->get($this->_dbInventory.'.'.$this->table)->result();
	}

	public function GetDataById($id) {
		return $this->db->get_where($this->_dbInventory.'.'.$this->table, [ $this->_dbInventory.'.'.$this->table.'.'.$this->table_key => $id ])->row();
	}

	function CreateData($data) {
		$this->db->insert($this->_dbInventory.'.'.$this->table, $data);
		return $this->db->insert_id();
	}

	function UpdateData($id, $data) {
		$this->db->where($this->_dbInventory.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->update($this->_dbInventory.'.'.$this->table, $data);
		return $id;
	}

	function DeleteData($id) {
		$this->db->where($this->_dbInventory.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->delete($this->_dbInventory.'.'.$this->table);
		return true;
	}
}

/* End of file Inventory_model.php */
/* Location: ./application/models/Inventory_model.php */