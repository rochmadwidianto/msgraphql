<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Profil';
		$this->page_data['page']->menu 	= false;
	}

	public function index()
	{
		$this->page_data['user'] = $this->users_model->GetDataById(logged('id'));
		$this->page_data['user']->role = $this->roles_model->getByWhere([
			'id'=> logged('role')
		])[0];
		$this->page_data['user']->activity = $this->activity_model->getByWhere([
			'user'=> logged('id')
		], [ 'order' => ['id', 'desc'] ]);
		
		$this->load->view('account/profile', $this->page_data);
	}

	public function updateProfile()
	{
		$id = logged('id');
		
		postAllowed();

		$data = [
			'role' => $this->input->post('role'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
		];

		$password = post('password');

		if(!empty($password))
			$data['password'] = md5($password);

		$id = $this->users_model->update($id, $data);

		$this->activity_model->add("User #$id melakukan perubahan profil");

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');
		
		redirect('profile/index/edit');
	}

	public function updateProfilePic()
	{
		$id = logged('id');
		
		if (!empty($_FILES['image']['name'])) {

			$this->uploadlib->initialize([
				'file_name' => $id.'.png'
			]);

			$this->uploadlib->uploadImage('image', '/users');
		}

		$this->activity_model->add("User #$id melakukan perubahan gambar profil");

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');

		redirect('profile/index/change_pic');
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */