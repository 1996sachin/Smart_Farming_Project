<?php
include('floginScript.php'); // Includes Login Script

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

  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="index.php"><img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="80" /><span class="text-theme font-monospace fs-4 ps-2"></span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
         <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
		  <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="../index.php">Home</a></li>
		  <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="../contact.php">Contact</a></li>
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="../index.php">Opportunities</a></li>
          <li class="nav-item px-2"><div class="dropdown show">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-user-plus"></i> Sign Up</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="fregister.php">Farmer</a>
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
			<a class="dropdown-item" href="flogin.php">Farmer</a>
			<a class="dropdown-item" href="../customer/clogin.php">Customer</a>
			<a class="dropdown-item" href="../admin/alogin.php">Admin </a>
		  </div>
		</div>
			</li>
			
          
          </ul>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
 	
  <section class="section section-shaped section-lg">

<div class="container">
      
<div class="row">
<div class="col-sm-12 mb-3">  
			  
  <div class="nav nav-tabs nav-fill bg-gradient-default" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active font-weight-bold text-color" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Farmer Login</a>

  </div>
                  
                		  
      <div class="tab-content py-3 px-3 px-sm-0 bg-gradient-inf" id="nav-tabContent">

 
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           <div class="card card-body bg-gradient-warning">
 
 
 
 
        <form method="POST" action="floginScript.php">
                        
					<div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label"
                      ><h6 class="text-color font-weight-bold">Email Id</h6>
                    </label>
                    <div class="col-md-9">
                      <input
                        type="text"
                        class="form-control"
                        required
                        name="farmer_email"
                        placeholder="Enter Email ID"
                      />
                    </div>
                  </div>
				  
				  			  		 <div class="form-group row">
                <label for="pass" class="col-md-3 col-form-label font-weight-bold text-color" > Password </label>
			   <div class="col-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="farmer_password" type="password"  class="input form-control" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>
		   </div>
				  
				  
		
		 <div class="form-group row">
                    <div class="offset-md-3 col-md-2">
                      <button
                        type="submit"
                        class="btn btn-block text-white btn-success"
						name="farmerlogin" id="submit" >
                        Login
                      </button>
                    </div>
					</div>
					
					<div class="form-group row">
						<div class="offset-md-3 col-md-9">
							<a href="fforgot_password.php" class="text-primary">Forgot Password?</a>
						</div>
					</div>
					
					   <span>
              <?php if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong class='text-center text-dark '>$error</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          </div>";

} ?></span>
					   
					  
	
             </form>
 
 
 
				
           </div>
       </div> 
	</div>
                 </div>
                </div>
              </div> 
			  
  
</section>

<?php require("footer.php");?>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

</body>

  <script>
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>

</html>