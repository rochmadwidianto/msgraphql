<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $page_data;
	public $graphqlEndPoint;
	public $graphqlClient;

	public function __construct()
	{
		parent::__construct();

		// for graphql client / request
		$this->graphqlEndPoint 	= url('graphql'); // url graphql server
		$this->graphqlClient 	= new \GuzzleHttp\Client();
		// end

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

	// for graphql client / request
	function graphql_request($query) {

		$response = $this->graphqlClient->request('POST', $this->graphqlEndPoint, [
		'headers' => [
			'Content-Type' => 'application/json',
			// include any auth tokens here
		],
		'json' => [
			'query' => $query
		]
		]);

		$json 	= $response->getBody()->getContents();
		$body 	= json_decode($json);
		$result = $body->data;

		return $result;
	}
	// end
}

/*	ADDING ALL CLASS FILES */
require_once __DIR__.DIRECTORY_SEPARATOR.'MY_GraphqlServer.php';

/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */