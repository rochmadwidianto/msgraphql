<?php include viewPath('includes/header'); ?>
<?php include viewPath('includes/notifications'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Activity Logs</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Activity Logs</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<!-- card -->
<div class="card">
  <div class="card-body">

    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100" cellspacing="0" width="100%" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>IP Address</th>
          <th>Pesan</th>
          <th>Date Time</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($activity_logs as $row): ?>
        <tr>
          <td class="text-center"><?php echo $nomor++; ?></td>
          <td class="text-center">
            <?php echo !empty($row->ip_address) ? $row->ip_address : 'N/A' ?>
          </td>
          <td>
            <?php echo $row->title ?>
          </td>
          <td class="text-center"><?php echo date('h:m a - d M, Y', strtotime($row->created_at)) ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
<!-- end card body -->
</div>
<!-- end card -->

<?php include viewPath('includes/footer'); ?>

<script>
  $(document).ready(function() {
    $('#datatable-list').DataTable({
      "pagingType": "full_numbers",
      "ordering": false,
      'order' : false,
      "lengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
      ],
      "columnDefs": [
        { "width": "10px", "targets": 0 },
        { "width": "100px", "targets": 1 },
        { "width": "30px", "targets": 2 },
        { "width": "100px", "targets": 3 }
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari",
      }
    });
});
</script>