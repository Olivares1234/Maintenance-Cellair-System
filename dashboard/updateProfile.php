<?php

include 'conn.php';

session_start();
require_once('functions.php');

if(isset($_SESSION["username"])){
	$_SESSION["username"];
}
else{
	header("Location:../index");
	die();
}

$admin_id = $_SESSION['id'];


if(isset($_POST['update'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $datetimestamp = date('Y-m-d-H-i-s-a', $_POST['dateadded']);
   $update_profile = $con->prepare("UPDATE `tbl_users` SET username = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $admin_id]);

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/'.$image;

   if(!empty($image)){

      if($image_size > 2000000){
         flash("msg4","Image Size Is Too Large!");
      
         
      }else{
         $update_image = $con->prepare("UPDATE `tbl_users` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $admin_id]);

         if($update_image){
            // move_uploaded_file($image_tmp_name, $image_folder);
            // link('uploaded_img/'.$old_image);
            move_uploaded_file($_FILES['image']['tmp_name'], "uploaded_img/$image");
            flash("msg3","Image Has Been Updated!");
        
         }
      }

   }

   $old_pass = $_POST['old_pass'];
   $previous_pass = md5($_POST['previous_pass']);
   $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($previous_pass != $old_pass){
  
         // flash("msg4","Old password not matched!");
  
      }elseif($new_pass != $confirm_pass){
   
         flash("msg4","Check Old password & Confirm Password Not Matched!");
       
      }else{
         $update_password = $con->prepare("UPDATE `tbl_users` SET password = ? WHERE id = ?");
         $update_password->execute([$confirm_pass, $admin_id]);

         flash("msg3","Password Has Been Updated!");
      
      }
   }

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
  <title>Maintenance-Systems - Dashboard</title>

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/css/tooptip_style.css" rel="stylesheet">
  <link href="assets/css/container-title-page.css" rel="stylesheet">
  <link href="assets/css/datatable-pagination-style.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/loader-animate.css">
    <!-- Bootstrap DatePicker -->  
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
  <link rel="stylesheet" href="css/style.css">
  <link href="assets/css/profile-update.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
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

      <?php if($_SESSION['role'] != 'user'){?>
      <li class="nav-item active">
        <a class="nav-link" href="home">
        <i class="fa fa-home" aria-hidden="true"></i>
          <span>Dashboard</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'admin'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="formRequest">
        <i class="fas fa-file-invoice"></i>
          <span>Form Request</span></a>
      </li>
      <?php } ?>
     
      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="doneRequest">
          <i class="fas fa-clipboard-check"></i>
          <span>Done Request</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="pendingRequest">
          <i class="fas fa-comments"></i>
          <span>Pending Request</span></a>
      </li>
      <?php } ?>

      <div class="mb-2"></div>
      <?php if($_SESSION['role'] != 'user'){?>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="newRequest">
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

            <!-- search message remove -->

            <!-- dropdown message remove -->

             <!-- Start Topbar -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="uploaded_img\<?= $_SESSION['image']; ?>" style="max-width: 60px">
                <span class="d-lg-inline text-white small">&nbsp;&nbsp;<?php echo $_SESSION["username"];?></span>
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
              <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
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
                <center>
                <div class="loader">
                <div><img src="assets/img/loader/box-unscreen.gif" alt=""></div>
                </div>
                </center>
                <?php
                     $select_profile = $con->prepare("SELECT * FROM `tbl_users` WHERE id = ?");
                     $select_profile->execute([$admin_id]);
                     $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                  ?>
            <section class="update-profile-container">
                <form action="updateProfile.php" method="post" enctype="multipart/form-data">
                     <img class='imgs' src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
                     <div class="flex">
                        <div class="inputBox">
                           <input type="hidden" name="dateadded" value="<?php echo time(); ?>">
                           <span>username : </span>
                           <input type="text" name="name" required class="form-control" placeholder="enter your name" value="<?= $fetch_profile['username']; ?>">
                           <span>email : </span>
                           <input type="email" name="email" required class="form-control" placeholder="enter your email" value="<?= $fetch_profile['email']; ?>">
                           <span>profile pic : </span>
                           <input type="hidden" name="old_image" class="form-control" value="<?= $fetch_profile['image']; ?>">
                           <input type="file" name="image" class="form-control" accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="inputBox">
                           <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
                           <span>old password :</span>
                           <input type="password" name="previous_pass" class="form-control" placeholder="enter previous password">
                           <span>new password :</span>
                           <input type="password" name="new_pass" class="form-control"  placeholder="enter new password">
                           <span>confirm password :</span>
                           <input type="text" name="confirm_pass" class="form-control" placeholder="confirm new password">
                        </div>
                     </div>
                     <div class="flex-btn">
                        <input type="submit" value="update profile" name="update" class="option-btn">
                        <a href="profile" class="option-btn">go back</a>
                     </div>
                  </form>
      </section>

                </div>
              </div>


        

        
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
                  <a href="logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
     
         
 

            <!-- End Navbar -->


              <!-- Footer Start -->
              <!--</div> -->
  <footer class="sticky-footer1 bg-white" style="top:250px">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> MS - v O.1</span>
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

    <!-- script important 4 -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
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


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->

    </script>
    <!-- Font Awesome -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> -->
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
<!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script> -->
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script src="assets/js/loader.js"></script>
    <script><?php include("msg_popup.php"); ?></script>
    <script src="assets/js/date-range.js"></script>
</body>
</html>
<!-- End Footer -->
