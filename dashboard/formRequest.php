<?Php
require_once("private/requestProcess.php");
if (isset($_SESSION["username"])) {
  $_SESSION["username"];
} else {
  header("Location:../index");
  die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/repair.png" rel="icon">
  <title>Maintenance-Systems - Form Request</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!--<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- Bootstrap Touchspin -->
  <link href="assets/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
  <!-- ClockPicker -->
  <link href="assets/vendor/clock-picker/clockpicker.css" rel="stylesheet">
  <!-- RuangAdmin CSS -->
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/css/tooptip_style.css" rel="stylesheet">
  <link href="assets/css/container-title-page.css" rel="stylesheet">
  <link href="assets/css/datatable-pagination-style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
  <link rel="stylesheet" href="assets/css/loader-animate.css">


  <style>
    .lblname {
      font-weight: 600;
    }

    .rightbtn {
      float: right;
    }

    .breadcrumb .breadcrumb-item {

      font-weight: 600px;
      font-size: 18px;

    }

    input[type="date"]::-webkit-calendar-picker-indicator {
      background: transparent;
      bottom: 0;
      color: transparent;
      cursor: pointer;
      height: auto;
      left: 0;
      position: absolute;
      right: 0;
      top: 0;
      width: auto;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sticky-top h-100 navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="assets/img/logo/repair.png">
        </div>
        <div class="sidebar-brand-text mx-3">MAINTENANCE SYSTEM</div>
      </a>
      <?php if ($_SESSION['role'] === 'user') { ?>
        <!-- <div class="mb-2"></div> -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="formRequest.php">
            <i class="fas fa-file-invoice"></i>
            <span>Form Request</span></a>
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
      <li class="nav-item">
        <a class="nav-link" href="logs.php">
          <i class="fa-solid fa-clipboard-user"></i>
          <span>Logs</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin">MS - v O.1</div>
    </ul>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 position-fixed" style="width:100%; padding-right:15%">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <!-- Start Topbar -->
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
        <?php if ($_SESSION['role'] != 'user') { ?>
          <center>
            <h1 style="position: relative; top: 230px; bottom:0px;">404 PAGE NOT FOUND</h1>
          </center>
        <?php } ?>
        <?php if ($_SESSION['role'] != 'admin') { ?>
          <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <!-- <h1 class="h3 mb-0 text-gray-800">DataTables</h1> -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item">Tables</li> -->
                <li class="breadcrumb-item active" aria-current="page">Form Request</li>
                <!-- <h1 tooltip="Slide to the left" flow="left">Left</h1> -->
                </h3>
              </ol>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6> -->
                  </div>
                  <div class="card-body">
                    <div class="loader">
                      <div><img src="assets/img/loader/box-unscreen.gif" alt=""></div>
                    </div>
                    <div class="alert alert-light alert-dismissible fade show" role="alert">
                      <h3>Welcome&nbsp;to&nbsp;the&nbsp;EMC&nbsp;Maintenance&nbsp;System&nbsp;Form&nbsp;Request!</h1><br>
                        <p style="font-size: 1.2rem; text-align: justify;"> This is form request EMMC Maintenance.
                          All fields are
                          required,
                          but the image or file upload is optional. If you get stuck while the form is loading,
                          click the reset button and try again.<br></p>
                        <h4>Instructions:</h4>
                        <p style="font-size: 1.2rem; text-align: justify;">
                          1. Fill out all of the required fields. <br>
                          2. If you have any images that you would like to include, you can upload them
                          here. <br>
                          3. Click the "Submit" button to send your request.
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true" style="color: red;">&times;</span>
                        </button>
                    </div>
                    <form action="private/requestProcess.php" method="POST" autocomplete="off" enctype="multipart/form-data" id="myForm">
                      <div class="form-group">
                        <label for="exampleFormControlInput1" class="lblname">REQUESTED BY:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="NAME...." required onkeydown="disableEnter(event)">
                        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>" readonly hidden>
                      </div>

                      <div class="form-group" hidden>
                        <label for="exampleFormControlInput1" class="lblname">EMAIL:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" id="exampleFormControlInput1" placeholder="EMAIL...." required>
                        <!--value = <php echo $_SESSION['email']; ?>-->
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1" class="lblname">COMPANY:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <select class="form-control" name="company" id="exampleFormControlSelect1">
                          <option value="exelpack">EXELPACK</option>
                          <option value="cellair">CELLAIR</option>
                          <option value="minamoto">MINAMOTO</option>
                          <option value="minamoto enterprises">MINAMOTO ENTERPRISES</option>
                        </select>
                      </div>
                      <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Department:</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div> -->
                      <div class="form-group">
                        <label for="exampleFormControlSelect1" class="lblname">DEPARTMENT:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <select class="form-control" name="department" id="exampleFormControlSelect1">
                          <option value="admin">ADMIN</option>
                          <option value="acctg">ACCTG</option>
                          <option value="cs">CS</option>
                          <option value="engg">ENGG</option>
                          <option value="hr">HR</option>
                          <option value="IT">IT</option>
                          <option value="manager">MANAGER</option>
                          <option value="operation">OPERATION</option>
                          <option value="purchasing">PURCHASING</option>
                          <option value="sales">SALES</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1" class="lblname">REQUEST FOR:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <select class="form-control" name="requestfor" id="dropdown" onchange="toggleInputField()" required>
                          <option value="">SELECT REQUEST...</option>
                          <option value="machine / equipment">MACHINE / EQUIPMENT</option>
                          <option value="vehicle">VEHICLE</option>
                          <option value="facility">FACILITY</option>
                          <option value="others">OTHERS</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <div id="othersInput" style="display: none;">
                          <label for="otherValue" class="lblname">PLEASE SPECIFY:</label>
                          <span style="color: red; font-size:larger;">*</span>
                          <input class="form-control" type="text" id="otherValue" name="otherValue" required onkeydown="disableEnter(event)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="simpleDataInput" class="lblname">DATE REQUESTED:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <div class="input-group date">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          <input type="date" name="daterequested" class="form-control" value="MM/DD/YYYY" required>
                        </div>
                      </div>

                      <!-- <div class="form-group" id="simple-date1">
                     <label for="simpleDataInput" class="lblname">DATE REQUESTED:</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" class="form-control" value="MM/DD/YYYY" name="daterequested" id="simpleDataInput">
                      </div>
                  </div> -->
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="lblname">UPLOAD IMAGE/FILE:</label>
                        <input type="file" name="file" class="form-control" onChange="img_pathUrl(this);">
                        <p class="text" style="color:red;">Optional Image Upload.</p>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="lblname">REQUEST DESCRIPTION:</label>
                        <span style="color: red; font-size:larger;">*</span>
                        <textarea class="form-control" name="remarks" id="exampleFormControlTextarea1" rows="5" placeholder="COMMENTS...." required></textarea>
                      </div>
                      <div class="rightbtn1">
                        <center><button onClick="window.location.reload();" class="btn btn-outline-primary" data-dismiss="modal">Reset</button>&nbsp;
                          <button type="submit" id="submitBtn" name="btnsubmit" class="btn btn-primary">Submit</button>
                        </center>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                <?php } ?>

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
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>

                </div>
                <!---Container Fluid-->
              </div>
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

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        // $('#myForm').submit(function(event) {
        //   event.preventDefault();

        //   var submitBtn = $('#submitBtn');

        //   var isValid = true;



        //   if (isValid) {
        //     submitBtn.attr('disabled', 'disabled');
        //     submitBtn.html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...');

        //     setTimeout(function() {
        //       $('#myForm').unbind('submit').submit();
        //     }, 2000); // Simulate a 2-second delay before submitting
        //   }
        // });

        $('#submitBtn').click(function() {
          // $(this).attr('disabled','disabled');
          $(this).html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...'); // change text
          setTimeout(function() {
            $('#submitBtn').attr('disabled', 'disabled');
          }, 10); // enable after 2 seconds
        });
      </script>
      </script>

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

      <script>
        <?php include("private/msg_popup.php"); ?>
        //loader animation page
        $(window).on("load", function() {
          $(".loader").fadeOut(1000);
          $(".table-responsive").fadeIn(1000);
          $('#dataTableHover').DataTable();
        });
      </script>

      <script>
        function toggleInputField() {
          const dropdown = document.getElementById('dropdown');
          const othersInput = document.getElementById('othersInput');
          const otherValueInput = document.getElementById('otherValue');

          if (dropdown.value === 'others') {
            othersInput.style.display = 'block';
            otherValueInput.required = true; // Optional: make the input required
          } else {
            othersInput.style.display = 'none';
            otherValueInput.required = false; // Optional: make the input not required
          }
        }

        function disableEnter(event) {
          if (event.key === "Enter" || event.keyCode === 13) {
            event.preventDefault();
            return false;
          }
        }
      </script>


</body>

</html>