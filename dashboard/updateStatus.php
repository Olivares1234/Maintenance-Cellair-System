<?php


require_once('functions.php');
	
	if(isset($_POST['update'])){

		require_once 'controllerClass.php';
		
		$data = new controllerClass();
		$data->setId($_POST['id']);
		$data->setname($_POST['name']);
		$data->setcompany($_POST['company']);
		$data->setdepartment($_POST['department']);
		$data->setdate_request($_POST['date_request']);
		$data->setremarks($_POST['remarks']);
		$data->setstatus($_POST['status'] ='Done');
	
		$update = $data->update();

	    if(!$update){

			flash("msg3","Successfully Send Done!");
				// echo "<script>document.location='pendingRequest.php'</script>";
				header("Location:pendingRequest");
				// echo "<script>document.location='pendingRequest.php'</script>";


		}
		else{
				// flash("msg3","Successfully Send Done!");
				// echo "<script> alert('data saved successfully');document.location='pendingRequest.php'</script>";
				// header("Location:pendingRequest.php");

				
	

		}
		

			// echo "<script> alert('data saved successfully');document.location='pendingRequest.php'</script>";
			
		

	
	}
?>

