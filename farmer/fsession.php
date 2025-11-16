<?php
require('../sql.php'); // Use the database connection from sql.php
session_start();// Starting Session

// Storing Session
if(isset($_SESSION['farmer_login_user'])){
	$user_check = $_SESSION['farmer_login_user'];
	// SQL Query To Fetch Complete Information Of User
	$stmt = mysqli_prepare($conn, "SELECT farmer_name FROM farmerlogin WHERE email = ?");
	if($stmt){
		mysqli_stmt_bind_param($stmt, "s", $user_check);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		mysqli_stmt_close($stmt);
		
		if($row){
			$login_session = $row['farmer_name'];
		} else {
			$login_session = "";
		}
	} else {
		$login_session = "";
	}
	$CustID = $user_check;
} else {
	$user_check = "";
	$login_session = "";
	$CustID = "";
}
?>

