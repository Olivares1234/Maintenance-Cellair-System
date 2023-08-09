<!-- Navbar Start -->

        <!-- End Topbar -->
        <?php if($_SESSION['role'] != 'user'){?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

        

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="loader">
              <center><div><img src="assets/img/loader/box-unscreen.gif" alt=""></div></center>
              </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <a href="doneRequest.php" class="link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Done Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalDones; ?></div>
                      <!-- <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since last month</span>
                      </div> -->
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x "></i> -->
                      <i class="fas fa-clipboard-check fa-2x" style="color:#32618e;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Annual) SAles Card Example Remove -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="pendingRequest.php" class="link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpends; ?></div>
                      <!-- <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x" style="color:#32618e;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
          

            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="newRequest.php" class="link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">New Request Today</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalreqTodays; ?></div>
                      <!-- <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x" style="color:#32618e;"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
         
          <?Php } ?>

            <!-- End Navbar -->