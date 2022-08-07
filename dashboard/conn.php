<?php
	$conn = mysqli_connect("localhost", "root", "", "maintenancedb");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
  
?>