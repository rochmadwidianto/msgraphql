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

		// graphql client / request
		
		// attribute / data dibawah ini disediakan oleh server namun tidak digunakan
		// kons_id, kons_telp, kons_alamat, inv_id, inv_deskripsi, inv_stok, inv_harga
		$query = <<<GQL
			query {
				penjualan {
					id
					kons_nama
					inv_nama
					tanggal
					jumlah
					nominal
				}
			}
		GQL;

		$_arrData = $this->graphql_request($query);
		// end

		$this->page_data['penjualan'] = $_arrData->penjualan;
		$this->load->view('penjualan/list', $this->page_data);
	}

	public function tambah_data()
	{
		// konsumen
		$_cbxKonsumen = '<option value="">Pilih Konsumen</option>';
		foreach ($this->konsumen_model->GetData() as $row) {
			$_cbxKonsumen .= '<option value="'.$row->kons_id.'">'.$row->kons_nama.'</option>';
		}
			
		// barang
		$_cbxBarang = '<option value="">Pilih Konsumen</option>';
		foreach ($this->inventory_model->GetData() as $row) {
			$_cbxBarang .= '<option value="'.$row->inv_id.'">'.$row->inv_nama.'</option>';
		}

		echo '
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
						<select class="form-control" name="barang" id="cbx_barang" placeholder="Pilih Barang" required >
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
						<input type="text" class="form-control flatpickr-input" name="tanggal" id="datepicker-basic" placeholder="Tanggal Transaksi" readonly="readonly">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Jumlah</label>
					<div class="col-sm-4">
						<input type="text" class="form-control text-center jumlah currency" name="jumlah" id="jumlah" placeholder="Jumlah Barang" required >
						<p class="text-muted"><small>Sisa Stok : <b><span class="label_nilai_sisa_stok">0</span></b></small></p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Harga Satuan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control text-end nominal currency" name="nominal" id="nominal" placeholder="Harga Barang" readonly="readonly" required >
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Total</label>
					<div class="col-sm-4">
						<input type="text" class="form-control text-end fw-semibold total currency" name="total" id="total" placeholder="Harga Total" readonly="readonly" required >
					</div>
				</div>
			</div>
		';
	}

	public function get_data_by_id()
	{
		postAllowed();
		
		$data_id = (int)decrypt_url($this->input->post('id'));

		if($data_id) {
			
			// graphql client / request
		
			// attribute / data dibawah ini disediakan oleh server namun tidak digunakan
			// kons_telp, kons_alamat, inv_deskripsi
			$query = <<<GQL
				query {
					penjualan_by_id(id: {$data_id}) {
						id
						kons_id
						kons_nama
						inv_id
						inv_nama
						inv_stok
						inv_harga
						tanggal
						jumlah
						nominal
					}
				}
			GQL;

			$_arrData = $this->graphql_request($query);
			$_arrData = $_arrData->penjualan_by_id;
			// end

			// konsumen
			$konsumenSelected = $_arrData->kons_id == '' ? 'selected' : '';
			$_cbxKonsumen = '<option value="" '.$konsumenSelected.'>Pilih Konsumen</option>';
			foreach ($this->konsumen_model->GetData() as $row) {
				$konsumenSelected = $_arrData->kons_id == $row->kons_id ? 'selected' : '';
				$_cbxKonsumen .= '<option value="'.$row->kons_id.'" '.$konsumenSelected.'>'.$row->kons_nama.'</option>';
			}
			
			// barang
			$barangSelected = $_arrData->inv_id == '' ? 'selected' : '';
			$_cbxBarang = '<option value="" '.$barangSelected.'>Pilih Konsumen</option>';
			foreach ($this->inventory_model->GetData() as $row) {
				$barangSelected = $_arrData->inv_id == $row->inv_id ? 'selected' : '';
				$_cbxBarang .= '<option value="'.$row->inv_id.'" '.$barangSelected.'>'.$row->inv_nama.'</option>';
			}

			if(!empty($_arrData)) {
				// get jumlah inventory yang terjual
				$_jmlTerjual 	= $this->penjualan_model->GetTerjualByInvId($_arrData->inv_id, $_arrData->id);
				if(!is_null($_jmlTerjual)) {
					$_sisaStok	= ((int)$_arrData->inv_stok - (int)$_jmlTerjual);
				} else {
					$_sisaStok	= (int)$_arrData->inv_stok;
				}

				echo '
					<input type="hidden" class="form-control" name="id" id="id" value="'.encrypt_url($_arrData->id).'" readonly required >
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
								<select class="form-control" name="barang" id="cbx_barang" placeholder="Pilih Barang" required >
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
								<input type="text" class="form-control flatpickr-input" name="tanggal" id="datepicker-basic" value="'.$_arrData->tanggal.'" placeholder="Tanggal Transaksi" readonly="readonly">
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Jumlah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control text-center jumlah currency" name="jumlah" id="jumlah" value="'.rupiah($_arrData->jumlah).'" placeholder="Jumlah Barang" required >
								<p class="text-muted"><small>Sisa Stok : <b><span class="label_nilai_sisa_stok">'.$_sisaStok.'</span></b></small></p>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Harga Satuan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control text-end nominal currency" name="nominal" id="nominal" value="'.rupiah($_arrData->inv_harga).'" placeholder="Harga Barang" readonly="readonly" required >
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Total</label>
							<div class="col-sm-4">
								<input type="text" class="form-control text-end fw-semibold total currency" name="total" id="total" value="'.rupiah($_arrData->nominal).'" placeholder="Harga Total" readonly="readonly" required >
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

	function get_inventory_by_id() {
		
		postAllowed();
		
		$data_id = $this->input->post('id');
		
		$_arrData = $this->inventory_model->GetDataById($data_id);
		// get jumlah inventory yang terjual
		$_jmlTerjual = $this->penjualan_model->GetTerjualByInvId($data_id);

		$data = array();
		if(!empty($_arrData)) {
			if(!is_null($_jmlTerjual)) {
				$data['sisa_stok'] 	= ((int)$_arrData->inv_stok - (int)$_jmlTerjual->jumlah_terjual);
			} else {
				$data['sisa_stok'] 	= (int)$_arrData->inv_stok;
			}
			$data['harga'] 		= $_arrData->inv_harga;
		} else {
			$data['sisa_stok'] 	= 0;
			$data['harga'] 		= 0;
		}

		echo json_encode($data);
	}

	public function save()
	{
		ifPermissions('penjualan_add');
		postAllowed();
		
		$result = $this->penjualan_model->CreateData([
			'penj_kons_id' => $this->input->post('konsumen'),
			'penj_inv_id' => $this->input->post('barang'),
			'penj_tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'penj_jumlah' => $this->input->post('jumlah'),
			'penj_nominal' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('total') != '' ? $this->input->post('total') : '0.00')),
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
			'penj_nominal' => preg_replace('/[^A-Za-z0-9\  ]/', '', ($this->input->post('total') != '' ? $this->input->post('total') : '0.00')),
			'penj_user_id' => logged('id')
		];

		$result = $this->penjualan_model->UpdateData($id, $data);

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
			$this->penjualan_model->DeleteData($id);
	
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Penghapusan data berhasil dilakukan');
		}

		redirect('penjualan');
	}
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */