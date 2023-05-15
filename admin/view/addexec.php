<?php
include('db.php');





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../uploaded/" . $_FILES["image"]["name"]);
			
		
			$tensp = $_POST['tensp'];
			$img=$_FILES["image"]["name"];
			$size = $_POST['size'];
	
			$gia = $_POST['gia'];
			$special = $_POST['special'];
			$id_danhmuc = $_POST['id_danhmuc'];
	
			

			
			$update=mysqli_query($conn,"INSERT INTO sanpham (tensp, img, size, gia, special, id_danhmuc ) VALUES ('$tensp','$img','$size','$gia','$special','$id_danhmuc')");
header("location: all-sp.php");
			exit();
		
			}
	}


?>
