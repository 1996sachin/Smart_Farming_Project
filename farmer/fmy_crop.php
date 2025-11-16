<?php
include ('fsession.php');
include ('../sql.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from farmerlogin where email='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];
			  
?>


<!doctype html>
<html lang="en">
<?php require ('fheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php require ('fnav.php');  ?>
 	
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


<div class="container-fluid ">
    
    	 <!-- <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">CUSTOMER</span>
          </div>
        </div> -->
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-color bg-gradient-secondary mb-3">
				  <div class="card-header">
				  <span class=" text-color display-4" > My Crops  </span>
				  
					
				  </div>
				  
				  <div class="card-body text-dark">
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-dark">
					<th><center>Crop Name</center></th>
					<th><center>Quantity</center></th>
					<th><center>Delete</center></th>
        </tr>
    </thead>
    <tbody>
  						<?php 
                            $sql = "SELECT trade_id, farmer_fkid, Trade_crop, Crop_quantity, costperkg FROM farmer_crops_trade WHERE farmer_fkid = $para1";

								$query = mysqli_query($conn,$sql);
								$res = mysqli_fetch_array($query);
                if(!$res){
                  ?>
                  <tr>
                  <td colspan= "3"><p class='text-center no-data-message'>No data available in table</p></td>
                  </tr>
                  <?php
                }else{	
                  do{
				             ?>		  
						  
		                    <tr class="text-center text-dark">
							 <td> <?php echo $res['Trade_crop'];  ?> </td>
							 <td> <?php echo $res['Crop_quantity'];  ?> </td>
							<td > <button class="btn btn-sm btn-danger" > <a href="cropdelete.php?id=<?php echo $res['trade_id']; ?>"  class=" nav-link text-white">Delete</a> </button> </td>


							</tr>

							 <?php 
                                }while($res =mysqli_fetch_array($query));
                              }
                             
							 
							  ?>
    </tbody>
</table>

</div>
				</div>				 		  
            </div>
          </div>
        </div>
		 
</section>
	   <?php require("footer.php");?>

	   <script>
				$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

</body>
</html>