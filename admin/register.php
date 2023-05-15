<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/user.php";
    
    if ((isset($_POST['dangnhap']))&&($_POST['dangnhap'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=checkuser($username,$password);
        $_SESSION['role']=$role;
        if ($role==1) header('location:index.php?act=trangchuadmin');         
        else{
            $txt_errol="Username or Passwword không tồn tại!";
        } //header('location: login.php'); 
           
        
    }
?>



<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang Login</title>
     <link rel="stylesheet" href="view/css/style-login.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="view/img/hinh-nen-dien-thoai-minion.jpg" alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Kí</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                    <div class="input-form">
                        <span>Họ tên</span>
                        <input type="text" name="ten">
                    </div>
                    <div class="input-form">
                        <span>Tài Khoản</span>
                        <input type="text" name="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" name="password">
                    </div>
                    <div class="input-form">
                        <span>email</span>
                        <input type="text" name="email">
                    </div>
                    <div class="nho-dang-nhap">
                        <label><input type="checkbox" name=""> Lưu thông tin</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" name="dangnhap" value="Đăng Kí">
                    </div>
                    <?php
                        if (isset($txt_errol)&&($txt_errol!="")) {
                            echo "<font color='red'>".$txt_errol."</font>";
                        }
                    ?>
                    <div class="input-form" style="margin-top: 2%;">
                        <p>Bạn Đã Có Tài Khoản? <a href="../admin/login.php">Đăng Nhập</a></p>
                    </div>
                </form>
                <div class="mxh">
                    <h3 style="margin-top: 10%;">Đăng Nhập Bằng Mạng Xã Hội</h3>
                    <ul class="icon-dang-nhap">
                        <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li><i class="fa fa-google" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <style>
            footer{
                display: none;
            }
            #footer{
                display: none;
            }
            p{
                display: none;
            }
            hr{
                display: none;
            }
            #hd{
                display: none;
            }
        </style>

        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>
</html>