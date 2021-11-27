<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen_model extends CI_Model {

	public $table 			= 'konsumen';
	public $table_key 		= 'kons_id';
	private $user_role;
	private $_dbDefault;
	private $_dbKonsumen;

	public function __construct() {

		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		
		$this->_dbDefault	= $this->settings_model->getValueByKey('db_default');
		$this->_dbKonsumen	= $this->settings_model->getValueByKey('db_konsumen');
		
		parent::__construct();
	}

	public function GetData() {
		$this->db->join($this->_dbDefault.'.users', $this->_dbDefault.'.users.id = '.$this->_dbKonsumen.'.'.$this->table.'.kons_user_id');
		$this->db->group_by($this->_dbKonsumen.'.'.$this->table.'.kons_id');
		$this->db->order_by($this->_dbKonsumen.'.'.$this->table.'.kons_nama', 'asc');
        return $this->db->get($this->_dbKonsumen.'.'.$this->table)->result();
	}

	public function GetDataById($id) {
		return $this->db->get_where($this->_dbKonsumen.'.'.$this->table, [ $this->_dbKonsumen.'.'.$this->table.'.'.$this->table_key => $id ])->row();
	}

	function CreateData($data) {
		$this->db->insert($this->_dbKonsumen.'.'.$this->table, $data);
		return $this->db->insert_id();
	}

	function UpdateData($id, $data) {
		$this->db->where($this->_dbKonsumen.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->update($this->_dbKonsumen.'.'.$this->table, $data);
		return $id;
	}

	function DeleteData($id) {
		$this->db->where($this->_dbKonsumen.'.'.$this->table.'.'.$this->table_key, $id);
		$this->db->delete($this->_dbKonsumen.'.'.$this->table);
		return true;
	}
}

/* End of file konsumen_model.php */
/* Location: ./application/models/konsumen_model.php */