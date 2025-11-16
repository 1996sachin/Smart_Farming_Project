<?php
session_start();
$error = ''; // Variable To Store Error Message

require('../sql.php'); // Includes Login Script


if(isset($_POST ['adminlogin'])) {
  $admin_email=$_POST['admin_email'];
  $apassword=$_POST['admin_password'];
  //$farmer_password=SHA1($farmer_password);


  $adminquery = "SELECT * from `admin` where email='".$admin_email."' and admin_password='".$apassword."' ";
  $result = mysqli_query($conn, $adminquery);
  $rowcount=mysqli_num_rows($result);
  


  if ($rowcount==true) {
    $_SESSION['admin_login_user']=$admin_email; // Initializing Session
    
//echo '<script type="text/javascript">alert("'.$_SESSION['admin_login_user'].'");</script>';

   header("location: asend_otp.php"); // Sending otp
    } 
    else  {
       $error = "Username or Password is invalid";
       header("location: alogin.php?error=" . urlencode($error));
     }
    
 mysqli_close($conn); // Closing Connection
 
}
?>
