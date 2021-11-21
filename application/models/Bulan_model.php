<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulan_model extends MY_Model {

	public $table = 'bulan_ref';
	public $table_key = 'bulan_id';

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file Bulan_model.php */
/* Location: ./application/models/Bulan_model.php */