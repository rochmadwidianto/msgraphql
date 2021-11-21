<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Konsumen</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Konsumen</li>
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
      <?php if (hasPermissions('konsumen_add')): ?>
        <a data-bs-toggle="modal" data-bs-target="#addModal" title="Tambah Data" class="btn btn-sm btn-outline-success waves-effect waves-light" ><i class="bx bx-plus"></i> Tambah Data</a>
      <?php endif ?>
    </h4>
        
    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100">
      <thead>
        <tr>
          <th width="10">No</th>
          <th width="50">Aksi</th>
          <th width="300">Nama</th>
          <th width="120">HP/Telp</th>
          <th>Alamat</th>
        </tr>
      </thead>
        
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($konsumen as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
          <td class="text-center">
            <?php if (hasPermissions('konsumen_edit')): ?>
              <a title="Ubah Data" data-id="<?php echo encrypt_url($row->kons_id) ?>" data-bs-toggle="modal" data-bs-target="#editModal" class="ubah_data btn btn-sm btn-outline-warning waves-effect waves-light"><i class="bx bx-pencil"></i></a>
            <?php endif ?>
            <?php if (hasPermissions('konsumen_delete')): ?>
              <a href="<?php echo url('konsumen/delete/'.encrypt_url($row->kons_id)) ?>" onclick='return confirm("Apakah Anda yakin akan menghapus data dengan Nama <?php echo $row->kons_nama ?> ?")' title="Hapus Data" class="btn btn-sm btn-outline-danger waves-effect waves-light"><i class="bx bx-trash"></i></a>
            <?php endif ?>
          </td>
          <td><?php echo $row->kons_nama ?></td>
          <td><?php echo $row->kons_telp ?></td>
          <td><?php echo $row->kons_alamat ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- end card-body -->
</div>
<!-- end card -->

<!-- add modal -->
<?php echo form_open_multipart('konsumen/save', [ 'class' => 'needs-validation', 'novalidate' => '' ]); ?>
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
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Konsumen" autofocus required >
              <div class="invalid-feedback">
                Kode Konsumen harus diisi!
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">HP/Telp</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp" id="telp" placeholder="Kontak Konsumen" >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <textarea rows="2" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
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
<?php echo form_open_multipart('konsumen/update', [ 'class' => 'needs-validation', 'novalidate' => '' ]); ?>
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
      { "width": "300px", "targets": 2 },
      { "width": "120px", "targets": 3 },
      { "targets": 4 }
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
		url: "<?php echo site_url('konsumen/get_data_by_id')?>",
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