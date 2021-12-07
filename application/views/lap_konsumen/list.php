<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Laporan Konsumen</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
          <li class="breadcrumb-item active">Lap Konsumen</li>
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
          <th width="120">HP/Telp</th>
          <th>Alamat</th>
        </tr>
      </thead>
        
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($lap_konsumen as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
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
      { "width": "120px", "targets": 2 },
      { "targets": 3 }
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