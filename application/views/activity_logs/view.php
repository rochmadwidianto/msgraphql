<?php include viewPath('includes/header'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Detail Activity Logs</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Detail Activity Logs</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<!-- card -->
<div class="card">
  <div class="card-body">
    
  </div>
<!-- end card body -->
</div>
<!-- end card -->






<!-- card -->
<div class="card">
  <div class="card-header card-header-primary card-header-icon">
    <div class="card-icon">
      <i class="material-icons">assignment</i>
    </div>
    <h4 class="card-title">Detail Activity Logs</h4>
  </div>
  <div class="card-body">
  <div class="col-md-6">
              <ul class="timeline timeline-simple">
                <li class="timeline-inverted">
                  <div class="timeline-badge danger">
                    <i class="material-icons">vpn_key</i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <span class="badge badge-pill badge-danger">Log Id</span>
                    </div>
                    <div class="timeline-body">
                      <p<strong><?php echo $activity->id ?></strong></p>
                    </div>
                    <!-- <h6>
                      <i class="ti-time"></i> 11 hours ago via Twitter
                    </h6> -->
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge success">
                    <i class="material-icons">email</i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <span class="badge badge-pill badge-success">Pesan</span>
                    </div>
                    <div class="timeline-body">
                      <p><strong><?php echo $activity->title ?></strong></p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge info">
                    <i class="material-icons">people</i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <span class="badge badge-pill badge-info">User</span>
                    </div>
                    <div class="timeline-body">
					  <?php $User = $this->users_model->getById($activity->user) ?>
                      <p><strong><?php echo $activity->user > 0 ? $User->name : '' ?></strong>&nbsp;&nbsp;</p>
                      <hr>
                      <div class="dropdown pull-left">
					  	<a class="btn btn-xs btn-primary btn-round" href="<?php echo url('users/view/'.encrypt_url($User->id)) ?>" target="_blank" data-toggle="tooltip" title="User Logs"><i class="material-icons">history</i> User Logs</a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge warning">
                    <i class="material-icons">query_builder</i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <span class="badge badge-pill badge-warning">Date Time</span>
                    </div>
                    <div class="timeline-body">
                      <p><strong><?php echo date('h:m a - d M, Y', strtotime($activity->created_at)) ?></strong></p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
  </div>
  <!-- end card-body-->
</div>
<!-- end card -->

<?php include viewPath('includes/footer'); ?>