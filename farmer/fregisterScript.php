<?php

session_start(); // Starting Session

require('../sql.php'); // Includes Login Script
global $error;

// function for email validation
function is_valid_email($email)
{
	global $conn;
	global $error;
	
     $slquery = "SELECT farmer_id FROM farmerlogin WHERE email = '$email'";
     $selectresult = mysqli_query($conn, $slquery);
	 $rowcount=mysqli_num_rows($selectresult);
	   
	 if ($rowcount==true) {
		 
		$error = '
		
		<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert">
			<strong class="text-center text-dark ">This email already exists</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		
		';

		return false;		
 }
    else  {
        return true;
     }

}
function is_valid_phone($mobile)
{
	global $conn;
	global $error;
	
     $slquery = "SELECT farmer_id FROM farmerlogin WHERE phone_no = '$mobile'";
     $selectresult = mysqli_query($conn, $slquery);
	 $rowcount=mysqli_num_rows($selectresult);
	   
	 if ($rowcount==true) {
		 
		$error = '
		
		<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert">
			<strong class="text-center text-dark ">This phone_no already exists</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		
		';

		return false;		
 }
    else  {
        return true;
     }

}

 
// function for password verification
function is_valid_passwords($password,$cpassword) 
{
	global $error;
	
if ($password != $cpassword) {
	
$error = '
		
		<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert">
			<strong class="text-center text-dark ">Your passwords do not match. Please type carefully</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		
		';
		
         return false;
     }
 else  {
        return true;
     }
}

// function for creating user. changes made

function create_user($name, $hashedPassword, $email, $mobile, $gender, $dob, $provincename, $district, $city, $folder) 
{
	global $conn;
	
      $query = "INSERT INTO `farmerlogin` (farmer_name, password, email, phone_no, F_gender, F_birthday, F_province, F_District, F_Location, photo) 
	  VALUES ('$name', '$hashedPassword', '$email', '$mobile', '$gender', '$dob', '$provincename', '$district', '$city', '$folder')";
      $result = mysqli_query($conn, $query);
      if($result){
          return true; // Success
      }else{
          return false; // Error somewhere
      }
}


// Code execution starts here after submit
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){

    // Reading form values
    $name = $_POST['name'];
    $email = $_POST['email'];	
	$mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
	$dob = $_POST['dob'];
    $province = $_POST['province'];
	$district = $_POST['district'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
	
	// $photo = $_POST['photo'];
	// $imagefile = "../assets/u_image/$mobile.jpg" ;
    // $folder="../assets/u_image/$mobile.jpg";
	// $filehandler = fopen($imagefile, 'wb' );
    // fwrite($filehandler, base64_decode($photo));
    // fclose($filehandler);
	$photo= $_FILES["photo"]["name"];
	$tempname=$_FILES["photo"]["tmp_name"];
	$extension = pathinfo($photo, PATHINFO_EXTENSION); // Get the file extension
    $folder = "../assets/u_image/$mobile.$extension";
	// $folder="../assets/u_image/$mobile.jpg";
	move_uploaded_file($tempname, $folder);
	
	$query5 = "SELECT ProvinceName from province where PrCode ='$province'";
	$ses_sq5 = mysqli_query($conn, $query5);
              $row5 = mysqli_fetch_assoc($ses_sq5);
              $provincename = $row5['ProvinceName'];

    if (is_valid_email($email) == true && is_valid_phone($mobile) == true && is_valid_passwords($password,$cpassword) == true)
    {	
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (create_user($name, $hashedPassword, $email, $mobile, $gender, $dob, $provincename, $district, $city, $folder)) {
			$_SESSION['farmer_login_user']=$email; // Initializing Session  
        header("location: fsend_otp.php");
        }else{	
		
			$error = '
		
		<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert">
			<strong class="text-center text-dark ">Error While Registering User</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		
		';

        }
    }
}
//check
    // You don't need to write another 'else' since this is the end of PHP code 
?>

