<?php
include ('asession.php');

ini_set('memory_limit', '-1');

if(!isset($_SESSION['admin_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from admin where email ='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['admin_id'];
              $para2 = $row4['admin_name'];
			  
?>



<!DOCTYPE html>
<html>
<?php include ('aheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php include ('anav.php');  ?>
 	
 	
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
    
    	 <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Orders</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-warning mb-3">
				  <div class="card-header">
				  <span class=" text-color display-4" >All Orders</span>
				  
					
				  </div>
				  
				  <div class="card-body text-white">
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display text-dark" id="myTable">
				
				    <thead>
		<tr class="font-weight-bold text-dark">
						
								
					<th><center>Customer Name</center></th>
					<th><center>Crop Name</center></th>
					<th><center>Quantity (in KG)</center></th>
					<th><center>Address</center></th>
					<th><center>Date</center></th>
					<th><center>Staus</center></th>
					<th><center>Update Status</center></th>
												
						</tr>
			</thead>
	
	
				
		<tbody>	  
							  
						<?php 
	$sql = "SELECT * FROM orders";

								$query = mysqli_query($conn,$sql);

								while($res = mysqli_fetch_array($query)){	
				 ?>		  
						  
		 <tr class="text-center text-dark">
							 <td> <?php echo $res['cust_name'];  ?> </td>
							 <td> <?php echo $res['cropname'];  ?> </td>
							 <td> <?php echo $res['quantity'];  ?> </td>
							 <td> <?php echo $res['address'];  ?> </td>
							 <td> <?php echo $res['date'];  ?> </td>
							 <td> <?php echo $res['status'];  ?> </td>
							<td > 
                                <button class="btn btn-sm btn-success" <?php if ($res['status'] === 'Completed') echo 'disabled'; ?>>
                                    <a href="order_complete.php?id=<?php echo $res['order_id']; ?>"  class=" nav-link text-white">
                                    <?php echo ($res['status'] === 'Completed') ? 'Completed' : 'Mark as Completed'; ?>
                                </a> 
                                </button> 
                            </td>

							</tr>

							 <?php 
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

