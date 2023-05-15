<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'asm' ) or die(mysqli_error($db));
?>

  <style>
    .one{
        margin-left: -17%;
    }
  </style>
  <?php
$id=$_SESSION['id'];
$query=mysqli_query($db,"SELECT * FROM user where id='$id'")or die(mysqli_error($db));
$row=mysqli_fetch_array($query);
  ?>
  <center>
  <h2>User</h2>
<div class="profile-input-field" >
        <h3>Thông tin người dùng</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label class="one">Họ và tên</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['name']; ?>" required />
          </div>
          <div class="form-group">
            <label class="one">Giới tính</label>
            <input type="text" class="form-control" name="gender" style="width:20em;" placeholder="Enter your Gender" required value="<?php echo $row['gender']; ?>" />
          </div>
          <div class="form-group">
            <label style="margin-left: -19.5%;">Age</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['age']; ?>">
          </div>
          <div class="form-group">
            <label class="one">Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <td class="text-center"><a href="view/qlyorder.php?username=<?php echo $row['username'] ?>" ><i class="fa fa-external-link"></i> View Item</a></td>


            <center>
             <a href="index.php?act=thoat">Log out</a>
           </center>
          </div>
        </form>
      </div>
      
      <?php
      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
      $query = "UPDATE user SET name = '$name',
                      gender = '$gender', age = $age, address = '$address'
                      WHERE id = '$id'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }               
?>
</center>
