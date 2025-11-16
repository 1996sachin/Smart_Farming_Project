<?php
session_start();
require('../sql.php'); // Includes Login Script
//require '../smtp/class.pop3.php';
//require '../smtp/exception.php';
$email=$_SESSION['farmer_login_user'];
$res=mysqli_query($conn,"select * from farmerlogin where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
    $otp=rand(11111,99999);
    mysqli_query($conn,"update farmerlogin set otp='$otp' where email ='$email'");
	$html="Your otp verification code for FarmEase is ".$otp;
	$_SESSION['farmer_login_user']= $email;
    smtp_mailer($email,'OTP Verification',$html); 
}
else{
    echo "not exist";
}
 
function smtp_mailer($to,$subject, $msg){
	return header("location:ftwostep.php");
	require '../smtp/class.phpmailer.php';
	require '../smtp/class.pop3.php';
	require '../smtp/exception.php';
	$mail = new PHPMailer(true); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 0; 
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
	$mail->Body =$msg;
	$mail->AddAddress($to);
	// if(!$mail->Send()){
	// 	echo $mail->ErrorInfo;
	// 	return 0;
	// }else{
	// 	return 1;
	// }
	if($mail->Send()){
		echo "OTP sent";
        header("location:ftwostep.php");
	}else{
		echo "OTP could not be sent. Error message: " . $mail->ErrorInfo;
		return 1;
	}
	
}
?>

