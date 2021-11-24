<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends MY_Model {

	public $table = 'penjualan';
	public $table_key = 'penj_id';
	private $user_role;

	public function __construct()
	{
		if(is_logged()){
			$this->user_role = (int)logged('role');
		}
		parent::__construct();
	}

	public function GetData() {
		$this->db->join('konsumen', 'kons_id = penj_kons_id');
		$this->db->join('inventory', 'inv_id = penj_inv_id');
		$this->db->join('users', 'penj_user_id = users.id', 'left');
		$this->db->group_by('penj_id');
		$this->db->order_by('penj_tanggal', 'desc');
        return $this->db->get($this->table)->result();
	}
}

/* End of file konsumen_model.php */
/* Location: ./application/models/konsumen_model.php */