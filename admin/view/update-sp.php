<?php
session_start();
include('../dbconnection.php');
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:../logout.php');
} else {

    // for updating user info    
    if (isset($_POST['Submit'])) {

        $tensp = $_POST['tensp'];
        $img = $_POST['img'];
        $size = $_POST['size'];

        $gia = $_POST['gia'];
        $special = $_POST['special'];
        $id_danhmuc = $_POST['id_danhmuc'];


        $id = intval($_GET['id']);
        $query = mysqli_query($con, "update sanpham set tensp='$tensp', img='$img' , size='$size', gia='$gia', special='$special', id_danhmuc='$id_danhmuc' where id='$id'");
        $_SESSION['msg'] = "Profile Updated successfully";
    }
    if (isset($_POST['quaylai'])) {
        header('location:all-sp.php');
    }
?>
    <style>
        #sub>li>a:hover {

            background-color: transparent;
        }

        #sub>li>a:hover {
            background-color: transparent;
        }
    </style>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Admin | Update Profile</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    </head>

    <body>

        <section id="container">
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <a href="#" class="logo"><b>Admin Dashboard</b></a>
                <div class="nav notify-row" id="top_menu">



                    </ul>
                </div>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li style="margin-top: 10%;"><a class="logout" href="../logout.php">Đăng Xuất</a></li>
                    </ul>
                </div>
            </header>
            <aside>
                <div id="sidebar" class="nav-collapse ">
                    <ul class="sidebar-menu" id="nav-accordion">

                        <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                        <h5 class="centered"><?php echo $_SESSION['login']; ?></h5>

                        <li class="sub-menu">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Quản Lý Người DÙng</span>
                            </a>
                            <ul class="submenu" id="sub">
                                <li>
                                    <a href="manage-users.php">
                                        <i class="bi bi-person"></i>
                                        <span>Quản Lý user</span></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="quanlycmt.php">
                                        <i class="bi bi-chat-left-text"></i>
                                        <span>Bình Luận</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="all-sp.php">
                                <i class="bi bi-boxes"></i>
                                <span>Tất cả sản phẩm</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="order.php">
                                <i class="bi bi-coin"></i>
                                <span>Quản lý Đơn hàng</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="danhmucc.php">
                                <i class="bi bi-bookmark-check"></i>
                                <span>Quản lý Danh mục</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="thongke.php">
                                <i class="bi bi-graph-down-arrow"></i>
                                <span>Phân tích dữ liệu</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="danhmucc.php">
                                <i class="bi bi-gear"></i>
                                <span>Cài đặt</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <?php $ret = mysqli_query($con, "select * from sanpham where id='" . $_GET['id'] . "'");
            while ($row = mysqli_fetch_array($ret)) { ?>
                <section id="main-content">
                    <section class="wrapper">
                        <h3><i class="fa fa-angle-right"></i> <?php echo $row['tensp']; ?></h3>

                        <div class="row">



                            <div class="col-md-12">
                                <div class="content-panel">
                                    <p align="center" style="color:#F00;"><?php echo @$_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                                    <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                        <p style="color:#F00"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Tên sản phẩm </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tensp" value="<?php echo $row['tensp']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="sua">
                                                    <?php
                                                    if (isset($_POST['img']) && ($_POST['img'])) {


                                                        echo '<input type="file" class="form-control" name="img" id="qty" class="ed" onkeypress="return isNumberKey(event)" /><br >';
                                                    } else {

                                                        echo '
                                                            
                                                                <img src="../uploaded/' . $row['img'] . '" width="100px" >
                                                                <br><br>
                                                            
                                                                <input type="submit" value="sửa"  name="img" id="sua" class="btn btn-theme">
                                                                <style>
                                                                #sua {
                                                                    transition: .5s ease;
                                                                    opacity: 0;
                                                                    position: absolute;
                                                                    transform: translate(-50%, -50%);
                                                                    -ms-transform: translate(-50%, -50%);
                                                                    top: 50%;
                                                                    left: 7.5%;
                                                                }
        
                                                                .sua:hover img {
                                                                    transition: .5s ease;
                                                                    opacity: 0.5;
                                                                }
        
                                                                .sua:hover #sua {
                                                                    color: #0099CC;
                                                                    background: #f12711;
                                                                    background: -webkit-linear-gradient(to right, #f12711, #f5af19);
                                                                    background: linear-gradient(to right, #f12711, #f5af19);
                                                                    opacity: 1;
                                                                }
        
                                                                .sua {
                                                                    width: 10%;
                                                                }
                                                            </style>
                                                            ';
                                                    }
                                                   
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">kích thước</label>
                                            <div class="col-sm-10">
                                                <select name="size" class="ed" style="border: none; margin-top:0.5%">

                                                    <?php

                                                    $r = mysqli_query($con, "select * from size");
                                                    while ($row = mysqli_fetch_array($r)) {
                                                        $selected = ($size == $row['id']) ? " selected='selected'" : "";
                                                        echo '<option ' . $selected . '>' . $row['id'] . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Giá</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="gia" value="<?php
                                                                                                            $r = mysqli_query($con, "select * from sanpham");
                                                                                                            $row = mysqli_fetch_array($r);
                                                                                                            echo $row['gia']; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Danh mục</label>
                                            <div class="col-sm-10">
                                                <select name="id_danhmuc" class="ed" style="border: none; margin-top:0.5%">

                                                    <?php

                                                    $r = mysqli_query($con, "select * from danhmuc");
                                                    while ($row = mysqli_fetch_array($r)) :
                                                        echo '<option>' . $row['id'] . '</option>';

                                                    endwhile;

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">special</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="special" value="<?php
                                                                                                                $r = mysqli_query($con, "select * from sanpham");
                                                                                                                $row = mysqli_fetch_array($r);
                                                                                                                echo $row['special']; ?>">
                                            </div>
                                        </div>

                                        <div style="margin-left:100px;">
                                            <input type="submit" name="Submit" value="Update" class="btn btn-theme">
                                            <input type="submit" name="quaylai" value="Quay lại" class="btn btn-theme">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>
                </section>
        </section>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script>
            $(function() {
                $('select.styled').customSelect();
            });
        </script>

    </body>

    </html>
<?php } ?>