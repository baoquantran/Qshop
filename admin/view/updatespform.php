<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/css/sssss.css">


    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Trang Admin </h1>
            <div style="display: flex;">
                <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data" style="margin-left: 9.7%;border: solid 1px blue;  height:320px; padding: 100px 228px; ">
                    <section style="margin-left: -70%;">
                        <h2 style="margin-top: -16.7%;">Update Sản Phẩm</h2>
                        <div>Danh mục: </div>
                        <select name="id_danhmuc" id="" style="padding: 4px 10px;">

                            <option value="0">Chọn danh mục</option>
                            <?php
                            $iddmcur = $spct[0]['id_danhmuc'];
                            if (isset($dsdm)) {
                                foreach ($dsdm as $dm) {
                                    if ($dm['id'] == $iddmcur)
                                        echo '<option value="' . $dm['id'] . '" selected>' . $dm['name'] . '</option>';
                                    else
                                        echo '<option value="' . $dm['id'] . '" >' . $dm['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <br>
                    
                        <div style="margin-top: 1%;">Tên sản phẩm: </div> <input type="text" name="tensp" placeholder="Tên sản phẩm" value="<?= $spct[0]['tensp'] ?>">
                    
                        <div>Tên khách hàng: </div><input type="text" name="tenkhachhang" placeholder="Tên khách hàng" value="<?= $spct[0]['tenkhachhang'] ?>">

                        <div>Giá: </div><input type="text" name="gia" placeholder=" Giá" value="<?= $spct[0]['gia'] ?>"><br>
                        <input type="hidden" name="id" value="<?= $spct[0]['id'] ?>">
                        <input type="submit" name="capnhat" value="Cập nhật" style="margin-top:2%; padding: 5px 30px; "></input>
                        
                        <div style="margin-left: 60%; margin-top:-51.7%">Upload ảnh: <input type="file" name="hinh"><br></div>

                        <div class="anhsp"  style="margin-left: 60%;margin-top:-1.1%; ">
                            <span>Ảnh sản phẩm: </span> <br>
                            <img src="<?= $spct[0]['img'] ?>" width="140px" alt="">
                            <?php
                            if (isset($uploadOk) && ($uploadOk == 0)) {
                                echo '<p style="color:red">Hình ảnh không hợp lệ</p>';
                            }

                            ?>
                        </div>
                    
                        
                        <!-- <input type="text" name="sua" placeholder=" Sửa">
                        <input type="submit" name="themmoi" value="Sửa"> -->
                    </section>
                </form>
                <div id="menu" >
                    <ul>
                        <li><a href="index.php?act=home">Shop</a></li>
                        <li><a href="index.php?act=danhmuc">Danh mục</a></li>
                        <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                        <li><a href="#">Tài khoản</a></li>
                        <li><a href="#">Đơn hàng</a></li>
                        <li><a href="index.php?act=thoat">Log out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="margin-top: 1%;">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Danh sách khách hàng</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>
                                    <th><em class="fa fa-cog"></em></th>
                                    <th class="hidden-xs">Mã số</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Giá</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($kq) && (count($kq) > 0)) {
                                    $i = 1;
                                    foreach ($kq as $item) {
                                        echo '<tr>
                                                <td align="center">
                                                <a class="btn btn-default"href="index.php?act=updatespform&id=' . $item['id'] . '"><em class="fa fa-pencil"></em></a>
                                                <a class="btn btn-danger" href="index.php?act=delsp&id=' . $item['id'] . '"><em class="fa fa-trash"></em></a></td>
                                                <td class="hidden-xs">' . $i . '</td>
                                                <td>' . $item['tenkhachhang'] . '</td>                       
                                                <td>'.$item['tensp'].'</td>
                                                <td><img src="' . $item['img'] . '" width="80px" ></td>
                                                <td>' . number_format($item['gia'], 0, ',', '.') . ' VNĐ' . '</td>  
                                                
                                                
                                            </tr>';
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">Trang 1 của 5 </div>
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>