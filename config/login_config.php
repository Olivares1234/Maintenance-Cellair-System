<?php

    session_start();

    require_once('functions.php');


if(isset($_POST['btnsign'])){
    // include('../classes/class_loginConfig.php');
    require_once("../public/classes/class_loginConfig.php");
    
    $info = new loginConfig();
    $info->setusername($_POST['username']);
    $info->setpassword($_POST['password']);

    $login = $info->login();


    if($login){

        header("Location:../dashboard/home");
        // flash("msg1","  Success!");

    }else{

        flash("msg2","Check UserName & Password Correctly Does Not Exists!");

        header("Location:../index");
        // echo "<script>alert('Error');document.location='../../index.php'</script>";

    }
}
   



?>