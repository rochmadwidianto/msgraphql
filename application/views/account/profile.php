<?php include viewPath('includes/header'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Profil</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<div class="row mb-4">
	<div class="col-xl-4">

		<div class="card">

			<div class="card-body">
				<div>
					<div class="dropdown float-end">
						<a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
							<i class="mdi mdi-dots-vertical"></i>
						</a>

						<div class="dropdown-menu dropdown-menu-end">
							<?php if (hasPermissions('users_edit')): ?>
								<a class="dropdown-item" href="<?php echo url('users/edit/'.encrypt_url($user->id)) ?>">Ubah</a>
              				<?php endif ?>
              				<?php if (hasPermissions('users_delete')): ?>
								<a class="dropdown-item" href="<?php echo url('users/delete/'.encrypt_url($user->id)) ?>" onclick='return confirm("Apakah Anda yakin akan menghapus data <?php echo $user->nama ?> ?")' >Hapus</a>
              				<?php endif ?>
						</div>
					</div>
					<div class="clearfix"></div>
				
					<div class="text-center bg-pattern">
						<img src="<?php echo userProfile($user->id) ?>" class="avatar-xl img-thumbnail rounded-circle mb-3" alt="Profile Image" >
						<h4 class="text-primary mb-2"><?php echo $user->nama ?></h4>
						<h5 class="text-muted font-size-13 mb-3"><?php echo $user->role->title ?></h5>
					</div>

					<hr class="my-4">
					
					<div class="table-responsive">
                        <h5 class="font-size-16">Informasi Personal</h5>
                        <div class="mt-3">
                            <p class="mb-1 text-muted">Nama</p>
                            <h5 class="font-size-14"><?php echo $user->nama ?></h5>
                        </div>
                        <div class="mt-3">
                            <p class="mb-1 text-muted">No. HP/Telp</p>
                            <h5 class="font-size-14"><?php echo $user->telp ?></h5>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">Email</p>
                            <h5 class="font-size-14"><?php echo $user->email ?></h5>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">Alamat</p>
                            <h5 class="font-size-14"><?php echo $user->alamat ?></h5>
                        </div>
                    </div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-xl-8">
		<div class="card mb-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#user_activity_logs" role="tab">
                        <i class="mdi mdi-history font-size-20"></i>
                        <span class="d-none d-sm-block">Activity Logs</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#user_edit" role="tab">
                        <i class="mdi mdi-account-edit-outline font-size-20"></i>
                        <span class="d-none d-sm-block">Ubah Data</span> 
                    </a>
                </li>
            </ul>
            <!-- Tab content -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="user_activity_logs" role="tabpanel">
                    <div>
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
                                <?php foreach ($user->activity as $row): ?>
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
                </div>
                <div class="tab-pane" id="user_edit" role="tabpanel">
                    <!-- row -->
                    <?php echo form_open_multipart('users/update/'.encrypt_url($user->id), [ 'class' => 'needs-validation', 'novalidate' => '', 'autocomplete' => 'off' ]); ?>
                    <div class="row">
                    <div class="col-sm-6">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $user->nama ?>" onkeyup="$('#formClient-Username').val(createUsername(this.value))" placeholder="Nama Lengkap" autofocus required >
                                    <div class="invalid-feedback">
                                        Nama harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">No. HP/Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $user->telp ?>" placeholder="Nomor HP / Telephone" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->email ?>" data-rule-remote="<?php echo url('users/check') ?>" data-msg-remote="Email sudah digunakan!" placeholder="Email" required >
                                    <div class="invalid-feedback">
                                        Email tidak valid atau Email belum diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap" required ><?php echo $user->alamat ?></textarea>
                                    <div class="invalid-feedback">
                                        Alamat harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="formClient-Username" value="<?php echo $user->username ?>" data-rule-remote="<?php echo url('users/check') ?>" data-msg-remote="Username sudah digunakan!" placeholder="Username" required >
                                    <div class="invalid-feedback">
                                        Username harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                                    <p class="help-block"><small><i>Kosongkan bila tidak ingin mengubah password!</i></small></p>
                                </div>
                            </div>
                            
                            <!-- filter for role administrator -->
                            <?php if((int)logged('role') == 1): ?>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Roles</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="role" >
                                            <optgroup label="Roles">
                                                <?php foreach ($this->roles_model->get() as $row): ?>
                                                <?php $sel = !empty($user->role->id) && $user->role->id == $row->id ? 'selected' : '' ?>
                                                <option value="<?php echo $row->id ?>" <?php echo $sel ?>><?php echo $row->title ?></option>
                                                <?php endforeach ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            <?php else: ?>
                                <input type="hidden" class="form-control" name="role" id="role" placeholder="Roles" value="<?php echo $user->role->id ?>" readonly >
                            <?php endif; ?>
                            <!-- end - filter for role administrator -->

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control inputFileVisible" placeholder="Pilih File">
                                    <input class="form-control" type="file" id="formFile" multiple="" name="image" class="inputFileHidden" accept="image/*" onchange="previewImage(this, '#imagePreview')">
                                    <p class="help-block text-muted"><small>Format : GIF, JPG, JPEG, PNG | Max : <?php echo ini_get("upload_max_filesize"); ?>B</small></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">&nbsp;</label>
                                <div class="col-sm-9">
                                    <div class="form-group" id="imagePreview">
                                    <img src="<?php echo userProfile($user->id) ?>" class="img-circle rounded" alt="Uploaded Image Preview" width="100" height="100">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">&nbsp;</div>
                                <div class="col-sm-6 text-end">
                                    <a href="<?php echo url('users') ?>" class="btn btn-light"> Batal</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- end row -->
                </div>
            </div>
		</div>
	</div>
</div>

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
            { "width": "50px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "70px", "targets": 3 }
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari",
        }
    });
});
</script>

<script>
function previewImage(input, previewDom) {
  if (input.files && input.files[0]) {
    $(previewDom).show();
    var reader = new FileReader();
    reader.onload = function(e) {
      $(previewDom).find('img').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    $(previewDom).hide();
  }
}
</script>

<script>
// for file input
$('.form-file-simple .inputFileVisible').click(function() {
  $(this).siblings('.inputFileHidden').trigger('click');
});

$('.form-file-simple .inputFileHidden').change(function() {
  var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
  $(this).siblings('.inputFileVisible').val(filename);
});

$('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
  $(this).parent().parent().find('.inputFileHidden').trigger('click');
  $(this).parent().parent().addClass('is-focused');
});

$('.form-file-multiple .inputFileHidden').change(function() {
  var names = '';
  for (var i = 0; i < $(this).get(0).files.length; ++i) {
    if (i < $(this).get(0).files.length - 1) {
      names += $(this).get(0).files.item(i).name + ',';
    } else {
      names += $(this).get(0).files.item(i).name;
    }
  }
  $(this).siblings('.input-group').find('.inputFileVisible').val(names);
});

$('.form-file-multiple .btn').on('focus', function() {
  $(this).parent().siblings().trigger('focus');
});

$('.form-file-multiple .btn').on('focusout', function() {
  $(this).parent().siblings().trigger('focusout');
});
// end - for file input
</script>