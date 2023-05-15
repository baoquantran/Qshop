<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/danhmuc.css">
    <title>cập nhật danh mục</title>
</head>
<style>
    

    header {
        margin-bottom: 3%;
    }

    th {
        background-color: #CCC;
    }

    table {
        width: 50%;
        margin-top: 3%;
        margin-left: 4%;
    }

    th,
    td {
        border: 1px #999 solid;
        padding: 10px 25px;
       
    }

    input {
        padding: 8px 25px;
    }

    .information {
        display: none;
    }

    #footer {
        display: none;
    }

    p {
        display: none;
    }

    hr {
        display: none;
    }
    h2{
        font-weight: 800;
        margin-bottom: 2%;
        font-size: 22px;
    }
    #hd{
        display: none;
    }
</style>

<body>
    <header>

        <h2>ADMIN - WEBSITE</h2>
        
        <nav>
            <a href="index.php?act=home">Trang chủ</a> |
            <a href="index.php?act=danhmuc">Danh mục</a> |
            <a href="#">Sản phẩm</a> |
            <a href="#">Tài khoản</a> |
            <a href="#">Đơn hàng</a> |
            <a href="index.php?act=thoat">Log out</a>
        </nav>
    </header>

    <section>

        <div class="main">
            <h2>Danh mục</h2>
            <?php
                // echo var_dump($kqone);
            ?>
            <form action="index.php?act=updatedmform" method="post">
                <input type="text" name="name" id="" value="<?=$kqone[0]['name']?>">
                <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
                <input type="submit" name="capnhat" value="cập nhật">
            </form>
            </div>
            <table style="border-collapse:collapse; ">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Ưu tiên</th>
                    <th>Hiển thị</th>
                    <th>Hành động</th>
                </tr>
                <?php
                // var_dump($kq);
                ?>
                <?php
                if (isset($kq)&&(count($kq)>0)) {
                    $i=1;
                    foreach ($kq as $dm) {
                        echo'  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$dm['name'].'</td>
                                    <td>'.$dm['uutien'].'</td>
                                    <td>'.$dm['hienthi'].'</td>
                                    <td><a href="index.php?act=updatedmform&id='.$dm['id'].'">Sửa</a> | <a href="index.php?act=deldm&id='.$dm['id'].'">Xóa</a></td>
                                </tr>';
                                $i++;
                    }
                }
                ?>
              
            </table>
        </div>
    </section>
    <div class="saiki"> &copy; 2022 - Saiki</div>

</body>

</html>