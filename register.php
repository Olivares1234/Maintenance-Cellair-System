<?php

require_once("config/register_config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Maintenance-Systems-Registration</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
	<link href="public/img/repair.png" rel="icon">
    <!--<link rel="stylesheet" type="text/css" href="public/assets/fontawesome/css/all.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/reg_style.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/loader_animate.css">
</head>
<body>
<div class="loader">
    <div><img src="public/img/box-unscreen.gif" alt=""></div>
 </div>
<div class="content">
 <div class="container">

 	<div class="header">
 		<h2 style="color:dark; width:100%;"><b>Registration</b></h2>
 	</div>
 	<div class="main">
 		<form action="config/register_config.php" method="POST" autocomplete="off">
            <center>
            <table>
                <tr>
                  <td>
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="Username" name="username" autocomplete="off" required>
 			</span>
                    </td>
                    <td>
 			<span>
			 <i class="fas fa-envelope"></i>
 				<input type="email" placeholder="Email" name="email" autocomplete="off" required>
 			</span>
                    </td>
                </tr>
             </table><br>

             <table>
                <tr>
                  <td>
 			<span>
			 <i class="fas fa-key"></i>
 				<input type="password"  id="showpwd" placeholder="Password" name="password" autocomplete="off" required>
				 <span class="show-pass"><i class="fas fa-eye" aria-hidden="true" id="eye-show-pwd" onclick="toggles()"></i></span>
 			</span>
                    </td>
                    <td>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" id="showpass" placeholder="Confirm Password" name="cpass" autocomplete="off" required>
				 <span class="show-pass"><i class="fas fa-eye" aria-hidden="true" id="eye-show-pass" onclick="toggle()"></i></span>
 			</span>
                    </td>
                </tr>
             </table><br>

			 <input type="submit" class="btnreg" name="btnreg" id="button" value="Sign Up">
			 <!-- <button type="submit" name="btnreg" id="button">hjj</button> -->
 				<!-- <button>Sign Up</button> -->
				<br>
				<span>
				<em style="font-size:1.1em;">Already have an account? <a href="index" style="color:#fff; font-size:1.1em">Login here</a></em>
				</span>
                </center>
 		  </form>
 	</div>
 </div>
</div>

 <script src="public/src/show-pass.js" type='text/javascript'></script>
 <script src="public/src/jquery-3.6.0.js"></script>
 <script src="public/src/toastr.min.js"></script>
 <script src="public/src/toastr-options.js"></script>
 <script>

	//windows loader animation fading.
	$(window).on("load",function(){
        $(".loader").fadeOut(1000);
        $(".content").fadeIn(1000);
      });

	<?php if(isset($_SESSION['msg1'])): ?>
		toastr.info("<?php echo flash('msg1'); ?>");
		<?php endif ?>


		<?php if(isset($_SESSION['msg2'])): ?>
		toastr.error("<?php echo flash('msg2'); ?>");
		<?php endif ?>
 </script>
</body>
</html>