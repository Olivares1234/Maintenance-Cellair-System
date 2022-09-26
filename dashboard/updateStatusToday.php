<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


require_once('functions.php');
	
	if(isset($_POST['bupdate'])){

		require_once 'controllerClass.php';
		
		$data = new controllerClass();
		$data->setId($_POST['id']);
		$data->setname($_POST['name']);
		$data->setemail($_POST['email']);
		$data->setcompany($_POST['company']);
		$data->setdepartment($_POST['department']);
		$data->setdate_request($_POST['date_request']);
		$data->setdate_finish($_POST['date_finish']);
		$data->setremarks($_POST['remarks']);
		$data->setstatus($_POST['status'] ='Done');
	
		$update = $data->update();

	    if(!$update){

			try{
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
				$mail->addAddress($data->getemail($_POST['email']));              
				$mail->addReplyTo($data->getemail($_POST['email']));
				
				
				//Content
				$mail->isHTML(true);                                  
				$mail->Subject = $subject = "EMC MAINTENANCE TEAM";
				$mail->Body    = $message = "<img src='http://mtctest.cellaircorp.com/dashboard/image/repair.gif' height='200'><br><h4>Successfully Done Request!<br>"."Description: ".$data->getremarks($_POST['remarks'])."<br>Status: ".$data->getstatus($_POST['status'])."<br>Date Request: ".$data->getdate_request($_POST['date_request'])."<br>Date End: ".$data->getdate_finish($_POST['date_finish'])."</h4>";

				$mail->send();

			//    $_SESSION['result'] = 'Message has been sent';
			//    $_SESSION['status'] = 'ok';
		
			// echo "send";
			// header("location: index.php");

			flash("msg3","Successfully Send Done!");
				// echo "<script>document.location='pendingRequest.php'</script>";
				header("Location:newRequest");
				// echo "<script>document.location='pendingRequest.php'</script>";
            }
            catch(PDOException $ex){
               return $ex->getMessage();
            }

		}
		else{
				// flash("msg3","Successfully Send Done!");
				// echo "<script> alert('data saved successfully');document.location='pendingRequest.php'</script>";
				// header("Location:pendingRequest.php");

				
                flash("msg4","Error Send!");
				// echo "<script>document.location='pendingRequest.php'</script>";
				header("Location:newRequest");

		}
		

			// echo "<script> alert('data saved successfully');document.location='pendingRequest.php'</script>";


		
		   
			//Load composer's autoloader
		
		
		}
		
?>

<?php


if(isset($_POST['bupdate'])){
    // include("location: ../classes/class_registerConfig.php");
	require_once 'controllerClass.php';
	// $stm = $this->con_Db->prepare("INSERT INTO tbl_timeline(name, description, status, start_date, end_date) values(?, ?, ?, ?, ?)");
	$datas = new controllerClass();
	$datas->setname($_POST['name']);
	$datas->setremarks($_POST['remarks']);
	$datas->setstatus($_POST['status'] ='Done');
	$datas->setdate_request($_POST['date_request']);
	$datas->setdate_finish($_POST['date_finish']);
	$datas->insertData_TimeLine();


    }


?>

