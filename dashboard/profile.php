<?php

include 'conn.php';

session_start();
require_once('functions.php');

$user_id = $_SESSION['id'];

if (!isset($user_id)) {
  header('location:../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Gab">
  <link href="assets/img/logo/repair.png" rel="icon">
  <title>Maintenance-Systems - Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!--<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/css/tooptip_style.css" rel="stylesheet">
  <link href="assets/css/container-title-page.css" rel="stylesheet">
  <link href="assets/css/datatable-pagination-style.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/loader-animate.css">
  <!-- Bootstrap DatePicker -->
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href="assets/css/profile.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sticky-top h-100 navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-icon">
          <img src="assets/img/logo/repair.png">
        </div>
        <div class="sidebar-brand-text mx-3">MAINTENANCE SYSTEM</div>
      </a>
      <hr class="sidebar-divider my-0">

      <?php if ($_SESSION['role'] != 'user') { ?>
        <li class="nav-item active">
          <a class="nav-link" href="home">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] != 'admin') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="formRequest">
            <i class="fas fa-file-invoice"></i>
            <span>Form Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] != 'user') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="doneRequest">
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Done Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] != 'user') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="pendingRequest">
            <i class="fas fa-comments"></i>
            <span>Pending Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] != 'user') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="newRequest">
            <i class="fas fa-users"></i>
            <span>New Request Today</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] === 'user') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="userDoneRequest.php">
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Done Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] === 'user') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="userPendingRequest.php">
            <i class="fas fa-comments"></i>
            <span>Pending Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="logs">
          <i class="fa-solid fa-clipboard-user"></i>
          <span>Logs</span></a>
      </li>



      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin1">MS - v O.1</div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->

        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-1 position-fixed" style="width:100%; padding-right:15%">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- dropdown message remove -->

          <!-- Start Topbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="topbar-divider d-none d-sm-block"></div>
                <img class="img-profile rounded-circle" src="uploaded_img\<?= $_SESSION['image']; ?>" style="max-width: 60px">
                <span class="d-lg-inline text-white small">&nbsp;&nbsp;<?php echo $_SESSION["username"]; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <br>
        <br>
        <br>
        <!-- header end -->

        <!-- Navbar Start -->

        <!-- End Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </div>


          <div class="row">
            <div class="col-lg-11">
              <!-- Form Basic -->
              <div class="card mb-1">
                <div class="card-header">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6> -->
                </div>
                <div class="card-body">
                  <div class="loader">
                    <div><img src="assets/img/loader/box-unscreen.gif" alt=""></div>
                  </div>
                  <form action="private" method="POST" autocomplete="off">
                    <div class="form-group">
                      <?php
                      $select_profile = $con->prepare("SELECT * FROM `tbl_users` WHERE id = ?");
                      $select_profile->execute([$user_id]);
                      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                      ?>

                      <div class="profile">
                        <center>
                          <img class="imgs" src="uploaded_img\<?= $_SESSION['image']; ?>" alt="">
                          <h3><?= $fetch_profile['username']; ?></h3>
                        </center>
                        <a href="updateProfile" class="btn1">update profile</a>
                        <a href="logout.php" class="delete-btn" data-toggle="modal" data-target="#logoutModal">logout</a>
                        <!-- <div class="flex-btn">
                            <a href="login.php" class="option-btn">login</a>
                            <a href="register.php" class="option-btn">register</a>
                        </div> -->
                      </div>


                  </form>
                </div>
              </div>





              <!-- Modal Logout -->
              <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                      <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                      <a href="logout" class="btn btn-primary">Logout</a>
                    </div>
                  </div>
                </div>
              </div>




              <!-- End Navbar -->


              <!-- Footer Start -->
            </div>
            <footer class="sticky-footer1 bg-white" style="top:250px">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; <script>
                      document.write(new Date().getFullYear());
                    </script> MS - v O.1</span>
                </div>
              </div>
            </footer>




            <!-- Scroll to top -->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>
            <script src="assets/js/jquery-3.6.0.js"></script>
            <script src="assets/js/toastr.min.js"></script>
            <script src="assets/js/toastr-options.js"></script>

            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Select2 -->
            <script src="assets/vendor/select2/dist/js/select2.min.js"></script>
            <!-- Bootstrap Datepicker -->
            <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
            <!-- Bootstrap Touchspin -->
            <script src="assets/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
            <!-- ClockPicker -->
            <script src="assets/vendor/clock-picker/clockpicker.js"></script>
            <!-- RuangAdmin Javascript -->
            <script src="assets/js/ruang-admin.min.js"></script>
            <!-- Javascript for this page -->
            <script src="assets/js/picker_date_format.js"></script>

            <!-- Page level plugins -->
            <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
            <!-- <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

            <script>
              //loader animation page
              $(window).on("load", function() {
                $(".loader").fadeOut(1000);
                $(".table-responsive").fadeIn(1000);
                $('#dataTableHover').DataTable();
              });
            </script>
</body>

</html>
<!-- End Footer -->