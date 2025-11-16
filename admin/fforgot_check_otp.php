<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

require('../sql.php');

if(!isset($_SESSION['forgot_password_email']) || $_SESSION['forgot_password_type'] != 'farmer'){
    ob_end_clean();
    header("location: fforgot_password.php?error=" . urlencode("Session expired. Please try again."));
    exit;
}

if(!isset($_POST['otp']) || empty($_POST['otp'])){
    ob_end_clean();
    header("location: fforgot_verify_otp.php?error=" . urlencode("Please enter OTP"));
    exit;
}

$otp = trim($_POST['otp']);
$email = $_SESSION['forgot_password_email'];

// Verify OTP using prepared statement
$stmt = mysqli_prepare($conn, "SELECT farmer_id FROM farmerlogin WHERE email = ? AND otp = ?");
if($stmt){
    mysqli_stmt_bind_param($stmt, "ss", $email, $otp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    
    if($count > 0){
        // OTP is valid, set session for password reset
        $_SESSION['forgot_password_verified'] = true;
        ob_end_clean();
        header("location: fforgot_reset.php");
        exit;
    } else {
        ob_end_clean();
        header("location: fforgot_verify_otp.php?error=" . urlencode("Invalid OTP. Please try again."));
        exit;
    }
} else {
    error_log("Failed to prepare statement for OTP verification");
    ob_end_clean();
    header("location: fforgot_verify_otp.php?error=" . urlencode("Database error. Please try again."));
    exit;
}
?>

