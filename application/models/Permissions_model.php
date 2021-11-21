<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions_model extends MY_Model {

	public $table = 'permissions';

	public function __construct()
	{
		parent::__construct();
	}

	public function GetData() {
		$this->db->order_by('order', 'asc');
		$this->db->where('is_show', 'Yes');
        return $this->db->get('permissions')->result();
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */