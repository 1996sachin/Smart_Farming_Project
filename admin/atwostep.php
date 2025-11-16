<?php
// Start output buffering to catch any errors
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

session_start();// Starting Session
require('../sql.php'); // Includes Login Script

if (!isset($_SESSION['admin_login_user'])) {
    ob_end_clean(); // Clear any output before redirect
    header("Location: alogin.php"); // Redirect to login page
    exit;
}

// Storing Session
$user = $_SESSION['admin_login_user'];

ob_end_flush(); // Output any buffered content and stop buffering
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/sfa-logo.png" />
    <title>FarmEase</title>

  <!--     Fonts and icons     -->
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!--Nucleo Icons-->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
 
<link rel="stylesheet" href="../assets/css/theme.css" type="text/css"> 

</head>

  <body class="bg-white" id="top" >
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="../index.php"><img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="80" /><span class="text-theme font-monospace fs-4 ps-2"></span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		  <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="../index.php">Home</a></li>
		  <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="../contact.php">Contact</a></li>
          <!-- <li class="nav-item px-2"><a class="nav-link fw-medium" href="index.php">Opportunities</a></li> -->
          <li class="nav-item px-2"><div class="dropdown show">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-user-plus"></i> Sign Up</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="../farmer/fregister.php">Farmer</a>
			<a class="dropdown-item" href="../customer/cregister.php">Customer</a>
		  </div>
		</div>
			</li>
			
		  
				  <li class="nav-item px-2">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-sign-in-alt"></i> Login</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="../farmer/flogin.php">Farmer</a>
			<a class="dropdown-item" href="../customer/clogin.php">Customer</a>
			<a class="dropdown-item" href="admin/alogin.php">Admin </a>
		  </div>
		</div>
			</li>
			
          
          </ul>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
 	
  <section class="section section-shaped section-lg">
    <!-- <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div> -->
<!-- ======================================================================================================================================== -->

<div class="container">

 <!-- <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-info badge-pill mb-3">Login</span>
          </div>
        </div>  -->
      
<div class="row ">
<div class=" col-sm-8 mb-3 mx-auto text-center">  
                  
  <div class="nav nav-tabs nav-fill bg-gradient-default" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active font-weight-bold text-color" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">2 Factor Authentication</a>
  </div>

  
    <div class="tab-content py-3 px-3 px-sm-0 bg-gradient-inf" id="nav-tabContent">

 
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           <div class="card card-body bg-gradient-danger">
 
 
 
<form method=""  action="">
	
					<div class="alert alert-success alert-dismissible fade show text-center" style="display: none;" id="popup" role="alert">
			<strong class="text-center text-dark ">OTP Sent Successfully</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
			<div class="alert alert-primary alert-dismissible fade show text-center" style="display: none;" id="invalid" role="alert">
			<strong class="text-center text-dark ">Invalid OTP</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
	 
	 
					<div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label"
                      ><h6 class="text-dark font-weight-bold">Enter OTP</h6>
                    </label>
					
                    <div class="col-md-6">
                      <input type="text" id="otp"  class="form-control" required placeholder="Enter OTP" name="customer_otp">				   
                    </div>
					
					<div class="offset-md-1 col-md-3">
                      <button class="btn btn-info btn-block text-white " type="button"   onclick="send_otp()">ReSend OTP</button>
                    </div>
					
                  </div>
				  

					 <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                      <button
                        type="button"
                        class="btn btn-success btn-block text-white"
						onclick="submit_otp()"
                      >
                        Submit
                      </button>
					                        		   

                    </div>
					</div>
					
             </form>
				
           </div>
       </div> 
	   


	</div>
	  
                 </div>
                </div>
              </div> 
			  
  
</section>

	    <?php require("footer.php");?>

</body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

<script>

 function send_otp () {
      $.ajax({
        url:"asend_otp.php", //the page containing php script.
        type: "POST", //request type
        success:function(result){
			 $("#popup").css({'display':'block'}); 
			 $("#popup").fadeTo(2000, 500).slideUp(500, function(){
			$("#popup").slideUp(500);
});
       }
     });
 }


// Pre-fill OTP from URL parameter if present
jQuery(document).ready(function(){
	var urlParams = new URLSearchParams(window.location.search);
	var customerOtp = urlParams.get('customer_otp');
	if(customerOtp){
		jQuery('#otp').val(customerOtp);
	}
});

function submit_otp(){
	var otp = jQuery('#otp').val().trim();
	
	if(!otp || otp === ''){
		$("#invalid").html('<strong class="text-center text-dark">Please enter OTP</strong>');
		$("#invalid").css({'display':'block'});
		$("#invalid").fadeTo(2000, 500).slideUp(500, function(){
			$("#invalid").slideUp(500);
		});
		return;
	}
	
	jQuery.ajax({
		url:'acheck_otp.php',
		type:'POST',
		data: {
			otp: otp
		},
		success:function(result){
			console.log("OTP Check Result:", result);
			result = result.trim();
			
			if(result === 'yes'){
				window.location.href = 'aprofile.php';
			} else if(result === 'not_exist'){
				$("#invalid").html('<strong class="text-center text-dark">Invalid OTP</strong>');
				$("#invalid").css({'display':'block'});
				$("#invalid").fadeTo(2000, 500).slideUp(500, function(){
					$("#invalid").slideUp(500);
				});
			} else if(result === 'session_error'){
				alert("Session expired. Please login again.");
				window.location.href = 'alogin.php';
			} else if(result === 'no_otp'){
				$("#invalid").html('<strong class="text-center text-dark">Please enter OTP</strong>');
				$("#invalid").css({'display':'block'});
			} else {
				console.error("Unexpected response:", result);
				alert("An error occurred. Please try again. Error: " + result);
			}
		},
		error: function(xhr, status, error) {
			console.error("AJAX Error:", error);
			console.error("Response:", xhr.responseText);
			alert("Error verifying OTP. Please try again.");
		}
	});
}
</script>

</html>
