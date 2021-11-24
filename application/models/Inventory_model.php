<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends MY_Model {

	public $table = 'inventory';
	public $table_key = 'inv_id';
	private $user_role;

	public function __construct()
	{
		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		parent::__construct();
	}

	public function GetData() {
		$this->db->join('users', 'inv_user_id = users.id', 'left');
		$this->db->group_by('inv_id');
		$this->db->order_by('inv_nama', 'asc');
        return $this->db->get($this->table)->result();
	}
}

/* End of file konsumen_model.php */
/* Location: ./application/models/konsumen_model.php */