<?php
$conn = mysqli_connect("localhost", "root", "", "maintenancedb");

if (!$conn) {
  die("Error: Failed to connect to database!");
}


?>

<?php


$db_name = "mysql:host=localhost;dbname=maintenancedb";
$username = "root";
$password = "";

$con = new PDO($db_name, $username, $password);




?>