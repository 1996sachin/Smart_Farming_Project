<?php
// Start output buffering to catch any errors
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('memory_limit', '-1');

include('asession.php');

if(!isset($_SESSION['admin_login_user']) || !$user_check){
	ob_end_clean(); // Clear any output before redirect
	error_log("aprofile.php: Session error - admin_login_user not set or user_check is null");
	header("location: ../index.php");
	exit;
}

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($conn, "SELECT * from admin where email=?");
if(!$stmt){
	error_log("aprofile.php: Failed to prepare statement: " . mysqli_error($conn));
	ob_end_clean();
	header("location: ../index.php");
	exit;
}

mysqli_stmt_bind_param($stmt, "s", $user_check);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row4 = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if(!$row4){
	error_log("aprofile.php: No user data found for email: " . $user_check);
	ob_end_clean();
	header("location: ../index.php");
	exit;
}

$para1 = $row4['admin_id'];
$para2 = isset($row4['admin_name']) ? $row4['admin_name'] : (isset($login_session) ? $login_session : 'Profile');
$para3 = $row4['admin_password'];
$para5 = $row4['email'];
$para6 = $row4['phone_no'];
$para7 = $row4['A_gender'];
$para8 = $row4['A_birthday'];
$para9 = $row4['A_province'];
$para10 = $row4['A_District'];
$para11 = $row4['A_Location'];
$para12 = $row4['photo'];

ob_end_flush(); // Output any buffered content and stop buffering
?>

<!DOCTYPE html>
<html>
<?php require ('aheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php require ('anav.php');  ?>
 	
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
            <span class="badge badge-danger badge-pill mb-3">Admin</span>
          </div>
        </div> -->
		
          <div class="column column-content">
            <div class="col-md-12 mb-3">
			
			
				<div class="card">
                <div class="card-body bg-gradient-success">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src="<?php echo $para12?>" alt="admin" class=" rounded-circle img-fluid" width="212px">
                  
                    <div class="mt-3">
                      <h4>                Welcome     <?php echo $login_session ?></h4>
                     

                    </div>
                  </div>
                </div>
              </div>			 		  
            </div>
            <div class="col-md-12 ">
              <div class="card mb-3">
                <div class="card-body bg-gradient-success">
          
                
                  <div class="row mb-1">
                    <div class="col-sm-3 ">
                      <h6 class="mb-0 font-weight-bold ">Admin Name</h6>
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
                      <h6 class="mb-0 font-weight-bold">Province</h6>
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
          
  

</section>

    <?php require("footer.php");?>

</body>
</html>