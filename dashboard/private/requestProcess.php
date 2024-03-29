<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();
require_once('functions.php');


if (isset($_POST['btnsubmit'])) {

  require_once("controllerClass.php");
  $sc = new controllerClass();


  $lc = new logsController();

  // Get the next available ID from the database
  $next_id = $lc->getNextAvailableID("tbl_request");

  $sc->setid($next_id);
  $sc->setname($_POST['name']);
  $sc->setusername($_POST['username']);
  $sc->setemail($_POST['email']);
  $sc->setcompany($_POST['company']);
  $sc->setrequestfor($_POST['requestfor']);
  $sc->setdepartment($_POST['department']);
  $sc->setdate_request($_POST['daterequested']);
  $sc->setremarks($_POST['otherValue'] . " " . $_POST['remarks']);
  $sc->setimage($_FILES['file']['name']);
  $sc->setstatus($_POST['status'] = 0);

  $filename = $_FILES["file"]["name"];
  $tempname = $_FILES["file"]["tmp_name"];
  $folder = "../upload/" . $filename;
  move_uploaded_file($tempname, $folder);


  // echo "<script> alert('data saved successfully');document.location='../formRequest.php'</script>";
  $test = $sc->insertData();


  $rqt = new logsController();
  $rqt->setusername($_SESSION['username'] .
    $rqt->setaction('Request Submitting - Description: ' .
      $sc->getremarks()));

  $rqt->insertActionLogs();


  if (!$test) {

    $mail = new PHPMailer(true);


    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;
    $mail->Username = 'gabolivares63@gmail.com';
    $mail->Password = 'vtjoafhiihdyrfsy';
    // $mail->Username = 'junrey.exelpack@gmail.com';
    // $mail->Password = 'gjtyytiqtuduucwb';
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Send Email
    $mail->setFrom('gabolivares63@gmail.com', 'Maintenance EMC Team');

    //Recipients
    $mail->addAddress('gabolivares63@gmail.com');
    $mail->addReplyTo($sc->getemail($_POST['email']));


    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject = "EMMC MAINTENANCE SYSTEM - REQUEST SEND";
    $mail->Body = $message = "<img src='https://loader.exel-portal.com/Empwaving.gif' height='200'><br>" .
      "A new maintenance request has been generated within the EMMC Maintenance System, and we would like to bring it to your attention. Please find the details of the request below:
     Check Your System to View The Request.<br><br>System Link: <a hreF='https://mtcsystems.exel-portal.com'>https://mtcsystems.exel-portal.com</a>
        <br><br>
			    You have new request from <br><br>
          Employee: " . $sc->getname($_POST['name']) .
      "<br>Department: " . $sc->getdepartment($_POST['department']) .
      "<br>Company Location: " . $sc->getcompany($_POST['company']) .
      "<br><br><table style='border: 1px solid #ccc; width:50%;'>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>MWO#: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>" . $sc->getId($_POST['id']) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Date&nbsp;Request: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'> " . date('m-d-Y', strtotime($sc->getdate_request($_POST['daterequested']))) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Request&nbsp;For: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4; white-space: normal !important;'>" . $sc->getrequestfor($_POST['requestfor']) . " " . $_POST['otherValue'] . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Request&nbsp;Description Issue: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4; white-space: normal !important;'>" . $sc->getremarks($_POST['remarks']) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Status: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Pending</td>
</tr>
</table><br>" .
      "<h4 style='color:red;'>This Email is Auto Generated By The System.</h4>";
    $mail->send();




    $mail1 = new PHPMailer(true);


    //Server settings
    $mail1->isSMTP();
    $mail1->Host = 'smtp.gmail.com';

    $mail1->SMTPAuth = true;
    $mail1->Username = 'gabolivares63@gmail.com';
    $mail1->Password = 'vtjoafhiihdyrfsy';
    // $mail->Username = 'junrey.exelpack@gmail.com';
    // $mail->Password = 'gjtyytiqtuduucwb';
    $mail1->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    $mail1->SMTPSecure = 'ssl';
    $mail1->Port = 465;

    //Send Email
    $mail1->setFrom('gabolivares63@gmail.com', 'Maintenance EMC Team');

    //Recipients
    $mail1->addAddress('gabolivares63@gmail.com');
    $mail1->addReplyTo($sc->getemail($_POST['email']));


    //Content
    $mail1->isHTML(true);
    $mail1->Subject = $subject = "EMMC MAINTENANCE SYSTEM - SUCCESSFULLY SEND REQUEST";
    $mail1->Body = $message = "<img src='https://loader.exel-portal.com/Empwaving.gif' height='200'><br>" .
      "We would like to inform you that your request for maintenance has been successfully submitted to the EMMC Maintenance team. 
      Our team is now reviewing your request and will be taking appropriate actions to address the issue you've raised.
        <br><br>
			    You have successfully sent the request. Here are the details:<br><br>
          Employee: " . $sc->getname($_POST['name']) .
      "<br>Department: " . $sc->getdepartment($_POST['department']) .
      "<br>Company Location: " . $sc->getcompany($_POST['company']) .
      "<br><br><table style='border: 1px solid #ccc; width:50%;'>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>MWO#: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>" . $sc->getId($_POST['id']) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Date&nbsp;Request: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'> " . date('m-d-Y', strtotime($sc->getdate_request($_POST['daterequested']))) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Request&nbsp;For: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4; white-space: normal !important;'>" . $sc->getrequestfor($_POST['requestfor']) . " " . $_POST['otherValue'] . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Request&nbsp;Description Issue: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4; white-space: normal !important;'>" . $sc->getremarks($_POST['remarks']) . "</td>
</tr>
<tr>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Status: </td>
<td style='border: 1px solid #ccc; background-color: #eaecf4;'>Pending</td>
</tr>
</table><br>" .
      "<h4 style='color:red;'>This Email is Auto Generated By The System.</h4>";
    $mail1->send();


    flash("msg3", "Successfully Send Request!");

    header("Location:../formRequest.php");
    //    $sc->insertData();

  } else {


    flash("msg4", "Error Send Request!");

    header("Location:../formRequest.php");
  }
}
