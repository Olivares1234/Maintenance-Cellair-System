<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();
require_once('functions.php');


if(isset($_POST['btnsubmit'])){

require_once("controllerClass.php");
$sc = new controllerClass();
$sc->setname($_POST['name']);
$sc->setemail($_POST['email']);
$sc->setcompany($_POST['company']);
$sc->setdepartment($_POST['department']);
$sc->setdate_request($_POST['daterequested']);
$sc->setremarks($_POST['remarks']);
$sc->setstatus($_POST['status'] = 'Pending');

// echo "<script> alert('data saved successfully');document.location='../formRequest.php'</script>";
$test = $sc->insertData();
if(!$test)
{
    $mail = new PHPMailer(true);     

			
				//Server settings
				$mail->isSMTP();                                     
				$mail->Host = 'smtp.gmail.com';                     
		
				$mail->SMTPAuth = true;                             
				$mail->Username = 'gabolivares63@gmail.com';     
				$mail->Password = 'vcqihabipcpqwkgo';             
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
				$mail->setFrom('gabolivares63@gmail.com');
				
				//Recipients
				$mail->addAddress('gabolivares63@gmail.com');              
				$mail->addReplyTo($sc->getemail($_POST['email']));
				
				
				//Content
				$mail->isHTML(true);                                  
				$mail->Subject = $subject = "Employee > ".$sc->getname($_POST['name'])." from ".$sc->getcompany($_POST['company']);
				$mail->Body = $message = "<img src='http://mtctest.cellaircorp.com/dashboard/image/Empwaving.gif' height='200'><br>You Have New Request Check Your System to View The Request<br>Link: <a hreF='https://mtcsystem.cellaircorp.com'>mtcsystem.com</a>";
				$mail->send();
				
			   $_SESSION['result'] = 'Message has been sent';
			   $_SESSION['status'] = 'ok';
		
			echo "send";
			// header("location: index.php");

   
    flash("msg3","Successfully Send Request!");

   header("Location:../formRequest");
//    $sc->insertData();
   
}
else{
   

    flash("msg4","Successfully Send Request!");

    header("Location:../formRequest");
   
}

}





?>

