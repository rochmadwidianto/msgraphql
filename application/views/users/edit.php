<?php include viewPath('includes/header'); ?>

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
<?php echo form_open_multipart('users/update/'.encrypt_url($User->id), [ 'class' => 'needs-validation', 'novalidate' => '', 'autocomplete' => 'off' ]); ?>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      <b>Ubah</b> <small>Data</small>
    </h4>
    <p class="card-title-desc">&nbsp;</p>
        
    <div class="row">
      <div class="col-sm-6">
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $User->nama ?>" onkeyup="$('#formClient-Username').val(createUsername(this.value))" placeholder="Nama Lengkap" autofocus required >
            <div class="invalid-feedback">
              Nama harus diisi!
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">No. HP/Telp</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $User->telp ?>" placeholder="Nomor HP / Telephone" >
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $User->email ?>" data-rule-remote="<?php echo url('users/check') ?>" data-msg-remote="Email sudah digunakan!" placeholder="Email" required >
            <div class="invalid-feedback">
              Email tidak valid atau Email belum diisi!
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea rows="2" class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap" required ><?php echo $User->alamat ?></textarea>
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
            <input type="text" class="form-control" name="username" id="formClient-Username" value="<?php echo $User->username ?>" data-rule-remote="<?php echo url('users/check') ?>" data-msg-remote="Username sudah digunakan!" placeholder="Username" required >
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
                    <?php $sel = !empty($User->role) && $User->role==$row->id ? 'selected' : '' ?>
                    <option value="<?php echo $row->id ?>" <?php echo $sel ?>><?php echo $row->title ?></option>
                  <?php endforeach ?>
                </optgroup>
              </select>
            </div>
          </div>
        <?php else: ?>
          <input type="hidden" class="form-control" name="role" id="role" placeholder="Roles" value="<?php echo $User->role->id ?>" readonly >
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
              <img src="<?php echo userProfile($User->id) ?>" class="img-circle rounded" alt="Uploaded Image Preview" width="100" height="100">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- end card-body -->
  <div class="card-footer text-end">
    <a href="<?php echo url('users') ?>" class="btn btn-light"> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Simpan</button>
  </div>
  <!-- end card-footer -->
</div>
<?php echo form_close(); ?>
<!-- end card -->

<?php include viewPath('includes/footer'); ?>

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