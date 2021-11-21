<!doctype html>
<html lang="en">

  <head>
        
    <meta charset="utf-8" />
    <title><?php echo $page->title ?> | Implementasi Microservice & GraphQL - 185410014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Pichforest" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $url->assets ?>samplyadmin/images/favicon.png">

    <!-- DataTables -->
    <link href="<?php echo $url->assets ?>samplyadmin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url->assets ?>samplyadmin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Select datatable -->
    <link href="<?php echo $url->assets ?>samplyadmin/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable -->
    <link href="<?php echo $url->assets ?>samplyadmin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

    <link href="<?php echo $url->assets ?>samplyadmin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url->assets ?>samplyadmin/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url->assets ?>samplyadmin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

    <!-- Datepicker Css-->
    <link href="<?php echo $url->assets; ?>samplyadmin/libs/@chenfengyuan/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- flatpickr css -->
    <link href="<?php echo $url->assets; ?>samplyadmin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- File Upload Plugins css -->
    <link href="<?php echo $url->assets ?>samplyadmin/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="<?php echo $url->assets ?>samplyadmin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo $url->assets ?>samplyadmin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo $url->assets ?>samplyadmin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo $url->assets ?>samplyadmin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Dark Mode Css-->
    <link href="<?php echo $url->assets ?>samplyadmin/css/dark-layout.min.css" id="app-style" rel="stylesheet" type="text/css" />

  </head>

  <body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
      <div id="status">
        <div class="spinner-chase">
          <div class="chase-dot"></div>
          <div class="chase-dot"></div>
          <div class="chase-dot"></div>
          <div class="chase-dot"></div>
          <div class="chase-dot"></div>
          <div class="chase-dot"></div>
        </div>
      </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

      <header id="page-topbar">
        <div class="navbar-header">
          <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
              <a href="<?php echo url('/') ?>" class="logo logo-dark">
                <span class="logo-sm">
                  <img src="<?php echo $url->assets ?>samplyadmin/images/logo-sm.png" alt="logo-sm" height="30">
                </span>
                <span class="logo-lg">
                  <img src="<?php echo $url->assets ?>samplyadmin/images/logo-dark.png" alt="logo-dark" height="40">
                </span>
              </a>

              <a href="<?php echo url('/') ?>" class="logo logo-light">
                <span class="logo-sm">
                  <img src="<?php echo $url->assets ?>samplyadmin/images/logo-sm-light.png" alt="logo-sm-light" height="30">
                </span>
                <span class="logo-lg">
                  <img src="<?php echo $url->assets ?>samplyadmin/images/logo-light.png" alt="logo-light" height="40">
                </span>
              </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect" id="vertical-menu-btn">
              <i class="fa fa-fw fa-bars"></i>
            </button>

            <button type="button" class="btn btn-sm px-3 font-size-16 horinav-toggle header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
              <i class="fa fa-fw fa-bars"></i>
            </button>
          </div>

          <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
              <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                <i class="mdi mdi-fullscreen"></i>
              </button>
            </div>

            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="<?php echo userProfile(logged('id')) ?>" alt=" ">
                <span class="d-none d-xl-inline-block ms-1"><?php echo logged('nama') ?></span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome <?php echo logged('nama') ?>!</h6>
                <a class="dropdown-item" href="<?php echo url('profile') ?>"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-profile">Profile</span></a>
                <a class="dropdown-item" href="<?php echo url('/logout') ?>"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-logout">Logout</span></a>
              </div>
            </div>

          </div>
        </div>
      </header>

      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">

        <div data-simplebar class="h-100">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
            <!-- Left Menu Start -->

            <?php include 'nav.php' ?>

          </div>
          <!-- Sidebar -->
        </div>
      </div>
      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

        <div class="page-content">
          <div class="container-fluid">

            <!-- start page title -->
                        
                        
                    