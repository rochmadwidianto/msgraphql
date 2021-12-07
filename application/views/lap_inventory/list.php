<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Laporan Inventory</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
          <li class="breadcrumb-item active">Lap Inventory</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<!-- card -->
<div class="card">
  <div class="card-body">
    <h4 class="card-title">&nbsp;</h4>
        
    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100">
      <thead>
        <tr>
          <th width="10">No</th>
          <th width="300">Nama</th>
          <th width="50">Stok</th>
          <th width="150">Harga Satuan</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
        
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($lap_inventory as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
          <td><?php echo $row->inv_nama ?></td>
          <td class="text-center"><?php echo rupiah($row->inv_stok) ?></td>
          <td class="text-end"><?php echo rupiah($row->inv_harga) ?></td>
          <td><?php echo $row->inv_deskripsi ?></td>
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
      { "width": "300px", "targets": 1 },
      { "width": "50px", "targets": 2 },
      { "width": "150px", "targets": 3 },
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
</script>