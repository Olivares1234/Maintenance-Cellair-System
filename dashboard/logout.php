<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['password']);
unset($_SESSION['role']);
unset($_SESSION['image']);
session_destroy();
echo "<script>document.location='../index.php'</script>";
