<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
dgdgg
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CUG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .spinner {
      border: 8px solid #f3f3f3; /* Light grey */
      border-top: 8px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>

<body class="index-page">
  <header id="header" class="header d-flex flex-column justify-content-center">
    <i class="header-toggle d-xl-none bi bi-list"></i>
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <!-- <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li> -->
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
        <!-- <li><a href="#portfolio"><i class="bi bi-images navicon"></i><span>Portfolio</span></a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i><span>Services</span></a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i><span>Contact</span></a></li> -->
      </ul>
    </nav>
  </header>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container">
      <h3 class="sitename">
        <img src="./psglogo.png" style="width: 120px;" /> PSG INSTITUTIONS
      </h3>
    </div>
  </footer>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
      <img src="./psgtech.jpg" alt="" style="opacity: 30%;">
      <div class="container mt-5">
        <h4><b style="color:red">CUG SIM KYC DOCUMENT</b></h4>
        <br>
        <form action="phpmailer.php" method="post" id="cugForm" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cug_mobile_no">CUG Mobile No: </label>
              <input type="text" class="form-control" id="cug_mobile_no" name="cug_mobile_no" maxlength="20" pattern="\d{10,20}" placeholder="ex: 9876543210" required>
              <div class="invalid-feedback">Please enter a valid CUG Mobile No (10-20 digits).</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sim_no">20 Digit SIM No:</label>
              <input type="text" class="form-control" id="sim_no" name="sim_no" placeholder="1234 5678 9012 3456 7890" required>
              <div class="invalid-feedback">Please enter the SIM No.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="institution_name">Institution Name:</label>
              <input type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Enter the Institutions Name" required>
              <div class="invalid-feedback">Please enter the Institution Name.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="employee_no">Employee No:</label>
              <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="CXXXX" required>
              <div class="invalid-feedback">Please enter the Employee No.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="user_name">Name of the User:</label>
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter the Name" required>
              <div class="invalid-feedback">Please enter the Name of the User.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="personal_mobile_no">Personal Mobile No:</label>
              <input type="text" class="form-control" id="personal_mobile_no" name="personal_mobile_no" pattern="\d{10}" placeholder="ex: 9876543210" required>
              <div class="invalid-feedback">Please enter a valid Personal Mobile No (10 digits).</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="official_email">Official Email ID:</label>
              <input type="email" class="form-control" id="official_email" name="official_email" placeholder="ex: XXXX@psgtech.ac.in" required>
              <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="aadhar_no">User Aadhar No:</label>
              <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" pattern="\d{12}" placeholder="Enter 12-digit Aadhaar number" required>
              <div class="invalid-feedback">Please enter a valid 12 digit Aadhar No.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>SIM Issued with handset:</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="issued_yes" name="issued_with_handset" value="Yes" required>
                <label for="issued_yes" class="form-check-label">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="issued_no" name="issued_with_handset" value="No">
                <label for="issued_no" class="form-check-label">No</label>
              </div>
              <div class="invalid-feedback">Please select an option.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label>SIM Type:</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="physical_sim" name="sim_type" value="Physical SIM" required>
                <label for="physical_sim" class="form-check-label">Physical SIM</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="e_sim" name="sim_type" value="eSIM">
                <label for="e_sim" class="form-check-label">eSIM</label>
              </div>
              <div class="invalid-feedback">Please select a SIM Type.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
                <label for="sim_received_date">SIM Received Date:</label>
                <input type="date" class="form-control" id="sim_received_date" name="sim_received_date" style="background-color:#fff" placeholder="DD-MM-YYYY" required>
                <div class="invalid-feedback">Please enter the SIM Received Date.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sim_issued_by">SIM Issued By:</label>
              <input type="text" class="form-control" id="sim_issued_by" name="sim_issued_by" placeholder="Enter Issuer's Name" required>
              <div class="invalid-feedback">Please enter who issued the SIM.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="sim_used_slot">SIM Used in Slot:</label>
              <select class="form-select" id="sim_used_slot" name="sim_used_slot" required>
                <option value="">Select Slot</option>
                <option value="Slot 1">Slot 1</option>
                <option value="Slot 2">Slot 2</option>
              </select>
              <div class="invalid-feedback">Please select the SIM Slot.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label>Using Mobile Data:</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="using_data_yes" name="using_mobile_data" value="Yes" required>
                <label for="using_data_yes" class="form-check-label">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="using_data_no" name="using_mobile_data" value="No">
                <label for="using_data_no" class="form-check-label">No</label>
              </div>
              <div class="invalid-feedback">Please select an option.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="device_type">Device Type:</label>
              <select class="form-select" id="device_type" name="device_type" required>
                <option value="">Select Device Type</option>
                <option value="Smartphone">Smartphone</option>
                <option value="Button type">Button type</option>
                <option value="Tablet">Tablet</option>
                <option value="iPad">iPad</option>
                <option value="Data card">Data card</option>
                <option value="Others">Others</option>
              </select>
              <div class="invalid-feedback">Please select the Device Type.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="average_calls_per_day">Average Calls Per Day:</label>
              <input type="number" class="form-control" id="average_calls_per_day" name="average_calls_per_day" placeholder="ex: 20" min="0" required>
              <div class="invalid-feedback">Please enter the average number of calls per day.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="purpose">Purpose:</label>
              <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Enter Purpose" required>
              <div class="invalid-feedback">Please enter the Purpose.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label>Is this number registered in any websites?</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="registered_yes" name="registered_in_websites" value="Yes" required>
                <label for="registered_yes" class="form-check-label">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="registered_no" name="registered_in_websites" value="No">
                <label for="registered_no" class="form-check-label">No</label>
              </div>
              <div class="invalid-feedback">Please select an option.</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Used in WhatsApp:</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="whatsapp_yes" name="used_in_whatsapp" value="Yes" required>
                <label for="whatsapp_yes" class="form-check-label">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="whatsapp_no" name="used_in_whatsapp" value="No">
                <label for="whatsapp_no" class="form-check-label">No</label>
              </div>
              <div class="invalid-feedback">Please select an option.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sim_location">SIM Location:</label>
              <input type="text" class="form-control" id="sim_location" name="sim_location" placeholder="ex: inserted in equipments, or connected in phone, or some other device name" required>
              <div class="invalid-feedback">Please enter the SIM Location.</div>
            </div>
          </div>
          <input type="checkbox" id="agreeCheckbox">
          <label for="agreeCheckbox">I confirm that the above details are correct.</label><br><br>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
         
        </form>
      </div>
    </section>

    
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form id="otpForm">
                        <div class="mb-3">
                            <label for="otpInput" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otpInput" placeholder="Enter OTP">
                            <span style="color:green">OTP has been sent to your email!</span>
                        </div>                        
                        <button type="button" class="btn btn-primary" onclick="verifyOTP()">Verify OTP</button>
                        <p>OTP will expired in 10 minutes.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Generated</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <?php  echo "hai"; ?>
                </div>
                <div class="modal-body">
                    <p>Your PDF has been generated successfully.</p>
                    <a href="#" id="downloadPdfLink" class="btn btn-success">Download PDF</a>
                </div>
            </div>
        </div>
    </div>
  </main><!-- End #main -->

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  <div id="loading" style="display: none;">
    <div class="spinner"></div>
  </div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>

    document.addEventListener('DOMContentLoaded', function () {
      flatpickr("#sim_received_date", {
        dateFormat: "Y-m-d",
      });
    });

    $(document).ready(function() {
      const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'success') {
            $('#otpModal').modal('show');
        }
    });

    function verifyOTP() {
      var otp = $('#otpInput').val();
      $('#loading').show();
      $.post('verify_otp.php', { otp: otp })
          .done(function(response) {
              $('#loading').hide();
              console.log(response)
              if (response.success) {
                  $('#otpModal').modal('hide');
                  $('#pdfModal').modal('show');
                  $('#downloadPdfLink').attr('href', response.pdfUrl);
              } else {
                  alert('Invalid OTP or OTP has expired.');
                  console.error(response.error); // Log errors to console for debugging
              }
          })
          .fail(function(jqXHR, textStatus, errorThrown) {
              alert('Error: ' + textStatus);
              console.error('AJAX error:', textStatus, errorThrown); // Log AJAX errors to console
          });
    }
    $('#cugForm').submit(function(event) {
    
      if (!$('#agreeCheckbox').is(':checked')) {
        alert('Please confirm that the above details are correct.');    
        event.preventDefault(); 
      }else{
        return true
      }
    })

    $('#otpModal').modal({
      backdrop: 'static',
      keyboard: false
    });
    $('#pdfModal').modal({
      backdrop: 'static',
      keyboard: false
    });
  </script>

  <script>

    (function () {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
    })()

  </script>

</body>

</html>

<!-- check the grammer and rewrite if needed " I am getting married on september 4th 2024" in coimbatore, I this regard you to provide me leave from Auguest 31st 2024 to September 6th 2024(7 days) and I request you to kindly permit me to take earned leave(EL) from Sep 9th 2024 to 14th sep (6days).I have enclosed my wedding invitation for your reference"  -->