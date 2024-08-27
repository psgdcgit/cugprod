<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification and PDF Generation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- OTP Input Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="otpForm">
                        <div class="mb-3">
                            <label for="otpInput" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otpInput" placeholder="Enter OTP">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="verifyOTP()">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Generation Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Generated</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Your PDF has been generated successfully.</p>
                    <a href="#" id="downloadPdfLink" class="btn btn-success">Download PDF</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript Functions -->
    <script>
        function sendOTP() {
            $.post('phpmailer.php', function(response){
                if(response.success){
                    $('#otpModal').modal('show');
                }else{
                    alert('Failed to send OTP: ' + response.message)
                }
            }, 'json');
        }

        $(document).ready(function() {
            sendOTP();
        })
        
        function verifyOTP() {
            var otp = $('#otpInput').val();
            $.post('verify_otp.php', { otp: otp }, function(response) {
                if (response.success) {
                    $('#otpModal').modal('hide');
                    $('#pdfModal').modal('show');
                    $('#downloadPdfLink').attr('href', response.pdfUrl);
                } else {
                    alert('Invalid OTP');
                }
            }, 'json');
        }

        // Trigger the OTP modal on page load or specific action
        $(document).ready(function() {
            $('#otpModal').modal('show');
        });
    </script>
</body>
</html>
