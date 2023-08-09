<link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
<link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">

<div class="modal fade mds" id="update_modal<?php echo $val['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout"><i class="fas fa-pen-square fa-1x btn-info"></i>&nbsp;<b>Edit Status</b></h5>
        <button type="button" class="btn-danger fa-1x" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="container">
        <form method="POST" action="">
          <div class="form-group row">
            <div class="col-6">
              <label><b>MR#:</b></label>
              <!-- <input type="text" name="id" value="<?php echo $val['id'] ?>" class="form-control" hidden/> -->
              <input type="text" name="id" value="<?php echo $val['id'] ?>" class="form-control" readonly />
            </div>
            <div class="col-6">
              <label><b>Name:</b></label>
              <input type="text" name="name" value="<?php echo $val['name'] ?>" class="form-control" readonly />
              <input type="text" name="email" value="<?php echo $val['email'] ?>" class="form-control" hidden readonly />
            </div>
            <div class="col-6">
              <label><b>Company:</b></label>
              <input type="text" name="company" value="<?php echo $val['company'] ?>" class="form-control" readonly />
            </div>
            <div class="col-6">
              <label><b>Department:</b></label>
              <input type="text" name="department" value="<?php echo $val['department'] ?>" class="form-control" readonly />
            </div>
            <div class="col-6">
              <label><b>Date Request:</b></label>
              <input type="date" name="date_request" value="<?php echo $val['date_request'] ?>" class="form-control" readonly />
            </div>

            <div class="col-6">
              <label><b>Status:</b></label>
              <input type="text" class="form-control" name="status" style="color: #fc544b;" value="<?php echo ($val['status'] == 1) ? 'Done' : 'Pending'; ?>" readonly>
            </div>
            <div class="col-12">
              <label><b>Request Description:</b></label>
              <textarea class="form-control" name="remarks" rows="5" readonly><?php echo $val['remarks'] ?></textarea>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <!-- <a href="#" name="update" class="btn btn-primary">Done!</a> -->
        <!-- <input type="submit" name="update" class="btn btn-primary" value="Done!"> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_modal1<?php echo $val['id'] ?>">Done!
        </button>
      </div>
    </div>

    <div class="modal fade" id="update_modal1<?php echo $val['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout"><i class="fas fa-pen-square fa-1x btn-info"></i>&nbsp;<b>Confirmation</b></h5>
            <button onClick="window.location.reload();" class="reload btn-danger fa-1x" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure this Request is Done?</p>

            <div class="col-12">
              <label><b>Date Completed:</b></label>
              <div class="input-group date">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" name="date_finish" class="form-control" value="MM/DD/YYYY" required>
              </div>
              <br>
              <label><b>Description of Completed Work:</b></label>
              <textarea class="form-control" name="feedback" id="feedback" rows="5"></textarea>
            </div>


            <div class="modal-footer">
              <button onClick="window.location.reload();" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
              <!-- <a href="#" name="update" class="btn btn-primary">Done!</a> -->
              <button type="submit" id="<?php echo $val['id'] ?>" name="update" class="bts btn btn-primary" value="Yes!">Yes!</button>
            </div>
          </div>
          </form>
        </div>
      </div>

      <script>
        $('.bts').click(function() {
          // $(this).attr('disabled','disabled');
          $(this).html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...'); // change text
          setTimeout(function() {
            $('.bts').attr('disabled', 'disabled');
          }, 100); // enable after 2 seconds
        });

        $('#<?php echo $val['id'] ?>').click(function() {
          // $(this).attr('disabled','disabled');
          $(this).html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...'); // change text
          setTimeout(function() {
            $('#<?php echo $val['id'] ?>').attr('disabled', 'disabled');
          }, 100); // enable after 2 seconds
        });
      </script>



      <script src="assets/js/jquery-3.6.0.js"></script>
      <script src="assets/js/toastr.min.js"></script>
      <script src="assets/js/toastr-options.js"></script>


      <script>
        <?php include("msg_popup.php"); ?>
      </script>


      <div class="modal fade mds" id="update_modal<?php echo $val['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <!-- ... (other modal content) ... -->
            <div class="modal-body">
            </div>
            <div class="container">
              <form method="POST" action="">
                <!-- ... (other form inputs) ... -->
                <div class="form-group row">
                  <div class="col-6">
                    <label><b>Remarks:</b></label>
                    <textarea class="form-control" id="update_remarks<?php echo $val['id']; ?>" name="remarks" rows="5"><?php echo $val['remarks'] ?></textarea>
                  </div>
                  <!-- ... (other form inputs) ... -->
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" onclick="updateRemarks(<?php echo $val['id']; ?>)">Update
                Remarks</button>
            </div>
          </div>
        </div>
      </div>