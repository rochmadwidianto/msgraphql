<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen_model extends MY_Model {

	public $table = 'konsumen';
	public $table_key = 'kons_id';
	private $user_role;

	public function __construct()
	{
		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		parent::__construct();
	}

	public function GetData() {
		$this->db->join('users', 'kons_user_id = users.id', 'left');
		$this->db->group_by('kons_id');
		$this->db->order_by('kons_nama', 'asc');
        return $this->db->get($this->table)->result();
	}
}

/* End of file konsumen_model.php */
/* Location: ./application/models/konsumen_model.php */