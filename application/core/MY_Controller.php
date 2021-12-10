<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $page_data;

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set( setting('timezone') );

		// kecuali controller "api_graphql", maka harus login
		if(strtolower($this->uri->segment(1)) != 'graphql') {
			if(!is_logged()){
				redirect('login','refresh');
			}
		}

		if( !empty($this->db->username) && !empty($this->db->hostname) && !empty($this->db->database) ){ }else{
			$this->users_model->logout();
			die('Database is not configured');
		}

		$this->page_data['url'] = (object) [
			'assets' => assets_url().'/'
		];

		$this->page_data['app'] = (object) [
			'site_title' => setting('company_name')
		];

		$this->page_data['page'] = (object) [
			'title' => 'Dashboard',
			'menu' => 'dashboard',
			'submenu' => '',
		];
	}
}

/*	ADDING ALL CLASS FILES */
require_once __DIR__.DIRECTORY_SEPARATOR.'Graphql_Controller.php';

/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */
