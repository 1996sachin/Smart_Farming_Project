<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

require('../sql.php');

if(isset($_POST['send_otp']) && isset($_POST['email'])){
    $email = trim($_POST['email']);
    
    // Check if email exists using prepared statement
    $stmt = mysqli_prepare($conn, "SELECT admin_id FROM admin WHERE email = ?");
    if($stmt){
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $count = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);
        
        if($count > 0){
            // Generate OTP
            $otp = rand(11111, 99999);
            
            // Update OTP using prepared statement
            $update_stmt = mysqli_prepare($conn, "UPDATE admin SET otp = ? WHERE email = ?");
            if($update_stmt){
                mysqli_stmt_bind_param($update_stmt, "ss", $otp, $email);
                mysqli_stmt_execute($update_stmt);
                mysqli_stmt_close($update_stmt);
                
                // Store email in session for verification
                $_SESSION['forgot_password_email'] = $email;
                $_SESSION['forgot_password_type'] = 'admin';
                // Store OTP in session for development display
                $_SESSION['forgot_password_otp'] = $otp;
                
                // Send OTP via email
                $html = "Your password reset OTP for FarmEase is: " . $otp . "<br><br>This OTP will expire in 10 minutes.";
                smtp_mailer($email, 'Password Reset OTP', $html, $otp);
            } else {
                error_log("Failed to prepare update statement for OTP");
                ob_end_clean();
                header("location: aforgot_password.php?error=" . urlencode("Error: Could not update OTP"));
                exit;
            }
        } else {
            ob_end_clean();
            header("location: aforgot_password.php?error=" . urlencode("Email not found in our system"));
            exit;
        }
    } else {
        error_log("Failed to prepare select statement for forgot password");
        ob_end_clean();
        header("location: aforgot_password.php?error=" . urlencode("Database error. Please try again."));
        exit;
    }
} else {
    ob_end_clean();
    header("location: aforgot_password.php?error=" . urlencode("Please enter your email address"));
    exit;
}

function smtp_mailer($to, $subject, $msg, $otp = null) {
    // Development mode - set to false in production
    $DEV_MODE = true; // Set to false in production
    
    try {
        require_once("../smtp/class.phpmailer.php");
        require '../smtp/class.pop3.php';
        require '../smtp/exception.php';
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; // Set to 2 for detailed debugging
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "farmease10@gmail.com";
        $mail->Password = "yypejrzurkcuvbft";
        $mail->SetFrom("farmease10@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);

        $email_sent = false;
        try {
            $email_sent = $mail->Send();
        } catch (Exception $e) {
            error_log("PHPMailer Send Exception: " . $e->getMessage());
        }

        if ($email_sent) {
            ob_end_clean();
            // In dev mode, pass OTP in URL for display
            if ($DEV_MODE && $otp) {
                header("location: aforgot_verify_otp.php?otp=" . $otp);
            } else {
                header("location: aforgot_verify_otp.php");
            }
            exit;
        } else {
            $error_info = $mail->ErrorInfo;
            error_log("OTP Email failed for $to: " . $error_info);
            ob_end_clean();
            // In dev mode, still redirect with OTP even if email fails
            if ($DEV_MODE && $otp) {
                header("location: aforgot_verify_otp.php?email_error=1&otp=" . $otp);
            } else {
                header("location: aforgot_verify_otp.php?email_error=1");
            }
            exit;
        }
    } catch (Exception $e) {
        error_log("OTP Email Exception for $to: " . $e->getMessage());
        ob_end_clean();
        // In dev mode, still redirect with OTP even if exception occurs
        if ($DEV_MODE && $otp) {
            header("location: aforgot_verify_otp.php?email_error=1&otp=" . $otp);
        } else {
            header("location: aforgot_verify_otp.php?email_error=1");
        }
        exit;
    }
}
?>

