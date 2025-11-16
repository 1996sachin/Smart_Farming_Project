<?php
session_start();
require('../sql.php'); // Use the database connection from sql.php

// Check if session exists
if(!isset($_SESSION['admin_login_user'])){
	echo "session_error";
	exit;
}

// Check if OTP is provided
if(!isset($_POST['otp']) || empty($_POST['otp'])){
	echo "no_otp";
	exit;
}

$otp = $_POST['otp'];
$email = $_SESSION['admin_login_user'];

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($conn, "SELECT admin_id FROM admin WHERE email=? AND otp=?");
if($stmt){
	mysqli_stmt_bind_param($stmt, "ss", $email, $otp);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$count = mysqli_stmt_num_rows($stmt);
	mysqli_stmt_close($stmt);
	
	if($count > 0){
		// OTP is valid, update OTP to 0 and set session
		$update_stmt = mysqli_prepare($conn, "UPDATE admin SET otp=0 WHERE email=?");
		if($update_stmt){
			mysqli_stmt_bind_param($update_stmt, "s", $email);
			mysqli_stmt_execute($update_stmt);
			mysqli_stmt_close($update_stmt);
			
			$_SESSION['IS_LOGIN'] = $email;
			// Ensure admin_login_user session is maintained
			$_SESSION['admin_login_user'] = $email;
			echo "yes";
		} else {
			echo "update_error";
		}
	} else {
		echo "not_exist";
	}
} else {
	echo "query_error";
}
?>