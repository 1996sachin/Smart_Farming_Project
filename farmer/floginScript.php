<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

require('../sql.php'); // Includes Login Script

if(isset($_POST ['farmerlogin'])) {
  $farmer_email=$_POST['farmer_email'];
  $farmer_password=$_POST['farmer_password'];
  //$farmer_password=SHA1($farmer_password);


  $farmerquery = "SELECT * from `farmerlogin` where email='".$farmer_email."'";
  $result = mysqli_query($conn, $farmerquery);
  $rowcount=mysqli_num_rows($result);
  if ($rowcount==1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];
    
    // Verify the entered password against the stored hashed password
    if (password_verify($farmer_password, trim($hashedPassword))) {
      $_SESSION['farmer_login_user']=$farmer_email; // Initializing Session
    

      header("location: fsend_otp.php"); //sending otp
    } else  {
       $error = "Something went wrong";
       header("location: flogin.php?error=" . urlencode($error)); // Redirect with error message
     }}else  {
       $error = "Username or Password is invalid";
       header("location: flogin.php?error=" . urlencode($error)); // Redirect with error message
     }
    
 mysqli_close($conn); // Closing Connection

}

?>
