<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {

	public $table = 'users';

	public function GetData() {
		$this->db->group_by('users.id');
		return $this->db->get('users')->result();
	}

	public function GetDataById($id) {
		$this->db->group_by('users.id');
		return $this->db->get_where('users', [ 'users.id' => $id ])->row();
	}

	public function login($data)
	{
		$data['password'] = md5($data['password']);

		$this->db->group_start();
			$this->db->where('username', $data['username']);
			$this->db->or_where('email', $data['username']);
		$this->db->group_end();

		$this->db->where('password', $data['password']);

		$query = $this->db->get_where($this->table)->row();

		if(!empty($query)){
			return $query;
		}

		return false;

	}

	public function login_attempt($row, $remember = false)
	{

		if($remember===false){
			$array = [
				'login' => true,
				'logged' => [
					'id' => $row->id,
					'nama' => $row->nama,
					'email' => $row->email,
					'telp' => $row->telp
				]
			];
			$this->session->set_userdata( $array );
		}else{

			$data = [
				'id' => $row->id,
				'nama' => $row->nama,
				'email' => $row->email,
				'telp' => $row->telp
			];
			set_cookie( 'login', true, ($expiry = strtotime('+30 days')) );
			set_cookie( 'logged', json_encode($data), $expiry );

		}
	}

	public function logout()
	{
		// Deleting Sessions
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('logged');
		// Deleting Cookie
		delete_cookie('login');
		delete_cookie('logged');
	}
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */