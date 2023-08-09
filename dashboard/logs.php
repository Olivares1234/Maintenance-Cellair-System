<?Php
session_start();
if (isset($_SESSION["username"])) {
  $_SESSION["username"];
} else {
  header("Location:../index");
  die();
}
include('controllerClass.php');
$data = new logsController();
$all = $data->RetrieveAllLogs($_SESSION['username']); // Pass the session username to the method
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
  <title>Maintenance-Systems - Done Request</title>
  <!--<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> disregard -->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <!-- important -->
  <link href="assets/css/tooptip_style.css" rel="stylesheet">
  <link href="assets/css/container-title-page.css" rel="stylesheet">
  <link href="assets/css/datatable-pagination-style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/loader-animate.css">
  <link rel="stylesheet" href="assets/css/table-mobile-responsive.css">
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
      <?php if ($_SESSION['role'] === 'admin') { ?>
        <li class="nav-item">
          <a class="nav-link" href="home">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span></a>
        </li>
      <?php } ?>

      <?php if ($_SESSION['role'] === 'user') { ?>
        <div class="mb-2"></div>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="formRequest">
            <i class="fas fa-file-invoice"></i>
            <span>Form Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] === 'admin') { ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="doneRequest">
            <i class="fas fa-clipboard-check"></i>
            <span>Done Request</span></a>
        </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if ($_SESSION['role'] === 'admin') { ?>
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
        <li class="nav-item">
          <a class="nav-link" href="userDoneRequest.php">
            <i class="fas fa-comments"></i>
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
      <li class="nav-item active">
        <a class="nav-link" href="logs">
          <i class="fa-solid fa-clipboard-user"></i>
          <span>Logs</span></a>
      </li>


      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin">MS - v O.1</div>
    </ul>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Start Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 position-fixed" style="width:100%; padding-right:15%">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
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
        <!-- End Topbar -->
        <br>
        <br>
        <br>
        <br>

        <!-- Container Fluid-->
        <?php if ($_SESSION['role'] != 'admin') { ?>
          <center>
            <!-- <h1 style="position: relative; top: 230px; bottom:0px;">404 PAGE NOT FOUND</h1> -->
          </center>
        <?php } ?>
        <?php if ($_SESSION['role'] != '') { ?>
          <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <!-- <h1 class="h3 mb-0 text-gray-800">DataTables</h1> -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <!-- <li class="breadcrumb-item">Tables</li> -->
                <li class="breadcrumb-item active" aria-current="page">Logs</li>
                <!-- <h1 tooltip="Slide to the left" flow="left">Left</h1> -->
                </h3>
              </ol>
            </div>

            <!-- Row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!-- Header content here -->
                  </div>
                  <div class="loader">
                    <div><img src="assets/img/loader/box-unscreen.gif" alt=""></div>
                  </div>
                  <div class="dt-responsive p-12" style="width: 100%; overflow-x: auto;">
                    <table style="cellspacing:0; width:100%; white-space: normal !important;" class="table align-items-center table-flush table-hover dt-responsive nowrap" id="example">
                      <thead class="thead-light">
                        <tr>
                          <th hidden>ID</th>
                          <th style="text-align: center;">UserName</th>
                          <th style="text-align: center;">Action</th>
                          <th style="text-align: center;">Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Function to convert UTC time to local time in the Philippines
                        function convertToPhilippineTime($utcDateTime)
                        {
                          $dateTime = new DateTime($utcDateTime, new DateTimeZone('UTC'));

                          return $dateTime->format('m-d-Y / h:i:s A');
                        }
                        ?>
                        <?php foreach ($all as $key => $val) { ?>
                          <tr>
                            <td hidden><?php echo $val['id']; ?></td>
                            <td style="text-align: center;"><?php echo $val['username']; ?></td>
                            <td style="text-align: justify; white-space: normal !important;"><?php echo $val['action']; ?>
                            </td>
                            <td style="text-align: center;"><?php echo convertToPhilippineTime($val['date']); ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              <?Php } ?>
              </div>
            </div>

            <!--Row-->

            <!-- Documentation Link Remove-->

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


          </div>
          <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer1 bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script> MS - v O.1</span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="assets/js/jquery-3.6.0.js"></script>
  <script src="assets/js/toastr.min.js"></script>
  <script src="assets/js/toastr-options.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Datepicker -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Momentjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
  <script src="assets/js/date-range.js"></script>
  <script src="assets/js/loader.js"></script>
  <script src="">
    <?php include("config/msg_popup.php"); ?>
  </script>
  <script>
    $(document).ready(function() {
      if ($.fn.DataTable.isDataTable('#example')) {
        $('#example').DataTable().destroy();
      }

      $('#example').DataTable({
        "order": [
          [0, "desc"]
        ]
      });
    });

    $('#sub_pends').click(function() {
      // $(this).attr('disabled','disabled');
      $(this).html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...'); // change text
      setTimeout(function() {
        $('#sub_pends').attr('disabled', 'disabled');
      }, 10); // enable after 2 seconds
    });

    function img_pathUrl(input) {
      $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

    function openImage(src) {
      window.open(src);
    }

    $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>



</body>

</html>