<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Penjualan</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Penjualan</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<!-- card -->
<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      <?php if (hasPermissions('penjualan_add')): ?>
        <a data-bs-toggle="modal" data-bs-target="#addModal" title="Tambah Data" class="btn btn-sm btn-outline-success waves-effect waves-light" ><i class="bx bx-plus"></i> Tambah Data</a>
      <?php endif ?>
    </h4>
        
    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100">
      <thead>
        <tr>
          <th width="10">No</th>
          <th width="50">Aksi</th>
          <th width="200">Konsumen</th>
          <th width="200">Barang</th>
          <th width="100">Tanggal</th>
          <th width="50">Jumlah</th>
          <th width="100">Nominal</th>
        </tr>
      </thead>
        
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($penjualan as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
          <td class="text-center">
            <?php if (hasPermissions('penjualan_edit')): ?>
              <a title="Ubah Data" data-id="<?php echo encrypt_url($row->penj_id) ?>" data-bs-toggle="modal" data-bs-target="#editModal" class="ubah_data btn btn-sm btn-outline-warning waves-effect waves-light"><i class="bx bx-pencil"></i></a>
            <?php endif ?>
            <?php if (hasPermissions('penjualan_delete')): ?>
              <a href="<?php echo url('penjualan/delete/'.encrypt_url($row->penj_id)) ?>" onclick='return confirm("Apakah Anda yakin akan menghapus data dengan Nama Konsumen <?php echo $row->kons_nama ?> ?")' title="Hapus Data" class="btn btn-sm btn-outline-danger waves-effect waves-light"><i class="bx bx-trash"></i></a>
            <?php endif ?>
          </td>
          <td><?php echo $row->kons_nama ?></td>
          <td><?php echo $row->inv_nama ?></td>
          <td class="text-center"><?php echo tgl_indo($row->penj_tanggal) ?></td>
          <td class="text-center"><?php echo rupiah($row->penj_jumlah) ?></td>
          <td class="text-end"><?php echo rupiah($row->penj_nominal) ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- end card-body -->
</div>
<!-- end card -->

<!-- add modal -->
<?php echo form_open_multipart('penjualan/save', [ 'class' => 'needs-validation', 'novalidate' => '' ]); ?>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalTitle"><b>Tambah</b> <small>Data</small></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Konsumen</label>
            <div class="col-sm-10">
              <select class="form-control" name="konsumen" placeholder="Pilih Konsumen" required >
                <optgroup label="Data Konsumen">
                  <option value="" >Pilih Konsumen</option>
                  <?php foreach ($this->konsumen_model->get() as $row): ?>
                    <option value="<?php echo $row->kons_id ?>" ><?php echo $row->kons_nama ?></option>
                  <?php endforeach ?>
                </optgroup>
              </select>
              <div class="invalid-feedback">
                Kosumen harus dipilih!
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Barang</label>
            <div class="col-sm-10">
              <select class="form-control" name="barang" id="cbx_barang" placeholder="Pilih Barang" required >
                <optgroup label="Data Barang">
                  <option value="" >Pilih Barang</option>
                  <?php foreach ($this->inventory_model->get() as $row): ?>
                    <option value="<?php echo $row->inv_id ?>" ><?php echo $row->inv_nama ?></option>
                  <?php endforeach ?>
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
              <input type="text" class="form-control flatpickr-input" name="tanggal" id="datepicker-basic" value="<?php echo date('Y-m-d') ?>" placeholder="Tanggal Transaksi" readonly="readonly" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-4">
              <input type="text" class="form-control text-center jumlah currency" name="jumlah" id="jumlah" value="0" placeholder="Jumlah Barang" required >
              <p class="text-muted"><small>Sisa Stok : <b><span class="label_nilai_sisa_stok">0</span></b></small></p>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Harga Satuan</label>
            <div class="col-sm-4">
              <input type="text" class="form-control text-end currency" name="nominal" id="nominal" value="0" placeholder="Harga Barang" readonly="readonly" required >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-4">
              <input type="text" class="form-control text-end fw-semibold currency" name="total" id="total" value="0" placeholder="Harga Total" readonly="readonly" required >
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<!-- end - add modal -->

<!-- edit modal -->
<?php echo form_open_multipart('penjualan/update', [ 'class' => 'needs-validation', 'novalidate' => '' ]); ?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalTitle"><b>Ubah</b> <small>Data</small></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="arrData">
        <div class="text-center">
          <div class="spinner-border text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <!-- get data by server side -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<!-- end - edit modal -->

<?php include viewPath('includes/footer'); ?>
<?php include viewPath('includes/notifications'); ?>

<script>
$(document).ready(function() {
  $('#datatable-list').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"]
    ],
    "columnDefs": [
      { "width": "10px", "targets": 0 },
      { "width": "100px", "bSortable": false, "targets": 1 },
      { "width": "200px", "targets": 2 },
      { "width": "200px", "targets": 3 },
      { "width": "100px", "targets": 4 },
      { "width": "50px", "targets": 5 },
      { "width": "100px", "targets": 6 }
    ],
    dom:  
      "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>",
    buttons: [
      { "extend": 'copy', "text":'COPY',"className": 'text-muted'},
      { "extend": 'csv', "text":'CSV',"className": 'text-warning'},
      { "extend": 'excel', "text":'EXCEL',"className": 'text-success'},
      { "extend": 'pdf', "text":' PDF ',"className": 'text-danger'},
      { "extend": 'print', "text":'PRINT',"className": 'text-info'}
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Cari",
    }
  });
});

// for modal ubah data
 $(document).on('click', '.ubah_data', function (e) {
  // To stop the click propagation up to the `tr` handler
  e.stopPropagation();

  var id = $(this).data("id");
    
	// memulai ajax
	$.ajax({
		url: "<?php echo site_url('penjualan/get_data_by_id')?>",
		method: 'POST',
		data: {id:id},
		success:function(data){
			$('#arrData').html(data);
			$('#editModal').modal("show");
		}
	});
})
// end - for modal ubah data
</script>

<script>

// for get data inventory
 $(document).on('change', '#cbx_barang', function (e) {
  // To stop the click propagation up to the `tr` handler
  e.stopPropagation();

  var id = $(this).val();
  
	// memulai ajax
	$.ajax({
		url: "<?php echo site_url('penjualan/get_inventory_by_id')?>",
		method: 'POST',
		data: {id:id},
		success:function(data){

      const arrData = JSON.parse(data);

      $('.label_nilai_sisa_stok').html(arrData.sisa_stok);
      $('#nominal').val(formatCurrency(arrData.harga));
      
      $('#jumlah').val(arrData.sisa_stok);

      var jumlah  = clearCurrency($('#jumlah').val());
      var nominal = clearCurrency($('#nominal').val());

      var total = jumlah * nominal;

      $('#total').val(formatCurrency(total));

      console.log(data);
		}
	});
})
// end - for get data inventory


// for get data inventory
$(document).on('keyup', '.jumlah', function (e) {

  var sisa_stok = $('.label_nilai_sisa_stok').html();

  var jumlah  = clearCurrency($('#jumlah').val());
  var nominal = clearCurrency($('#nominal').val());

  if(jumlah > sisa_stok) {
    $('#jumlah').val(sisa_stok);

  } else {
    var total = jumlah * nominal;

    $('#total').val(formatCurrency(total));
  }
})
// end - for get data inventory
</script>

<script type="text/javascript">
  $(document).ready(function(){
    // Format currency.
    $('.currency').mask('000.000.000.000', {reverse: true});
  });

  function formatCurrency(num) {
    num      = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num      = "0";
    sign     = (num == (num = Math.abs(num)));
    num      = Math.floor(num*100+0.50000000001);
    cents    = num%100;
    num      = Math.floor(num/100).toString();
    if(cents<10)
    cents    = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num      = num.substring(0,num.length-(4*i+3))+'.'+
    num.substring(num.length-(4*i+3));
    // return (((sign)?'':'-') + num + ',' + cents);
    return (((sign)?'':'-') + num);
  }

  function clearCurrency(str){
    num      = str.toString();
    num      = num.replace(/\$|\./g, '');
    num      = num.replace(/\$|\,/g,'.');
    num      = parseFloat(num);
    return num;
  }
</script>