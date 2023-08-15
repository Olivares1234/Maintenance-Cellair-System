<?php
session_start();
if (isset($_SESSION["username"])) {
  $_SESSION["username"];
} else {
  header("Location:../index.php");
  die();
}
include("private/controllerClass.php");

include("conn.php");


// Count Total Dashboard

$totalDone = new controllerClass(); //instantiation object class
$totalDones = $totalDone->recordAllDone();  //Count DoneTotal Status

$totalpending = new controllerClass(); //instantiation object class
$totalpends = $totalpending->recordAllPending(); //Count PendingTotal Status

// $totalreqToday = new controllerClass(); //instantiation object class
// $totalreqTodays = $totalreqToday->RetrieveRequestToday(); //Count PendingTotal Status
// echo $totalpends;

//Count new date request
$sql_count =  "SELECT COUNT(*) FROM tbl_request WHERE status='pending' AND date_request = CURDATE()";
$result =  mysqli_query($conn, $sql_count);
while ($row = mysqli_fetch_array($result)) {
  $total = $row[0];
  $totalreqTodays = $total;
}

?>

<?php
// header
include("layout/header.php");

?>

<?php
// navbar
include("layout/navbar.php");

?>

<?php
// content
include("layout/content.php");

?>

<?php
// footer
include("layout/footer.php");

?>




 
     