<?php
session_start();
include "./model/connectdb.php";
include "./model/binhluan.php";
if (isset($_SESSION['id']) && ($_SESSION['id'] > 0)) {

    if (isset($_SESSION['username']) && ($_SESSION['username'] != 0)){
        $username=$_SESSION['username'];

    } else{
        $username="";
    }

    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        //
            $username=$_POST['username'];
            $binhluan=$_POST['binhluan'];
            $id_sanpham=$_POST['idsp'];
            $id_user=$_SESSION['id'];
        //
        thembl($username,$binhluan,$id_user,$id_sanpham);
        //
    }
    $dsbl=showbl();

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bình luận</title>
    </head>
<style>
    .user{
        color: red;
    }
</style>
    <body>
        <hr>
        
        <form action="binhluan.php" method="post">
            
            <input type="text" class="user"  name="username" value="<?=  $_SESSION['username'] ?>" >
            <input type="hidden" name="idsp" value="<?= $_GET['id'] ?>">
            <textarea name="binhluan" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="gửi bình luận" name="guibinhluan">
        </form>

    <?php
        foreach ($dsbl as $bl) {
            
            echo  '<form container-bl>
                        <label class="user">'. $bl['username']. '-</label>'.$bl['binhluan']."<br> 
                    </form";
        }
    ?>

        <hr>
    </body>

    </html>
<?php }else{
    echo"<a href='index.php?act=dangnhap' target='_parent'>Bạn vui lòng đăng nhập!</a>";
} ?>