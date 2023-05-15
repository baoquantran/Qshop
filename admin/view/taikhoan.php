<!DOCTYPE html>


<html>
    <head>
        <title>Quản lý thành viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include '../model/connect_db.php';
        $result = mysqli_query($con, "SELECT * FROM user");
        mysqli_close($con);
        ?>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            #user-info{
                border: 1px solid #ccc;
                width: 700px;
                margin: 0 auto;
                padding: 25px;
            }
            #user-info table{
                margin: 10px auto 0 auto;
                text-align: center;
            }
            #user-info h1{
                text-align: center;
            }
        </style>
        <div id="user-info">
            <h1>Danh sách tài khoản</h1>
            <a href="./create_user.php">Tạo tài khoản mới</a>
            <table id = "user-listing" style="width: 700px;">
                <tr>
                    <td>Username</td>
                    <td>Trạng thái</td>
                    <td>Sửa</td>
                    <td>Xóa</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['status'] == 1 ? "Kích hoạt" : "Block" ?></td>
                        <td><a href="./edit_user.php?id=<?= $row['id'] ?>">Sửa</a></td>
                        <td><a href="./delete_user.php?id=<?= $row['id'] ?>">Xóa</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
