<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">User</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
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
      <?php if (hasPermissions('users_add')): ?>
        <a href="<?php echo url('users/add') ?>" title="Tambah Data" class="btn btn-sm btn-outline-success waves-effect waves-light"><i class="bx bx-plus"></i> Tambah Data</a>
      <?php endif ?>
    </h4>

    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100" cellspacing="0" width="100%" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Aksi</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($users as $row): ?>
          <tr>
            <td width="20" class="text-center"><?php echo $nomor++; ?></td>
            <td width="100" class="text-center">
              <?php if (hasPermissions('users_edit')): ?>
                <a href="<?php echo url('users/edit/'.encrypt_url($row->id)) ?>" class="btn btn-sm btn-outline-warning waves-effect waves-light" title="Ubah Data"><i class="bx bx-pencil"></i></a>
              <?php endif ?>
              <?php if (hasPermissions('users_view')): ?>
                <a href="<?php echo url('users/view/'.encrypt_url($row->id)) ?>" class="btn btn-sm btn-outline-primary waves-effect waves-light" title="Detail Data"><i class="bx bx-detail"></i></a>
              <?php endif ?>
              <?php if (hasPermissions('users_delete')): ?>
                <?php if ($row->id!=1): ?>
                  <a href="<?php echo url('users/delete/'.encrypt_url($row->id)) ?>" onclick='return confirm("Apakah Anda yakin akan menghapus data <?php echo $row->name ?> ?")' title="Hapus Data" class="btn btn-sm btn-outline-danger waves-effect waves-light"><i class="bx bx-trash"></i></a>
                <?php else: ?>
                  <a href="#" onclick='return alert("Data <?php echo $row->name ?> tidak dapat dihapus!")' title="Data tidak dapat dihapus!" class="btn btn-sm btn-outline-secondary waves-effect waves-light"><i class="bx bx-trash"></i></a>
                <?php endif ?>
              <?php endif ?>
            </td>
            <td width="50" class="text-center">
              <img src="<?php echo url('uploads/users/'.$row->id.'.png'); ?>" width="40" height="40" alt="" class="img-avtar rounded">
            </td>
            <td><?php echo $row->nama ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo ucfirst($this->roles_model->getById($row->role)->title) ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
  <!-- end card-body -->
</div>
<!-- end card -->

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
      { "width": "70px", "bSortable": false, "targets": 1 },
      { "width": "30px", "bSortable": false, "targets": 2 },
      { "width": "70px", "targets": 3 },
      { "width": "70px", "targets": 4 },
      { "width": "70px", "targets": 5 }
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
</script>