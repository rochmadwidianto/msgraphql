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
<?php echo form_open_multipart('roles/save', [ 'class' => 'needs-validation', 'novalidate' => '' ]); ?>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      <b>Tambah</b> <small>Data</small>
    </h4>
    <p class="card-title-desc">&nbsp;</p>
        
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Roles</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Roles" autofocus required >
        <div class="invalid-feedback">
          Nama Roles harus diisi!
        </div>
      </div>
    </div>

  </div>
  <!-- end card-body -->
  <div class="card-footer text-end">
    <a href="<?php echo url('roles') ?>" class="btn btn-light"> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Simpan</button>
  </div>
  <!-- end card-footer -->
</div>
<!-- end card -->

<!-- card -->
<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      <b>Hak Akses</b> <small>Menu</small>
    </h4>
    <p class="card-title-desc">&nbsp;</p>
        
    <table id="datatable-list" class="table table-bordered table-striped table-hover dt-responsive wrap w-100" cellspacing="0" width="100%" style="width:100%">
      <thead>
        <tr>
          <th>Nama Menu</th>
          <th>Aksi</th>
          <th>Tombol</th>
          <th>
            <div class="form-check form-check-success">
              <input class="form-check-input check-select-all-p" type="checkbox" id="cbxAccess">
              <label class="form-check-label" for="cbxAccess">&nbsp;</label>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($permissions = $this->permissions_model->GetData())): ?>
        <?php foreach ($permissions as $row): ?>

        <?php if($row->aksi == 'MENU'):
            $row_style = 'font-weight: bold; text-decoration: underline;';
            $row_class = 'text-primary';
            $padding_left = '30px';
          elseif($row->aksi == 'SUBMENU'):
            $row_style = 'font-weight: bold;';
            $row_class = 'text-default';
            $padding_left = '50px';
          else:
            $row_style = '';
            $row_class = '';
            $padding_left = '70px';
          endif ?>

        <tr class='<?php echo $row_class; ?>' style='<?php echo $row_style; ?>'>
          <td style='padding-left: <?php echo $padding_left; ?>'><?php echo ucfirst($row->title) ?></td>
          <td class='text-center'><?php echo $row->aksi ?></td>
          <td class='text-center'>
            <?php if($row->aksi != 'MENU' && $row->aksi != 'SUBMENU'):?>
              <button type='reset' class='<?php echo $row->btn_class ?> waves-effect waves-light'><i class='<?php echo $row->btn_icon ?>'></i></button>
            <?php endif ?>
          </td>
          <td class="text-center">
            <div class="form-check form-check-success">
              <input class="form-check-input check-select-p" type="checkbox" id="cbxAccessList" name="permission[]" value="<?php echo $row->code ?>">
              <label class="form-check-label" for="cbxAccess">&nbsp;</label>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
        <?php else: ?>
          <td colspan="2" class="text-center"><em>-- Data tidak ditemukan --</em></td>
        </tr>
        <?php endif ?>
      </tbody>
    </table>

  </div>
  <!-- end card-body -->
</div>
<!-- end card -->
<?php echo form_close(); ?>

<?php include viewPath('includes/footer'); ?>

<script>
  $(document).ready(function() {
    $('.check-select-all-p').on('change', function() {
      $('.check-select-p').attr('checked', $(this).is(':checked'));
    })
  })
</script>

<script>
  $(document).ready(function() {
    $('#datatable-list').DataTable({
      "pagingType": "full_numbers",
      "ordering": false,
      'order' : false,
      "lengthMenu": [
        [-1],
        ["All"]
      ],
      "columnDefs": [
        { "width": "500px", "targets": 0 },
        { "width": "50px", "targets": 1 },
        { "width": "50px", "targets": 2 },
        { "width": "50px", "targets": 3 }
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari",
      }
    });
});
</script>