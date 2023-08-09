    <!-- Content Start   -->
    <!-- Area Chart Remove -->

    <!-- Invoice Example -->
    <!-- Container Fluid-->
    <?php if ($_SESSION['role'] != 'admin') { ?>
      <?php if ($_SESSION['role'] != 'user') { ?>
        <center>
          <h1 style="position: relative; top: 230px; bottom:0px;">404 PAGE NOT FOUND</h1>
        </center>
      <?php } ?>
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
                    <p style="font-size: 1.2rem; text-align: justify;"> This is form request EMC Maintenance.
                      All fields are
                      required,
                      but the image upload is optional. If you get stuck while the form is loading,
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
                <form action="private/requestProcess.php" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                      <option value="minamoto">MINAMOTO</option>
                      <option value="cellair">CELLAIR</option>
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

                  <div class="form-group lblname">
                    <label for="dropdown">REQUEST FOR:</label>
                    <span style="color: red; font-size:larger;">*</span>
                    <select class="form-control" name="requestfor" id="dropdown" onchange="toggleInputField()">
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
                    <a href="logout" class="btn btn-primary">Logout</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!---Container Fluid-->
          </div>
        </div>

        <!-- End Content -->