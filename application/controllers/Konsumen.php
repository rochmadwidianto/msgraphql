<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Konsumen';
		$this->page_data['page']->menu 		= 'konsumen';
	}

	public function index()
	{
		ifPermissions('konsumen_list');

		// graphql client / request
		$query = <<<GQL
			query {
				konsumen {
					id
					nama
					telp
					alamat
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$this->page_data['konsumen'] = $_arrData->konsumen;
		$this->load->view('konsumen/list', $this->page_data);
	}

	public function get_data_by_id()
	{
		postAllowed();
		
		$data_id = (int)decrypt_url($this->input->post('id'));

		if($data_id) {

			// graphql client / request
			$query = <<<GQL
				query {
					konsumen_by_id(id: {$data_id}) {
						id
						nama
						telp
						alamat
					}
				}
			GQL;

			$_arrData = $this->graphql_request($query);
			$_arrData = $_arrData->konsumen_by_id;
			// end

			if(!empty($_arrData)) {
				echo '
					<input type="hidden" class="form-control" name="id" id="id" value="'.encrypt_url($_arrData->id).'" readonly required >
					<div>
						<div class="row mb-3">
							<label class="col-sm-2 col-4 col-form-label">Nama</label>
							<div class="col-sm-10 col-8">
								<input type="text" class="form-control" name="nama" id="nama" value="'.$_arrData->nama.'" placeholder="Nama Konsumen" autofocus required >
								<div class="invalid-feedback">
								Nama Konsumen harus diisi!
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-4 col-form-label">HP/Telp</label>
							<div class="col-sm-10 col-8">
								<input type="text" class="form-control" name="telp" id="telp" value="'.$_arrData->telp.'" placeholder="Kontak Konsumen" >
							</div>
						</div>
						<div class="row mb-3">
						  <label class="col-sm-2 col-form-label">Alamat</label>
						  <div class="col-sm-10">
							<textarea rows="2" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap">'.$_arrData->alamat.'</textarea>
						  </div>
						</div>
					</div>
				';
			} else {
				echo '
					<div>
						<div class="row mb-3 text-center">
							<div class="alert alert-info" role="alert">
								<em>-- Data tidak ditemukan --</em>
							</div>
						</div>
					</div>
				';
			}
		} else {
			echo '
				<div>
					<div class="row mb-3 text-center">
						<div class="alert alert-info" role="alert">
							<em>-- Data tidak ditemukan --</em>
						</div>
					</div>
				</div>
			';
		}
	}

	public function save()
	{
		ifPermissions('konsumen_add');
		postAllowed();
		
		$result = $this->konsumen_model->CreateData([
			'kons_nama' => $this->input->post('nama'),
			'kons_telp' => $this->input->post('telp'),
			'kons_alamat' => $this->input->post('alamat'),
			'kons_user_id' => logged('id')
		]);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penambahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses penambahan data gagal!');
		}

		$this->activity_model->add('Tambah Konsumen #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('konsumen');
	}

	public function update()
	{
		ifPermissions('konsumen_edit');
		postAllowed();
		$id = decrypt_url($this->input->post('id'));

		$data = [
			'kons_nama' => $this->input->post('nama'),
			'kons_telp' => $this->input->post('telp'),
			'kons_alamat' => $this->input->post('alamat'),
			'kons_user_id' => logged('id')
		];

		$result = $this->konsumen_model->UpdateData($id, $data);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses perubahan data gagal!');
		}

		$this->activity_model->add('Ubah Konsumen #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('konsumen');
	}

	public function delete($id)
	{
		ifPermissions('konsumen_delete');
		$id = decrypt_url($id);

		$_usedUser		= false; // $this->konsumen_model->DataIsUsedUser($id);

		if($_usedUser) {
			$this->session->set_flashdata('alert-type', 'warning');
			$this->session->set_flashdata('alert', 'Data tidak dapat dihapus. Data sudah digunakan!');
		} else {
			$this->konsumen_model->DeleteData($id);
	
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penghapusan data berhasil dilakukan');
		}

		redirect('konsumen');
	}
}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */