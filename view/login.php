<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tạo Trang Login</title>
     <link rel="stylesheet" href="view/css/style-login.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form" style="margin-top: -10%;">
                <h2>Trang Đăng Nhập</h2>
                <form action="index.php?act=login" method="post" >
                    <div class="input-form">
                        <span>Tài Khoản</span>
                        <input type="text" name="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" name="password">
                    </div>
                    <div class="nho-dang-nhap">
                        <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" name="login" value="Đăng Nhập">
                    </div>
                    <?php
                        if (isset($txt_errol)&&($txt_errol!="")) {
                            echo "<font color='red'>".$txt_errol."</font>";
                        }
                    ?>
                    <div class="input-form" style="margin-top: 2%;">
                        <p>Bạn Chưa Có Tài Khoản? <a href="index.php?act=dangki">Đăng Ký</a></p>
                    </div>
                </form>
                <div class="mxh">
                    <h3 style="margin-top: 0%;">Đăng Nhập Bằng Mạng Xã Hội</h3>
                    <ul class="icon-dang-nhap">
                        <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li><i class="fa fa-google" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
    <style>
            #footer{
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
</body>
</html>