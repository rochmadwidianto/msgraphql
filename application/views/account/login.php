<!doctype html>
<html lang="en">
  <head>
        
    <meta charset="utf-8" />
    <title>Login | Implementasi Microservice & GraphQL - 185410014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Pichforest" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $assets; ?>samplyadmin/images/favicon.png">

    <!-- Sweet Alert-->
    <link href="<?php echo $assets; ?>samplyadmin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo $assets; ?>samplyadmin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo $assets; ?>samplyadmin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo $assets; ?>samplyadmin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Dark Mode Css-->
    <link href="<?php echo $assets; ?>samplyadmin/css/dark-layout.min.css" id="app-style" rel="stylesheet" type="text/css" />

  </head>

  <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <div class="account-pages my-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="text-center mt-4 mb-3">
              <a href="<?php echo url('/') ?>" class="auth-logo">
                <img src="<?php echo $assets; ?>samplyadmin/images/logo.png" alt="Logo" height="50" class="auth-logo-dark">
              </a>
              <p class="font-size-15 text-muted mt-5">SKRIPSI<br/> Rochmad Widianto - 185410014<br/><b>Implementasi Arsitektur Microservice & GraphQL API Gateway</b></p>
            </div>
            <div class="card overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="p-lg-5 p-4">

                    <div>
                      <h5>Selamat Datang!</h5>
                      <p class="text-muted">Masukkan username dan password</p>
                    </div>
                                    
                    <div class="mt-4 pt-3">
                      <form class="form" action="<?php echo url('/login/check') ?>" method="post" autocomplete="off" >

                        <?php if(isset($message)): ?>
                        <div class="mb-3">
                          <div class="alert alert-<?php echo $message_type ?> alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-account-alert-outline me-2"></i>
                            <?php echo $message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($this->session->flashdata('message'))): ?>
                        <div class="mb-3">
                          <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                            <p><?php echo $this->session->flashdata('message') ?></p>
                          </div>
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                          <label for="username" class="fw-semibold">Username</label>
                          <input type="text" class="form-control" placeholder="Username" value="<?php echo post('username') ?>" name="username" autofocus />
                          <?php echo form_error('username', '<div class="error" style="color: red;">', '</div>'); ?>
                        </div>
                        
                        <div class="mb-3 mb-4">
                          <label for="userpassword" class="fw-semibold">Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password">
                          <?php echo form_error('password', '<div class="error" style="color: red;">', '</div>'); ?>
                        </div>
    
                        <div class="row align-items-center">
                          <div class="col-6">
                            &nbsp;
                          </div>  
                          <div class="col-6">
                            <div class="text-end">
                              <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Masuk</button>
                            </div>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                    
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="p-lg-5 p-4 bg-auth h-100 d-none d-lg-block">
                    <div class="bg-overlay"></div>
                  </div>
                </div>
                                
              </div>
            </div>
            <!-- end card -->
            <div class="mt-5 text-center">
              <p>
                <small>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <b>Skripsi</b> Implementasi Microservice & GraphQL - [185410014] Rochmad Widianto - STMIK Akakom</small>
              </p>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end account page -->
        
    <!-- JAVASCRIPT -->
    <script src="<?php echo $assets; ?>samplyadmin/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo $assets; ?>samplyadmin/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/dashboard.init.js"></script>

    <script src="<?php echo $assets; ?>samplyadmin/libs/select2/js/select2.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="<?php echo $assets; ?>samplyadmin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!--Quill js-->
    <script src="<?php echo $assets; ?>samplyadmin/libs/quill/quill.min.js"></script>

    <!--Flatpickr js-->
    <script src="<?php echo $assets; ?>samplyadmin/libs/flatpickr/flatpickr.min.js"></script>

    <!-- jquery step -->
    <script src="<?php echo $assets; ?>samplyadmin/libs/jquery-steps/build/jquery.steps.min.js"></script>

    <!-- init js -->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/form-editor.init.js"></script>

    <!-- form advanced init -->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/form-advanced.init.js"></script>

    <!-- form wizard init -->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/form-wizard.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?php echo $assets; ?>samplyadmin/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/sweet-alerts.init.js"></script>
        
    <!-- App js -->
    <script src="<?php echo $assets; ?>samplyadmin/js/pages/notification.init.js"></script>

    <!-- App js -->
    <script src="<?php echo $assets; ?>samplyadmin/js/app.js"></script>

  </body>
</html>

<?php include viewPath('account/notifications'); ?>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
</body>
</html>