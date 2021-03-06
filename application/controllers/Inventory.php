<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Inventory';
		$this->page_data['page']->menu 		= 'inventory';
	}

	public function index()
	{
		ifPermissions('inventory_list');

		// graphql client / request
		$query = <<<GQL
			query {
				inventory {
					id
					nama
					deskripsi
					stok
					harga
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$_dataList = array();
		foreach($_arrData->inventory as $key => $list) {

			// get jumlah inventory yang terjual
			$_jmlTerjual = $this->penjualan_model->GetTerjualByInvId($list->id);
			if(!is_null($_jmlTerjual)) {
				$_jmlTerjual = (int)$_jmlTerjual->jumlah_terjual;
			} else {
				$_jmlTerjual = 0;
			}

			$_dataList[$key] = (object) array(
				'id' => $list->id,
				'nama' => $list->nama,
				'deskripsi' => $list->deskripsi,
				'stok' => ((int)$list->stok - (int)$_jmlTerjual),
				'harga' => $list->harga
			);
		}

		$this->page_data['inventory'] = $_dataList;
		$this->load->view('inventory/list', $this->page_data);
	}

	public function get_data_by_id()
	{
		postAllowed();
		
		$data_id = (int)decrypt_url($this->input->post('id'));

		if($data_id) {

			// graphql client / request
			$query = <<<GQL
				query {
					inventory_by_id(id: {$data_id}) {
						id
						nama
						deskripsi
						stok
						harga
					}
				}
			GQL;

			$_arrData = $this->graphql_request($query);
			$_arrData = $_arrData->inventory_by_id;
			// end

			if(!empty($_arrData)) {
				echo '
					<input type="hidden" class="form-control" name="id" id="id" value="'.encrypt_url($_arrData->id).'" readonly required >
					<div>
						<div class="row mb-3">
							<label class="col-sm-2 col-4 col-form-label">Nama</label>
							<div class="col-sm-10 col-8">
								<input type="text" class="form-control" name="nama" id="nama" value="'.$_arrData->nama.'" placeholder="Nama Barang" autofocus required >
								<div class="invalid-feedback">
								Nama Barang harus diisi!
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-4 col-form-label">Stok</label>
							<div class="col-sm-4 col-8">
								<input type="text" class="form-control text-center currency" name="stok" id="stok" value="'.rupiah($_arrData->stok).'" placeholder="Stok Barang" >
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-4 col-form-label">Harga</label>
							<div class="col-sm-4 col-8">
								<input type="text" class="form-control text-end currency" name="harga" id="harga" value="'.rupiah($_arrData->harga).'" placeholder="Harga Barang" >
							</div>
						</div>
						<div class="row mb-3">
						  <label class="col-sm-2 col-form-label">Deskripsi</label>
						  <div class="col-sm-10">
							<textarea rows="2" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Barang">'.$_arrData->deskripsi.'</textarea>
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
		ifPermissions('inventory_add');
		postAllowed();
		
		$result = $this->inventory_model->CreateData([
			'inv_nama' => $this->input->post('nama'),
			'inv_stok' => $this->input->post('stok'),
			'inv_harga' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('harga') != '' ? $this->input->post('harga') : '0.00')),
			'inv_deskripsi' => $this->input->post('deskripsi'),
			'inv_user_id' => logged('id')
		]);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penambahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses penambahan data gagal!');
		}

		$this->activity_model->add('Tambah Inventory #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('inventory');
	}

	public function update()
	{
		ifPermissions('inventory_edit');
		postAllowed();
		$id = decrypt_url($this->input->post('id'));

		$data = [
			'inv_nama' => $this->input->post('nama'),
			'inv_stok' => $this->input->post('stok'),
			'inv_harga' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('harga') != '' ? $this->input->post('harga') : '0.00')),
			'inv_deskripsi' => $this->input->post('deskripsi'),
			'inv_user_id' => logged('id')
		];

		$result = $this->inventory_model->UpdateData($id, $data);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses perubahan data gagal!');
		}

		$this->activity_model->add('Ubah Inventory #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('inventory');
	}

	public function delete($id)
	{
		ifPermissions('inventory_delete');
		$id = decrypt_url($id);

		$_usedUser		= false; // $this->inventory_model->DataIsUsedUser($id);

		if($_usedUser) {
			$this->session->set_flashdata('alert-type', 'warning');
			$this->session->set_flashdata('alert', 'Data tidak dapat dihapus. Data sudah digunakan!');
		} else {
			$this->inventory_model->DeleteData($id);
	
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penghapusan data berhasil dilakukan');
		}

		redirect('inventory');
	}
}

/* End of file Inventory.php */
/* Location: ./application/controllers/Inventory.php */