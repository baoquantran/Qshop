<?php
$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "asm";
$prefix = "";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) or die("Could not connect database");
?>