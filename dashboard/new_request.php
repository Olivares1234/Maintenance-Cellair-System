<?Php
session_start();
include('controllerClass.php');
$data = new controllerClass();
$all = $data->retrieveRequestToday();
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
  <title>Maintenance-Systems - Pending Request</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> disregard -->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"> <!-- important -->
  <link href="assets/css/tooptip_style.css" rel="stylesheet">
  <link href="assets/css/container-title-page.css" rel="stylesheet">
  <link href="assets/css/datatable-pagination-style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/loader-animate.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/loader_animate.css">
  <link rel="stylesheet" href="assets/css/date-range-style.css">
  <style>
    .datepicker{
      position:center;
      width: 400px;
    }
  </style>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sticky-top h-100 navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="assets/img/logo/repair.png">
        </div>
          <div class="sidebar-brand-text mx-3">MAINTENANCE SYSTEM</div>
      </a>
      <hr class="sidebar-divider my-0">

      <?php if($_SESSION['role'] != 'user'){?>
      <li class="nav-item">
       <a class="nav-link" href="home.php">
        <i class="fa fa-home" aria-hidden="true"></i>
          <span>Dashboard</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'admin'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="formRequest.php">
        <i class="fas fa-file-invoice"></i>
          <span>Form Request</span></a>
      </li>
      <?php } ?>
     
      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="doneRequest.php">
          <i class="fas fa-clipboard-check"></i>
          <span>Done Request</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="pendingRequest.php">
          <i class="fas fa-comments"></i>
          <span>Pending Request</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="new_request.php">
          <i class="fas fa-users"></i>
          <span>New Request Today</span></a>
      </li>
      <?php } ?>

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
          <ul class="navbar-nav ml-auto">
             <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="assets/img/boy.png" style="max-width: 60px">
                <span class="d-lg-inline text-white small">&nbsp;&nbsp;<?php echo $_SESSION["username"];?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a> -->
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
        <?php if($_SESSION['role'] != 'admin'){?>
            <center><h1 style="position: relative; top: 230px; bottom:0px;">404 PAGE NOT FOUND</h1></center>
            <?php } ?>
            <?php if($_SESSION['role'] != 'user'){?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">DataTables</h1> -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <!-- <li class="breadcrumb-item">Tables</li> -->
              <li class="breadcrumb-item active" aria-current="page">New Request</li>
              <!-- <h1 tooltip="Slide to the left" flow="left">Left</h1> -->
            </h3>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables Remove -->
         
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> -->
                  <!-- <div class="col-sm-2"><label for="DateRange Search:"></label></div> -->
                  <div class="form-group row"> 
                    <div class="col-sm-10"> <h5>Search Date Range:</h5></div>
                     <div class="col-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="min" name="min" placeholder="Start Date" >
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                      <div></div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="max" name="max" placeholder="End Date" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <button onClick="window.location.reload();" class="btn btn-outline-info btn-md-5"><i class="fas fa-sync"></i> Refresh</button>&nbsp;
                            <!-- <button id="reset" class="btn btn-outline-warning btn-md-5">Reset</button> -->
                        </div>
                    </div>
                    </div>
             
                </div>
                <hr>
                <div class="loader">
                   <div><img src="assets/img/loader/box-unscreen.gif"  alt=""></div>
                </div>
                <div class="table-responsive p-3">
                  <table style="cellspacing:0; width:100%;" id="tableId" class="table align-items-center table-flush table-hover display responsive nowrap" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>RsID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Date Request</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                          --th
                      </tr>
                    </tfoot> -->
                   
                    <tbody>
                    <?php foreach($all as $key => $val) {?>
                      <tr>
                        <td><?php echo 'RS'.$val['id']?></td>
                        <td><?php echo $val['name'];?></td>
                        <td><?php echo $val['company'];?></td>
                        <td><?php echo $val['department'];?></td>
                        <td><?php echo $val['date_request'];?></td>
                        <td style="white-space: normal !important;"><?php echo $val['remarks'];?></td>
                        <td><span class="badge badge-danger"><?php echo $val['status'];?></span></td>
                        <td><a class="btn-outline" tooltip="Edit" flow="up" data-toggle="modal" href="#"  data-target="#update_modal<?php echo $val['id']?>"><i class="fas fa-pen-square fa-2x"></i></a></td>
                      </tr>
                    <?php include 'modalPends.php'; include 'updateStatus.php';  } ?> 
                    </tbody> 
                  </table>
                </div>
              
              </div>
              <?Php include("private/msg_popup.php"); }?>
            </div> 
          </div>
          
          <!--Row-->

          

          <!-- Documentation Link Remove-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
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
                  <a href="logout.php" class="btn btn-primary">Logout</a>
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
          <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> MS - v O.1</span>
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
    <!-- script important 4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script> 


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Page level plugins -->
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>-->
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> 

    <script src="assets/js/loader.js"></script>
    <script src="assets/js/date-range.js"></script>

    

</body>
</html>
