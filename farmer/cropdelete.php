<?php
session_start();// Starting Session
require('../sql.php'); // Includes Login Script

    $id = $_GET['id'];
    $query1 = "SELECT * FROM farmer_crops_trade WHERE trade_id =$id";
    $result1=mysqli_query($conn,$query1);
    while($row1=$result1->fetch_assoc()){

        $x=$row1['Crop_quantity'];
        $query2="UPDATE production_approx SET quantity=`quantity`- '".$row1['Crop_quantity']."' WHERE crop='".$row1['Trade_crop']."' ";
        $result2=mysqli_query($conn,$query2);

    }
    $sql = "DELETE FROM farmer_crops_trade WHERE trade_id = $id";
    if (mysqli_query($conn, $sql)) {
		
	echo 
"<script type='text/javascript'>alert('Crops Deleted Successfully');
      window.location='fmy_crop.php';</script>";
    } 
?>