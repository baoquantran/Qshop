<?php
header('Content-Type: application/json');
$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "asm";
$prefix = "";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) or die("Could not connect database");



// $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
$sqlQuery = "SELECT id, name,sl_sp FROM orders ORDER BY id";


$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>