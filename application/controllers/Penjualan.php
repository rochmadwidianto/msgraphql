<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title 	= 'Penjualan';
		$this->page_data['page']->menu 		= 'penjualan';
	}

	public function index()
	{
		ifPermissions('penjualan_list');

		$this->page_data['penjualan'] = $this->penjualan_model->GetData();
		$this->load->view('penjualan/list', $this->page_data);
	}

	public function get_data_by_id()
	{
		postAllowed();
		
		$data_id = decrypt_url($this->input->post('id'));

		if($data_id) {
			
			$_arrData = $this->penjualan_model->getById($data_id);

			// konsumen
			$konsumenSelected = $_arrData->penj_kons_id == '' ? 'selected' : '';
			$_cbxKonsumen = '<option value="" '.$konsumenSelected.'>Pilih Konsumen</option>';
			foreach ($this->konsumen_model->get() as $row) {
				$konsumenSelected = $_arrData->penj_kons_id == $row->kons_id ? 'selected' : '';
				$_cbxKonsumen .= '<option value="'.$row->kons_id.'" '.$konsumenSelected.'>'.$row->kons_nama.'</option>';
			}
			
			// barang
			$barangSelected = $_arrData->penj_inv_id == '' ? 'selected' : '';
			$_cbxBarang = '<option value="" '.$barangSelected.'>Pilih Konsumen</option>';
			foreach ($this->inventory_model->get() as $row) {
				$barangSelected = $_arrData->penj_inv_id == $row->inv_id ? 'selected' : '';
				$_cbxBarang .= '<option value="'.$row->inv_id.'" '.$barangSelected.'>'.$row->inv_nama.'</option>';
			}

			if(!empty($_arrData)) {
				echo '
					<input type="hidden" class="form-control" name="id" id="id" value="'.encrypt_url($_arrData->penj_id).'" readonly required >
					<div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Konsumen</label>
							<div class="col-sm-10">
								<select class="form-control" name="konsumen" id="konsumen" placeholder="Pilih Konsumen" required >
									<optgroup label="Data Konsumen">
										'.$_cbxKonsumen.'
									</optgroup>
								</select>
								<div class="invalid-feedback">
									Konsumen harus dipilih!
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Barang</label>
							<div class="col-sm-10">
								<select class="form-control" name="barang" id="barang" placeholder="Pilih Barang" required >
									<optgroup label="Data Barang">
										'.$_cbxBarang.'
									</optgroup>
								</select>
								<div class="invalid-feedback">
									Barang harus dipilih!
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-4">
								<input type="text" class="form-control flatpickr-input" name="tanggal" id="datepicker-basic" value="'.$_arrData->penj_tanggal.'" placeholder="Tanggal Transaksi" readonly="readonly">
							</div>
						</div>
					  	<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Jumlah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="jumlah" id="jumlah" value="'.rupiah($_arrData->penj_jumlah).'" placeholder="Jumlah Barang" >
							</div>
						</div>
					  	<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Harga</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="nominal" id="nominal" value="'.rupiah($_arrData->penj_nominal).'"  placeholder="Harga Barang" >
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
		ifPermissions('penjualan_add');
		postAllowed();
		
		$result = $this->penjualan_model->create([
			'penj_kons_id' => $this->input->post('konsumen'),
			'penj_inv_id' => $this->input->post('barang'),
			'penj_tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'penj_jumlah' => $this->input->post('jumlah'),
			'penj_nominal' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('nominal') != '' ? $this->input->post('nominal') : '0.00')),
			'penj_user_id' => logged('id')
		]);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penambahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses penambahan data gagal!');
		}

		$this->activity_model->add('Tambah Penjualan #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('penjualan');
	}

	public function update()
	{
		ifPermissions('penjualan_edit');
		postAllowed();
		$id = decrypt_url($this->input->post('id'));

		$data = [
			'penj_kons_id' => $this->input->post('konsumen'),
			'penj_inv_id' => $this->input->post('barang'),
			'penj_tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'penj_jumlah' => $this->input->post('jumlah'),
			'penj_nominal' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('nominal') != '' ? $this->input->post('nominal') : '0.00')),
			'penj_user_id' => logged('id')
		];

		$result = $this->penjualan_model->update($id, $data);

		if((bool)$result) {

			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Perubahan data berhasil dilakukan');
		} else {

			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Proses perubahan data gagal!');
		}

		$this->activity_model->add('Ubah Penjualan #'.$this->input->post('nama').' Oleh : '.logged('nama'), logged('id'));
		
		redirect('penjualan');
	}

	public function delete($id)
	{
		ifPermissions('penjualan_delete');
		$id = decrypt_url($id);

		$_usedUser		= false; // $this->penjualan_model->DataIsUsedUser($id);

		if($_usedUser) {
			$this->session->set_flashdata('alert-type', 'warning');
			$this->session->set_flashdata('alert', 'Data tidak dapat dihapus. Data sudah digunakan!');
		} else {
			$this->penjualan_model->delete($id);
	
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penghapusan data berhasil dilakukan');
		}

		redirect('penjualan');
	}
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */