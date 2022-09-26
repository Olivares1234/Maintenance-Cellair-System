<?php
	$conn = mysqli_connect("localhost", "cellairc_mtcuser", "mtcsystem123", "cellairc_maintenancedb");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}

  
?>

<?php


$db_name = "mysql:host=localhost;dbname=cellairc_maintenancedb";
$username = "cellairc_mtcuser";
$password = "mtcsystem123";

$con = new PDO($db_name, $username, $password);




?>