<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $data;

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set( setting('timezone') );

		if( !empty($this->db->username) && !empty($this->db->hostname) && !empty($this->db->database) ){ }else{
			die('Database is not configured');
		}

		if(is_logged()){
			redirect('dashboard','refresh');
		}

		$this->data = [
			'assets' => assets_url(),
			'body_classes'	=> setting('login_theme') == '1' ? 'login-page login-background' : 'login-page-side login-background'
		];
	}

	public function index()
	{
		$this->data['title']		= 'Login | Implementasi Microservice & GraphQL - 185410014';
		$this->data['msg_message'] 	= NULL;
		$this->data['msg_type'] 	= NULL;

		$this->load->view('account/login', $this->data, FALSE);
	}

	public function check()
	{
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
            return;
        }

        $username = post('username');
        $password = post('password');

        if( $username && $password && $attempt = $this->users_model->login( compact('username', 'password') )) {

        	$this->users_model->login_attempt( $attempt, post('remember_me') );

        } else {

			$this->data['msg_message'] 	= NULL;
			$this->data['msg_type'] 	= NULL;

            $this->data['message'] 		= 'Username atau password salah';
            $this->data['message_type'] = 'danger';

			$this->load->view('account/login', $this->data, FALSE);
            return;
        }

        redirect('/','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Admin/Login.php */