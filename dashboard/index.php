<?php

if(isset($_SESSION["username"])){
	$_SESSION["username"];
}
else{
	header("Location:home");
	die();
}
?>