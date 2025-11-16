<?php
session_start();// Starting Session
require('../sql.php'); // Includes Login Script

    $id = $_GET['id'];
    $sql = "UPDATE orders SET status = 'Completed' WHERE order_id = $id";
    if (mysqli_query($conn, $sql)) {
		
	echo 
"<script type='text/javascript'>alert('Order status set to completed');
      window.location='orders.php';</script>";
    } 
?>