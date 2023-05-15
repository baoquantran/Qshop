<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Đăng kí</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/style.css">
</head>
<style>
    label{
        margin-left: -16.7%;
    }
</style>
<center>
<h2>Đăng kí</h2>
<div class="reg-input-field">
    <h3>Hãy điền vào tất cả Thông Tin</h3>
    <form method="post" action="#">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" required />
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <input type="text" class="form-control" name="gender" style="width:20em;" placeholder="Enter your Gender" required pattern="[a-zA-Z .]+" />
        </div>
        <div class="form-group">
            <label style="margin-left: -19.2%;">Tuổi</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age">
        </div>
        <div class="form-group">
            <label style="margin-left: -18%;">Địa chỉ</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address"></textarea>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" style="width:20em;" placeholder="Enter your Username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="password" style="width:20em;" required placeholder="Enter your Password">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" /><br><br>
            <center>
                <a href="index.php?act=dangnhap">LogIn</a>
            </center>
        </div>
    </form>
</div>

</html>
<?php
$db = mysqli_connect('localhost', 'root', '') or
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'asm') or die(mysqli_error($db));
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "INSERT INTO user
                (username, password, name,gender,age,address)
                VALUES ('" . $username . "','" . $password . "','" . $name . "','" . $gender . "','" . $age . "','" . $address . "')";
    mysqli_query($db, $query) or die('Error in updating Database');
?>
    <script type="text/javascript">
        alert("Successfull Added.");
        window.location = "index.php?act=home";
    </script>
<?php
}
?>
</center>