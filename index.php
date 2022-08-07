<?php

include("config/login_config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Maintenance-Systems-Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
	<link href="public/img/repair.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="public/assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/login_style.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/loader_animate.css">
</head>
<body class="noscroll">
<div class="loader">
<div><img src="public/img/box-unscreen.gif" alt=""></div>
 </div>
<div class="content">
  <div class="container">
 	<div class="header">
 		<h2 style="color:dark;"><b>Welcome<br>
		Maintenance Request</b></h2>
 	</div>
 	<div class="main">
 		<form action="config/login_config.php" method="POST" autocomplete="off">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="Username" name="username" required>
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" id="showpass" placeholder="password" name="password" required>
				<span class="show-pass"><i class="fas fa-eye" aria-hidden="true" id="eye-show-pass" onclick="toggle()"></i></span>
 			</span><br>	
			 <input type="submit" class="btnreg" name="btnsign" value="Login">
 				<!-- <button>login</button> -->
				<br>
				<!-- <span>
				<em><a href="resources/views/register.php">register</a><a href=""> | </a><a href="#">help</a></em>
				</span> -->
				<span>
				<em style="font-size:1.1em;">Create account?<a href="register.php" style="color:#fff; font-size:1.1em">Register here</a></em>
				</span>
 		  </form>
 	</div>
 </div>
</div>

 <script src="public/src/show-pass.js" type='text/javascript'></script>
 <script src="public/src/jquery-3.6.0.js"></script>
 <script src="public/src/toastr.min.js"></script>
 <script src="public/src/toastr-options.js"></script>

 <script>
	//loader animation page
	 $(window).on("load",function(){
        $(".loader").fadeOut(1000);
        $(".content").fadeIn(1000);
      });

	  // message popup info
	  <?php include("config/msg_popup.php"); ?>
	  
 </script>

</body>
</html>