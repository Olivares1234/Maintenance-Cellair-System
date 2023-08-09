<?php
$host     = 'localhost';
$username = 'cellairc_mtcuser';
$password = 'mtcsystem123';
$dbname   ='cellairc_maintenancedb';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}