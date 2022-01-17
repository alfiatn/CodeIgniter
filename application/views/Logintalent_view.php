
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
  
</head>

<body class="offline-doc">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
    <div class="container">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#pablo">TSM entertainment.</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image: url('<?php echo base_url() ?>asset-talent/img/header.jpg');"></div>
    <div class="container text-center">
    <div class="row">
    <div class="col-md-4 ml-auto mr-auto">
    <!-- <div class="card border mb-5" style="max-width: 50rem;"> -->
    <!-- <div class="border border-light rounded"> -->
      <!-- <br> -->
    <div class="brand">

       <h3 class="panel-title">Please Sign In</h3>

       <div class="panel-body">
          <?php
              $notif = $this->session->flashdata('notif');
               if(!empty($notif)){
            echo '<div class="alert alert-danger">'.$notif.'</div>';
       }
        ?>
          <form role="form" action="<?php echo base_url();?>index.php/login_talent/act_login" method="post">
              <fieldset>
                <div class="form-group">
                     <input class="form-control" placeholder="Username" name="username" type="text">
                </div>
                <div class="form-group">
                     <input class="form-control" placeholder="Password" name="password" type="password">
                </div>
                
               <h4><input type="submit" name="submit" value="Login" class="btn btn-primary btn-round btn-block"></h4>
               <!-- btn-lg = untuk membuat buttonnya terlihat besar dan kembali semula -->
               <!-- btn-round btn-block = untuk submit -->
               
               <!-- class ="text-left" -->
               <div class="position-static"> 
                <h6><a href="#tambah" class="text-decoration-none" data-toggle="modal">Tambah User</a></h6>
                </div>

              </fieldset>
          </form>
           </div>
          <br/>
         <br/>
       </div>
      </div>
    </div>
  </div>
  <!-- </div> -->

  <!-- MODAL TAMBAH --> 
    <div class="modal fade" id="tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="card-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="text-dark" id="myModalLabel">Tambah User</h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url() ?>index.php/User_talent/add_user" method="post">

              <label class="text-dark">Nama User</label>
              <input type="text" name="nama_user" class="form-control" placeholder="Nama User"><br>
              <label class="text-dark">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username"><br>
              <label class="text-dark">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password"><br>
              <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            </form>
          </div>
      </table>
      <?php
        $pesan = $this->session->flashdata('pesan');
        if(!empty($pesan)) {
            echo '<div class="alert alert-primary">'.$pesan.'</div>';
        }
       ?>
    </div>
  </div>
  </div>


  <footer class="footer">
    <div class="container">
      <div class="copyright" id="copyright">
        &copy;
        <script>
          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by
        <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
      </div>
    </div>
  </footer>
  
</body>

</html>
