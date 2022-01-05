<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Roles</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Roles</li>
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
      <?php if (hasPermissions('roles_add')): ?>
        <a href="<?php echo url('roles/add') ?>" title="Tambah Data" class="btn btn-sm btn-outline-success waves-effect waves-light"><i class="bx bx-plus"></i> Tambah Data</a>
      <?php endif ?>
    </h4>
        
    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100">
      <thead>
        <tr>
          <th width="10">No</th>
          <th width="50">Aksi</th>
          <th>Nama</th>
        </tr>
      </thead>
        
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($roles as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
          <td class="text-center">
            <?php if (hasPermissions('roles_edit')): ?>
              <a href="<?php echo url('roles/edit/'.encrypt_url($row->id)) ?>" title="Ubah Data" class="btn btn-sm btn-outline-warning waves-effect waves-light"><i class="bx bx-pencil"></i></a>
            <?php endif ?>
          </td>
          <td>
            <?php echo $row->title ?>
          </td>
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
      { "width": "100px", "bSortable": false, "targets": 1 },
      { "targets": 2 }
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