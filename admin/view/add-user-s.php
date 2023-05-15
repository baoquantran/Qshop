<?php
include('db.php');	
if((isset($_POST['Submit']))&&($_POST['Submit'])){
			$username=$_POST['username'];
			$password=$_POST['password'];		
			$role=$_POST['role'];		
			$update=mysqli_query($conn,"INSERT INTO user (username, password,role) VALUES ('$username','$password','$role')");
			header("location: manage-users.php");
			exit();
		
			}
	


?>
