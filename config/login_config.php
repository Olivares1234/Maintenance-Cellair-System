<?php

session_start();

require_once('functions.php');


if (isset($_POST['btnsign'])) {
  // include('../classes/class_loginConfig.php');
  require_once("../public/classes/class_loginConfig.php");

  $info = new loginConfig();
  $info->setusername($_POST['username']);
  $info->setpassword($_POST['password']);
  $login = $info->login();

  $actionlogs = new logsController();

  $actionlogs->setusername($_POST['username']);
  $actionlogs->setaction($_POST['action'] = 'login Attempt!');


  if ($login) {
    // Assuming you have a 'role' variable stored in the session after successful login
    if ($_SESSION['role'] === 'admin') {
      header("Location: ../dashboard/home.php");
      $actionlogs->insertActionLogs();
    } elseif ($_SESSION['role'] === 'user') {
      header("Location: ../dashboard/formRequest.php");
      $actionlogs->insertActionLogs();
    }
  } else {
    flash("msg2", "Check UserName & Password Correctly Does Not Exist!");
    header("Location: ../index.php");
  }
}
