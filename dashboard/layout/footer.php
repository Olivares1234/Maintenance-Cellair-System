  <!-- Footer Start -->

  <?php if ($_SESSION['role'] != 'user') { ?>
    <div class="container-fluid" id="container-wrapper">

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

              <div id="calendar"></div>


              <!-- Event Details Modal -->
              <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0">
                      <h5 class="modal-title">Timeline Date Request Done Details</h5>
                      <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body rounded-0">
                      <div class="container-fluid">
                        <dl>
                          <dt class="text-muted">Name</dt>
                          <dd id="title" class="fw-bold fs-4"></dd>
                          <dt class="text-muted">Description</dt>
                          <dd id="description" class=""></dd>
                          <dt class="text-muted">Start</dt>
                          <dd id="start" class=""></dd>
                          <dt class="text-muted">End</dt>
                          <dd id="end" class=""></dd>
                        </dl>
                      </div>
                    </div>
                    <div class="modal-footer rounded-0">
                      <div class="text-end">
                        <a href="./doneRequest" class="btn btn-primary btn-sm rounded-0">View All</a>
                        <!-- <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button> -->
                        <!-- <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button> -->
                        <!-- <button type="button" class="btn btn-danger btn-sm rounded-0" data-dismiss="modal" >Close</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Event Details Modal -->
            </div>




          </div>
        <?Php } ?>

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
        <script>
          $('#submitBtn').click(function() {
            // $(this).attr('disabled','disabled');
            $(this).html('<i class="fa fa-spinner fa-spin gap-right"></i> Sending ...'); // change text
            setTimeout(function() {
              $('#submitBtn').attr('disabled', 'disabled');
            }, 10); // enable after 2 seconds
          });
        </script>

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
        <script src="assets/js/date-range.js"></script>
        <!-- <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

        <script>
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

        <?php
        $schedules = $conn->query("SELECT * FROM `tbl_timeline`");
        $sched_res = [];
        foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
          $row['sdate'] = date("F d, Y", strtotime($row['start_date']));
          $row['edate'] = date("F d, Y", strtotime($row['end_date']));
          $sched_res[$row['id']] = $row;
        }
        ?>

        <?php
        if (isset($conn)) $conn->close();
        ?>
        </body>
        <script>
          var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
        </script>
        <script src="js/script.js"></script>

        </html>
        <!-- End Footer -->