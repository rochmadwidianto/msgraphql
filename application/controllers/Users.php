<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'User';
		$this->page_data['page']->menu 		= 'manajemen_user';
		$this->page_data['page']->submenu 	= 'users';
	}

	public function index()
	{
		ifPermissions('users_list');
		$this->page_data['users'] = $this->users_model->GetData();
		$this->load->view('users/list', $this->page_data);
	}

	public function add()
	{
		ifPermissions('users_add');
		$this->load->view('users/add', $this->page_data);
	}

	public function save()
	{
		ifPermissions('users_add');
		postAllowed();

		$id = $this->users_model->create([
			'nama' => $this->input->post('nama'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role') != '' ? $this->input->post('role') : 2 // role aplikan
		]);

		if (!empty($_FILES['image']['name'])) {

			$this->uploadlib->initialize([
				'file_name' => $id.'.png'
			]);

			$this->uploadlib->uploadImage('image', '/users');

		}else{

			copy(FCPATH.'uploads/users/default.png', 'uploads/users/'.$id.'.png');
		}

		$this->activity_model->add('Tambah User $'.$id.' Oleh :'.logged('nama'), logged('id'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Penambahan data berhasil dilakukan');
		
		redirect('users');
	}

	public function view($id)
	{
		ifPermissions('users_view');
		$id = decrypt_url($id);

		$this->page_data['User'] = $this->users_model->GetDataById($id);
		$this->page_data['User']->role = $this->roles_model->getByWhere([
			'id'=> $this->page_data['User']->role
		])[0];
		$this->page_data['User']->activity = $this->activity_model->getByWhere([
			'user'=> $id
		], [ 'order' => ['id', 'desc'] ]);
		$this->load->view('users/view', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('users_edit');
		$id = decrypt_url($id);

		$this->page_data['User'] = $this->users_model->getById($id);
		$this->load->view('users/edit', $this->page_data);
	}


	public function update($id)
	{
		ifPermissions('users_edit');
		$id = decrypt_url($id);
		
		postAllowed();

		$data = [
			'nama' => $this->input->post('nama'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role') != '' ? $this->input->post('role') : 2 // role aplikan
		];

		$password = post('password');

		if(!empty($password))
			$data['password'] = md5($password);

		$id = $this->users_model->update($id, $data);

		if (!empty($_FILES['image']['name'])) {

			$this->uploadlib->initialize([
				'file_name' => $id.'.png'
			]);

			$this->uploadlib->uploadImage('image', '/users');
		}

		$this->activity_model->add("Ubah User #$id Oleh :".logged('nama'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');
		
		redirect('users');
	}

	public function check()
	{
		$email = !empty(get('email')) ? get('email') : false;
		$username = !empty(get('username')) ? get('username') : false;
		$notId = !empty($this->input->get('notId')) ? $this->input->get('notId') : 0;

		if($email)
			$exists = count($this->users_model->getByWhere([
					'email' => $email,
					'id !=' => $notId,
				])) > 0 ? true : false;

		if($username)
			$exists = count($this->users_model->getByWhere([
					'username' => $username,
					'id !=' => $notId,
				])) > 0 ? true : false;

		echo $exists ? 'false' : 'true';
	}

	public function delete($id)
	{
		ifPermissions('users_delete');
		$id = decrypt_url($id);

		if($id!==1){ }else{
			redirect('/','refresh');
			return;
		}

		$id = $this->users_model->delete($id);

		$this->activity_model->add("Hapus User #$id Oleh :".logged('nama'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Penghapusan data berhasil dilakukan');
		
		redirect('users');
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */