<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$servername = "localhost";
$username = "polyflash";
$password = "VdrElE3A13FS3.1F";
$dbname = "polyflash";
$conn=mysqli_connect($servername,$username,$password,$dbname) or die ('Cannot connect to db because:');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(strip_tags($_POST['user_name']));
    $email = $official_email = filter_var($_POST['official_email'], FILTER_SANITIZE_EMAIL);
    $message = generateOTP();

    // $cug_mobile_no = htmlspecialchars(strip_tags($_POST['cug_mobile_no']));
    // $sim_no = htmlspecialchars(strip_tags($_POST['sim_no']));
    // $institution_name = htmlspecialchars(strip_tags($_POST['institution_name']));
    // $employee_no = htmlspecialchars(strip_tags($_POST['employee_no']));
    // $user_name = htmlspecialchars(strip_tags($_POST['user_name']));
    // $personal_mobile_no = htmlspecialchars(strip_tags($_POST['personal_mobile_no']));
    // $official_email = filter_var($_POST['official_email'], FILTER_SANITIZE_EMAIL);
    // $aadhar_no = htmlspecialchars(strip_tags($_POST['aadhar_no']));
    // $issued_with_handset = htmlspecialchars(strip_tags($_POST['issued_with_handset']));
    // $sim_type = htmlspecialchars(strip_tags($_POST['sim_type']));
    // $sim_received_date = htmlspecialchars(strip_tags($_POST['sim_received_date']));
    $cug_mobile_no = $_POST['cug_mobile_no'];
    $sim_no = $_POST['sim_no'];
    $institution_name = $_POST['institution_name'];
    $employee_no = $_POST['employee_no'];
    $user_name = $_POST['user_name'];
    $personal_mobile_no = $_POST['personal_mobile_no'];
    $official_email = $_POST['official_email'];
    $aadhar_no = $_POST['aadhar_no'];
    $issued_with_handset = $_POST['issued_with_handset'];
    $sim_type = $_POST['sim_type'];
    $sim_received_date = $_POST['sim_received_date'];
    $sim_issued_by = $_POST['sim_issued_by'];
    $sim_used_slot = $_POST['sim_used_slot'];
    $using_mobile_data = $_POST['using_mobile_data'];
    $device_type = $_POST['device_type'];
    $average_calls_per_day = $_POST['average_calls_per_day'];
    $purpose = $_POST['purpose'];
    $registered_in_websites = $_POST['registered_in_websites'];
    $used_in_whatsapp = $_POST['used_in_whatsapp'];
    $sim_location = $_POST['sim_location'];

    
    // Validate and sanitize inputs (example for mobile number)
    if (!preg_match('/^\d{10,20}$/', $cug_mobile_no)) {
        die("Invalid CUG Mobile No");
    }

    if (!filter_var($official_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    if ($_SESSION['otp_verified'] == true) { 
        $stmt = $conn->prepare("INSERT INTO `cugData`(`cugMobileNum`, `simNo`, `institutionName`, `employeeNo`, `userName`, `personalMobileNo`, `offEmailId`, `adharNo`, `issuedHandset`, `simType`, `simReceievedDate`, `simIssuedBy`, `simUsageSlot`, `dataUsageType`, `deviceType`, `avgCallsPerDay`, `purpose`, `registerInPublic`, `whatsAppLink`, `simLocation`) VALUES ('?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?')");
        $stmt->execute([$cug_mobile_no, $sim_no, $institution_name,  $employee_no, $user_name, $personal_mobile_no, $official_email, $aadhar_no, $issued_with_handset, $sim_type, $sim_received_date, $sim_issued_by, $sim_used_slot, $using_mobile_data, $device_type, $average_calls_per_day, $purpose, $registered_in_websites, $used_in_whatsapp, $sim_location ]);
        unset($_SESSION['otp_verified']);
    }

    $mail = new PHPMailer(true);
        
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'no-reply.nmc@psgtech.ac.in'; 
        $mail->Password   = '@mrmg-nmc@2023'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('no-reply.nmc@psgtech.ac.in', 'OTP');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'OTP_CUG-PSGINSTITUTIONS';
        $mail->Body    = "OTP for CUG SIM KYC DOCUMENT submission($cug_mobile_no) is $message (valid for 10 mins).";

        if ($mail->send()) {       
            
            // Prepare SQL statement
            $sql = "INSERT INTO otpVerification (email, otp) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
          
            if ($stmt) {
                // Bind parameters and execute
                $stmt->bind_param('ss', $email, $message); // Corrected email binding
                if ($stmt->execute()) {
                    echo "Record inserted successfully";
                } else {
                    echo "SQL Error: " . $stmt->error;
                }
                $stmt->close();
                header("Location: index.php?status=success");
                // echo "<script>var emailSent = true;</script>";
                exit(); 
            } else {
                echo "SQL Error: " . $conn->error;
            }
    
            $conn->close();

        } else {
            echo "<script>var emailSent = false;</script>";
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
       
    } catch (Exception $e) {
        echo "<script>var emailSent = false;</script>";
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // try {
    //     // Server settings
    //     $mail->isSMTP();
    //     $mail->Host       = 'smtp.example.com';  // Replace with your SMTP server
    //     $mail->SMTPAuth   = true;
    //     $mail->Username   = 'no-reply.nmc@psgtech.ac.in';  // Replace with your SMTP username
    //     $mail->Password   = '@mrmg-nmc@2023';  // Replace with your SMTP password
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //     $mail->Port       = 587;

    //     // Recipients
    //     $mail->setFrom('no-reply.nmc@psgtech.ac.in', 'OTP');
    //     $mail->addAddress('mrk.nmc@psgtech.ac.in');  // Replace with recipient email address

    //     // Content
    //     $mail->isHTML(true);
    //     $mail->Subject = 'New Contact Form Message';
    //     $mail->Body    = "Name: $name<br>Email: $email<br>Message:<br>$message";
    //     $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$message";

    //     // Send email
    //     $mail->send();


    //     echo 'Message has been sent successfully!';

    //     // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     //     // Sanitize and validate input
            // $cug_mobile_no = htmlspecialchars(strip_tags($_POST['cug_mobile_no']));
            // $sim_no = htmlspecialchars(strip_tags($_POST['sim_no']));
            // $institution_name = htmlspecialchars(strip_tags($_POST['institution_name']));
            // $employee_no = htmlspecialchars(strip_tags($_POST['employee_no']));
            // $user_name = htmlspecialchars(strip_tags($_POST['user_name']));
            // $personal_mobile_no = htmlspecialchars(strip_tags($_POST['personal_mobile_no']));
            // $official_email = filter_var($_POST['official_email'], FILTER_SANITIZE_EMAIL);
            // $aadhar_no = htmlspecialchars(strip_tags($_POST['aadhar_no']));
            // $issued_with_handset = htmlspecialchars(strip_tags($_POST['issued_with_handset']));
            // $sim_type = htmlspecialchars(strip_tags($_POST['sim_type']));
            // $sim_received_date = htmlspecialchars(strip_tags($_POST['sim_received_date']));
        
            // // Additional validation
            // if (!filter_var($official_email, FILTER_VALIDATE_EMAIL)) {
            //     die("Invalid email format");
            // }
        
            // // Database insertion logic (ensure prepared statements to prevent SQL injection)
            // // Example:
            // $stmt = $pdo->prepare("INSERT INTO your_table (cug_mobile_no, sim_no, ...) VALUES (?, ?, ...)");
            // $stmt->execute([$cug_mobile_no, $sim_no, ...]);
        
            echo "Form submitted successfully!";
        } else {
            echo "Invalid request method.";
        }
    // } catch (Exception $e) {
    //     echo "Error found";
    //     // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
// }  

function generateOTP($length = 6) {
    $otp = '';
    for($i = 0; $i < $length; $i++) {
        $otp .= mt_rand(0, 9);
    }
    return $otp;
}

?>


<!-- jQuery to trigger the modal -->
<script>
// $(document).ready(function() {
//     if (typeof emailSent !== 'undefined' && emailSent === true) {
//         $('#otpModal').modal('show');
//     }else {
//         alert('Failed to send OTP: ' + response.message);
//     }
// });

</script>

</body>
</html>

