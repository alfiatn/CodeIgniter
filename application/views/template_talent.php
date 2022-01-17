<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>asset-talent/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>asset-talent/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      TSM ent.
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo base_url() ?>asset-talent/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>asset-talent/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url() ?>asset-talent/demo/demo.css" rel="stylesheet" />

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>asset-talent/js/core/jquery.min.js"></script>
       <script src="<?php echo base_url() ?>asset-talent/js/core/popper.min.js"></script>
      <script src="<?php echo base_url() ?>asset-talent/js/core/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>asset-talent/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!--  Google Maps Plugin    -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chart JS -->
      <script src="<?php echo base_url() ?>asset-talent/js/plugins/chartjs.min.js"></script>
      <!--  Notifications Plugin    -->
      <script src="<?php echo base_url() ?>asset-talent/js/plugins/bootstrap-notify.js"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="<?php echo base_url() ?>asset-talent/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
      <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
      <script src="<?php echo base_url() ?>asset-talent/demo/demo.js"></script>
    <script>
          $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

          });
    </script>
  </head>

  <body class="">
    <div class="wrapper">
      <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            TSM
          </a>
          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            entertainment.
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="<?php echo base_url() ?>index.php/home_talent">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>index.php/Jenis_talent/index">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Data Jenis Talent</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>index.php/Talent/index">
                <i class="now-ui-icons design_palette"></i>
                <p>Data Talent</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url() ?>index.php/Transaksi/index">
                <i class="now-ui-icons shopping_cart-simple"></i>
                <p>Data Transaksi</p>
              </a>
            </li>
            <li>
            <a href="<?php echo base_url() ?>index.php/transaksi/riwayat">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Data Riwayat Talent</p>
            </a>
          </li>
            <li>
              <a href="<?php echo base_url() ?>index.php/User_talent/index">
                <i class="now-ui-icons users_single-02"></i>
                <p>Data User</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home_talent">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="now-ui-icons media-2_sound-wave"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Stats</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/login_talent/logout">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <?php $this->load->view($content_view); ?>
        <!-- End of content -->

         
  </body>
</html>
