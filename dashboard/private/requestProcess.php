<?php
session_start();
require_once('functions.php');


if(isset($_POST['btnsubmit'])){

require_once("controllerClass.php");
$sc = new controllerClass();
$sc->setname($_POST['name']);
$sc->setcompany($_POST['company']);
$sc->setdepartment($_POST['department']);
$sc->setdate_request($_POST['daterequested']);
$sc->setremarks($_POST['remarks']);
$sc->setstatus($_POST['status'] = 'Pending');

// echo "<script> alert('data saved successfully');document.location='../formRequest.php'</script>";
$test = $sc->insertData();
if(!$test)
{
   
    flash("msg3","Successfully Send Request!");

   header("Location:../formRequest.php");
//    $sc->insertData();
   
}
else{
   

    flash("msg4","Successfully Send Request!");

    header("Location:../formRequest.php");
   
}

}





?>

