<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="icon" type="image/png" href="assets/img/logo.png" /> -->
  <link rel="icon" type="image/png" href="assets/img/sfa-logo.png" />
    <title>FarmEase</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!--Nucleo Icons-->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />

<link rel="stylesheet" href="assets/css/theme.css" type="text/css"> 

</head>

  <body class="bg-white" id="top">
  <main class="main" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="index.php"><img class="d-inline-block align-top img-fluid" src="assets/img/sfa-logo.png" alt="" width="100" /><span class="text-theme font-monospace fs-4 ps-2"></span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
         <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
		  <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="index.php">Home</a></li>
		  <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="contact.php">Contact</a></li>
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="index.php">Opportunities</a></li>
          <li class="nav-item px-2"><div class="dropdown show">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-user-plus"></i> Sign Up</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="farmer/fregister.php">Farmer</a>
			<a class="dropdown-item" href="customer/cregister.php">Customer</a>
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
			<a class="dropdown-item" href="farmer/flogin.php">Farmer</a>
			<a class="dropdown-item" href="customer/clogin.php">Customer</a>
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
    <div class="container form-box" >
        <form action="contact-script.php" method="post">
            <div class="max-w-screen-xl px-12 grid gap-12 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
                <div class="flex flex-col justify-between">
                    <div class="mt-12">
                        <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Nothing is off the table, let's talk!</h2>
                    </div>
                    <div class="mt-12">
                        <span class="uppercase text-smm text-gray-600 font-bold">Full Name</span>
                        <input class="w-full bg-gray-300 text-gray-900 mt-12  rounded-lg focus:outline-none focus:shadow-outline" type="text" id="user_name" name="user_name" placeholder="Enter your Full Name">
                    </div>
                    <div class="mt-12">
                        <span class="uppercase text-smm text-gray-600 font-bold">Mobile Number</span>
                        <input class="w-full bg-gray-300 text-gray-900 mt-12  rounded-lg focus:outline-none focus:shadow-outline" type="phone" id="user_mobile" name="user_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number (Ex. 76435654XX)" placeholder="Enter your Mobile Number">
                    </div>
                    <div class="mt-12">
                        <span class="uppercase text-smm text-gray-600 font-bold">Email Id</span>
                        <input class="w-full bg-gray-300 text-gray-900 mt-12  rounded-lg focus:outline-none focus:shadow-outline" type="email" id="user_email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Id (Ex. abc@xyz.com)" placeholder="Enter your Email Id">
                    </div>
                </div>
                <div class="flex flex-col justify-between">
                    <div class="mt-12">
                        <span class="uppercase text-smm text-gray-600 font-bold">Address</span>
                        <input class="w-full bg-gray-300 text-gray-900 mt-12  rounded-lg focus:outline-none focus:shadow-outline" type="text" id="user_address" name="user_address" title="Enter your City Name and Pincode" placeholder="Enter your City/Pincode">
                    </div>
 
                    <div class="mt-12">
                        <span class="uppercase text-smm text-gray-600 font-bold">Feedback</span>
                        <textarea class="w-full h-32 bg-gray-300 text-gray-900 mt-12 p-17 rounded-lg focus:outline-none focus:shadow-outline" rows="8" id="user_message" name="user_message" title="Enter your Issue in Detail" placeholder="Enter your Issue" required="" autofocus=""></textarea>
                    </div>
                    <div class="mt-12">
                        <button class="submit uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100  rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="mysuccessModal" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 1px 1px 0 #D1E8E2,0 1px 1px 0 #D1E8E2;">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #D9B08C;color: white;">
                    <h4 class="modal-title">Feedback</h4>
                    <button type="button" class="close" onclick="pagesuccessRedirect()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h3>Thank you for reaching out to us.</h3>
                    <h6>Your privacy is important to us, and we assure you that any information you provide will be kept confidential. Our team will review your message and get back to you promptly.</h6>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #116466;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pagesuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myunsuccessModal" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 1px 1px 0 #D1E8E2,0 1px 1px 0 #D1E8E2;">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color:  #D9B08C;color: white;">
                    <h4 class="modal-title">Feedback</h4>
                    <button type="button" class="close" onclick="pageunsuccessRedirect()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                Unfortunately, an error occurred while sending your message. Please retry.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #116466;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pageunsuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
  </main>
<?php require("footer.php");?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

</body>

</html>