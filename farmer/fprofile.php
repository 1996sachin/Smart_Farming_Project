<?php
// Start output buffering to catch any errors
ob_start();
ini_set('memory_limit', '-1');
// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include ('fsession.php');


if(!isset($_SESSION['farmer_login_user'])){
    ob_end_clean(); // Clear any output before redirect
    header("location: ../index.php");
    exit(); // Redirecting To Home Page
}

// Verify $user_check is set from fsession.php
if(!isset($user_check) || empty($user_check)){
    // Debug: Log the issue
    error_log("fprofile.php: user_check not set. Session: " . (isset($_SESSION['farmer_login_user']) ? $_SESSION['farmer_login_user'] : 'not set'));
    ob_end_clean(); // Clear any output before redirect
    header("location: ../index.php");
    exit();
}

// Use prepared statement to prevent SQL injection
$stmt4 = mysqli_prepare($conn, "SELECT * FROM farmerlogin WHERE email = ?");
if($stmt4){
    mysqli_stmt_bind_param($stmt4, "s", $user_check);
    mysqli_stmt_execute($stmt4);
    $ses_sq4 = mysqli_stmt_get_result($stmt4);
    $row4 = mysqli_fetch_assoc($ses_sq4);
    mysqli_stmt_close($stmt4);
} else {
    // If query fails, redirect to index
    ob_end_clean(); // Clear any output before redirect
    error_log("fprofile.php: Database query failed. Error: " . mysqli_error($conn));
    header("location: ../index.php");
    exit();
}

if(!$row4){
    // If no user found, redirect to index
    ob_end_clean(); // Clear any output before redirect
    error_log("fprofile.php: No user found for email: " . (isset($user_check) ? $user_check : 'unknown'));
    header("location: ../index.php");
    exit();
}
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];
              $para3 = $row4['password'];
			  $para5 = $row4['email'];
			  $para6 = $row4['phone_no'];
			  $para7 = $row4['F_gender'];
			  $para8 = $row4['F_birthday'];
			  $para9 = $row4['F_province'];
			  $para10 = $row4['F_District'];
              $para11 = $row4['F_Location'];
        $para12 = $row4['photo'];

// Debug: Ensure variables are set (remove after debugging)
if(!isset($para1) || !isset($para2) || !isset($para12)){
    error_log("Missing profile variables: para1=" . (isset($para1)?$para1:'NULL') . ", para2=" . (isset($para2)?$para2:'NULL') . ", para12=" . (isset($para12)?$para12:'NULL'));
}

if(isset($_POST['farmerupdate']))
  {
	  $id = ($_POST['id']);
	  $name = ($_POST['name']);
	  $email = ($_POST['email']);
	  $mobile = ($_POST['mobile']);
	  $gender = ($_POST['gender']);
	  $dob = ($_POST['dob']);
	  $province = ($_POST['province']);
		$district = ($_POST['district']);		
		$city = ($_POST['city']);
		$pass = ($_POST['pass']);
    $photo= $_FILES["photo"]["name"];
    $tempname=$_FILES["photo"]["tmp_name"];
    $extension = pathinfo($photo, PATHINFO_EXTENSION); // Get the file extension
    $folder = "../assets/u_image/$mobile.$extension";
    // $folder="../assets/u_image/$mobile.jpg";
    move_uploaded_file($tempname, $folder);
    

// Use prepared statement for province query
$stmt5 = mysqli_prepare($conn, "SELECT ProvinceName FROM province WHERE PrCode = ?");
if($stmt5){
    mysqli_stmt_bind_param($stmt5, "s", $province);
    mysqli_stmt_execute($stmt5);
    $ses_sq5 = mysqli_stmt_get_result($stmt5);
    $row5 = mysqli_fetch_assoc($ses_sq5);
    mysqli_stmt_close($stmt5);
    $provincename = $row5 ? $row5['ProvinceName'] : $province;
} else {
    $provincename = $province;
}
              
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    
    // Use prepared statement for update query
    $stmt_update = mysqli_prepare($conn, "UPDATE farmerlogin SET farmer_name=?, email=?, phone_no=?, F_gender=?, F_birthday=?, F_province=?, F_District=?, F_Location=?, password=?, photo=? WHERE farmer_id=?");
    if($stmt_update){
        mysqli_stmt_bind_param($stmt_update, "ssssssssssi", $name, $email, $mobile, $gender, $dob, $provincename, $district, $city, $hashedPassword, $folder, $id);
        mysqli_stmt_execute($stmt_update);
        mysqli_stmt_close($stmt_update);
    }
  header("location: fprofile.php");
  exit();
  }		  
?>

<!DOCTYPE html>
<html>
<?php 
ob_end_flush(); // Output any buffered content and stop buffering
include ('fheader.php');  
?>

  <body class="bg-white" id="top">
  
<?php include ('fnav.php');  ?>


 	
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
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
    </div>
<!-- ======================================================================================================================================== -->

<div class="container ">
    
    	 <!-- <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Profile</span>
          </div>
        </div> -->
		
          <div class="column column-content">
            <div class="col-md-12 mb-3">
        
				<div class="card">
                <div class="card-body bg-gradient-warning">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $para12?>" alt="agri" class=" rounded-circle img-fluid" width="212px">
                  
                   
                    <div class="mt-3">
                      <h4>                Welcome     <?php echo $login_session ?></h4>
                      		  <button data-toggle="modal" data-target="#edit" class="btn btn-danger">Edit Profile</button>


                    </div>
                  </div>
                </div>
              </div>			 		  
            </div>
			
			
                <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body bg-gradient-success">
				
                  <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Farmer ID</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para1 ?>
                    </div>
                  </div>
				
                  
				  
                  <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Farmer Name</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para2 ?>
                    </div>
                  </div>
              
				  
                  <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Email Address</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para5 ?>
                    </div>
                  </div>
                 
				   
				    <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Mobile No</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para6 ?>
                    </div>
                  </div>
               
				   
				       <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para7 ?>
                    </div>
                  </div>
			  
				       <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">DOB</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para8 ?>
                    </div>
                  </div>
				  
				     <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">province</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para9 ?>
                    </div>
                  </div>
				  
				     <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">District</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para10 ?>
                    </div>
                  </div>
				  
				     <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">City</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      <?php echo $para11 ?>
                    </div>
                  </div>
				  
				     <div class="row mb-1">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Password</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      ******** 
                    </div>
                  </div>
                   

				  
                </div>
              </div>
            </div>				

<!-- Edit Profile  Modal -->

    <div id="edit" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Profile</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body bg-gradient-danger">
		  
		  
            <form
              class="col s12 l5 white-text"
              method="POST"
              autocomplete="new-password"
              enctype="multipart/form-data"
			 
            >
			
              <div class="form-group row">
                <label
                  for="name"
                  class="col-md-3 col-form-label text-black"
                  >Farmer ID</label
                >
                <div class="col-md-9">
                  <input
				  name="id"
                    class="form-control "
                    value="<?php echo "$para1"?>"
                    readonly
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > Farmer Name </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="name" value="<?php echo "$para2"?>" />
                </div>				
              </div>
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > Email Address </label>
                <div class="col-md-9">
                  <input class="form-control" type="email" name="email" value="<?php echo "$para5"?>" readonly />
                </div>
              </div>
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > Mobile No </label>
                <div class="col-md-9">
                  <input class="form-control" type="number" min="0" name="mobile" value="<?php echo "$para6"?>" />
                </div>
              </div>
			  
			  
			    <div class="form-group row">
                <label class="col-md-3 col-form-label text-black" for="email"
                  >Gender </label
                >
                <div class=" col-md-9">
                  <select class=" col-md-12 font-weight-bold form-control" name="gender"  >
               <option selected hidden> <?php echo "$para7"?> </option>
			   <option value="Male">Male</option>
			   <option value="Female">Female</option>
			   </select>  
			   </div>
              </div>
			  
			  
			  
			  				  
			      <div class="form-group row">
                <label class="col-md-3 col-form-label text-black" for="dob"
                  >DOB</label
                >
                <div class="col-md-9">
                  <input
                    class=" form-control"
                    name="dob"
                    type="date"
                    value="<?php echo "$para8"?>"
                  />
                </div>
              </div>
			  
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > province <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
				<select onChange="getdistrict(this.value);"  name="province" id="province" class="form-control" >
                    <option value=""><?php echo "$para9"?></option>
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
                <label for="staffid" class="col-md-3 col-form-label text-black" > District <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                 <select  name="district" id="district-list" class="form-control">
				<option value=""><?php echo "$para10"?></option>
				</select>
                </div>
              </div>
			  
			  <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > City </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="city" value="<?php echo "$para11"?>" />
                </div>
              </div>
			  
			  		 <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > Password </label>
			   <div class="col-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="pass" type="password" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <!-- <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span> -->
              </div>
            </div>
          </div>
		   </div>

       <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-black" > Photo  <strong class="text-default"> *</strong></label>
                <div class="col-md-9">
                  <input class="form-control" type="file" name="photo" required="true"/>
                </div>				
              </div>
			  
			  
			   <div class="form-group row">
                <label for="staffid" class="col-md-3 col-form-label text-white" >  </label>
                <div class="col-md-9">
            <button name="farmerupdate" class=" btn-block btn btn-success"><span class="glyphicon glyphicon-edit"></span> Submit</button>		
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

   
<?php include ('footer.php');  ?>

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
</html>