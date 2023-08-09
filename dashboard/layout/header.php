<!-- header -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Gab">
  <link href="assets/img/logo/repair.png" rel="icon">
  <title>Maintenance-Systems - Dashboard</title>
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
  <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
  <script src="./fullcalendar/lib/main.min.js"></script>
  <style>
    .lblname {
      font-weight: 600;
    }

    #nav-fixed {
      position: fixed;
      width: auto;
    }

    .link:hover {
      text-decoration: none;
    }

    .rightbtn {
      float: right;
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
        <li class="nav-item active">
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
            <i class="fas fa-clipboard-check"></i>
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

            <!-- search message remove -->

            <!-- dropdown message remove -->

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
        <br>
        <br>
        <br>
        <!-- header end -->