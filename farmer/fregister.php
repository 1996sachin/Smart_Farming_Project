<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<?php
include('fregisterScript.php'); // Includes Login Script
require_once("../sql.php");
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

		  <script>
function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "fget_district.php",
	data:'province_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}

</script>	
</head>

  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="../index.php"><img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="80" /><span class="text-theme font-monospace fs-4 ps-2"></span></a>
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
<div class="row">
<div class="col-sm-12 mb-3">  
			  
  <div class="nav nav-tabs nav-fill bg-gradient-default" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active font-weight-bold text-color" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Farmer Singup</a>

  </div>
                  
                		  
      <div class="tab-content py-3 px-3 px-sm-0 bg-gradient-inf" id="nav-tabContent">

 
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           <div class="card card-body bg-gradient-warning">
 
 
 
 
<form name="insert" action="" method="post" enctype="multipart/form-data">	
		
		  <div id="success"> <?php echo $error; ?>    </div>
		 <script>		
			$("#success").fadeTo(2000, 500).slideUp(500, function(){
    $("#success").slideUp(500);
});
 </script>
 
			   <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" > Farmer Name <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="name"  required="true"/>
                </div>				
              </div>
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" > Email Address <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                  <input class="form-control" type="email" name="email" required="true" />
                </div>

              </div>
			  
              <div class="form-group row">
                  <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark">Mobile No<strong class="text-default"> *</strong></label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="mobile" pattern="[9][0-9]{9}" required="true" />
                  </div>
                </div>
			  
			  
			    <div class="form-group row">
                <label class="col-md-3 col-form-label font-weight-bold text-dark" for="email"
                  >Gender </label
                >
                <div class=" col-md-9">
                  <select class=" col-md-12 font-weight-bold form-control" name="gender"  >
			   <option value="Male">Male</option>
			   <option value="Female">Female</option>
			   </select>  
			   </div>
              </div>
			  
			  
			  
			  				  
			      <div class="form-group row">
                <label class="col-md-3 col-form-label font-weight-bold text-dark" for="dob"
                  >DOB</label
                >
                <div class="col-md-9">
                  <input
                    class=" form-control"
                    name="dob"
                    type="date"
                  />
                </div>
              </div>
			  
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" required="true"> Province <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                 <select onChange="getdistrict(this.value);"  name="province" id="province" class="form-control" >
                    <option value="">Select Province</option>
                   	<?php $query =mysqli_query($conn,"SELECT * FROM province");
					while($row=mysqli_fetch_array($query))
					{ ?>
					<option value="<?php echo $row['PrCode'];?>"><?php echo $row['ProvinceName'];?></option>
					<?php
					}
					?>
                    </select>

                </div>
              </div>
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" required="true"> District <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
	<select  name="district" id="district-list" class="form-control">
<option value="">Select District</option>
</select>
                </div>
              </div>
			  
		  
			    <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" >City <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="city"  required="true"/>
                </div>				
              </div>
			  
			  		 <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" > Password <strong class="text-default"> *</strong></label>
			   <div class="col-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password"  class="input form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
			  			  			  <span class="text-light d-block"> Use minimum 8 Characters with atleast 1 numericals, Capital letter and Special Character.  </span>

            </div>

          </div>
		   </div>
	
			  		 <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" >Confirm Password <strong class="text-default"> *</strong></label>
			   <div class="col-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="confirmpassword" type="password"  class="input form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="cpassword" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide2();">
                  <i class="fas fa-eye" id="show_eye2"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                </span>
              </div>
            </div>
          </div>
		  					   

		   </div>
       <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label font-weight-bold text-dark" > Profile Picture <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                  <input class="form-control" type="file"  name="photo" required="true"/>
                </div>
              </div>
			  
			   <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-white" >  </label>
                <div class="col-md-9">
            <button name="farmerregister" class=" btn-block btn btn-success"><span class="glyphicon glyphicon-edit"></span> Submit</button>		
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
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
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

  function password_show_hide2() {
  var x = document.getElementById("cpassword");
  var show_eye = document.getElementById("show_eye2");
  var hide_eye = document.getElementById("hide_eye2");
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
