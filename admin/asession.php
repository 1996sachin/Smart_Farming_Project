<?php
require('../sql.php'); // Use the database connection from sql.php
session_start();// Starting Session

// Check if session exists
if(!isset($_SESSION['admin_login_user'])){
	$user_check = null;
	$login_session = null;
	$CustID = null;
} else {
	// Storing Session
	$user_check = $_SESSION['admin_login_user'];
	
	// SQL Query To Fetch Complete Information Of User using prepared statement
	$stmt = mysqli_prepare($conn, "SELECT admin_name from admin where email = ?");
	if($stmt){
		mysqli_stmt_bind_param($stmt, "s", $user_check);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		mysqli_stmt_close($stmt);
		
		if($row){
			$login_session = $row['admin_name'];
		} else {
			$login_session = null;
		}
	} else {
		$login_session = null;
	}
	$CustID = $user_check;
}
?>

