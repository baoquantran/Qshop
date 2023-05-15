<!DOCTYPE html>

<html>
    <head>
        <title>Tạo tài khoản mới</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #create_user form{
                width: 200px;
                margin: 40px auto;
            }
            #create_user form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                include './connect_db.php';
                // Thêm bản ghi vào cơ sở dữ liệu
                $result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`) VALUES (NULL, '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "')");
                if (!$result) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
                       
                        
                    }
                }
                
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./create_user.php">Tạo tài khoản khác</a>
                    </div>
                <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h1>Chúc mừng</h1>
                        <h4>Bạn đã tạo thành công tài khoản <?= $_POST['username'] ?></h4>
                        <a href="./index.php">Danh sách tài khoản</a>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <div id="create_user" class="box-content">
                <h1>Tạo tài khoản</h1>
                <form action="./create_user.php?action=create" method="Post" autocomplete="off">
                    <label>Username</label></br>
                    <input type="text" name="username" value="" />
                    <br>
                    <label>Password</label></br>
                    <input type="password" name="password" value="" />
                    <br><br>
                    <input type="submit" value="Tạo tài khoản" />
                </form> 
            </div>
        <?php } ?>
    </body>
</html>
