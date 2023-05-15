<?php
session_start();
ob_start();

include('dbconnection.php');
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:../logout.php');
} else {

    // for deleting user
   if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $msg = mysqli_query($con, "delete from danhmuc where id='$id'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    } 
?>
<style>
#sub>li>a:hover{
   
   background-color: transparent;
}
#sub>li>a:hover{
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

        <title>Admin | Danh mục</title>
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

                        <li style="margin-top: 10%;"><a class="../logout.php" href="../logout.php">Đăng Xuất</a></li>
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
                                        <span >Quản Lý user</span></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="quanlycmt.php">
                                    <i class="bi bi-chat-left-text"></i>     
                                        <span >Bình Luận</span>
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
            <section id="main-content">
                <section class="wrapper">
                    <h3><i class="fa fa-angle-right"></i> Quản lý danh mục</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-panel">
                                <table class="table table-striped table-advance table-hover">
                                    <h4><i class="fa fa-angle-right"></i> Danh mục&nbsp; <a href="add-user.php"><svg xmlns="http://www.w3.org/2000/svg" style="color:aqua;" width="13" height="13" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg></a></h4>

                                    <hr>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên danh mục</th>
                                            <th>Ưu tiên</th>
                                            <th>Hiển thị</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ret = mysqli_query($con, "select * from danhmuc");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) { ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>

                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['uutien']; ?></td>
                                                <td><?php echo $row['hienthi']; ?></td>
                                                <td>

                                                        <a href="updatedmforms.php?id=<?php echo $row['id']; ?>">
                                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                        <a href="danhmucc.php?id=<?php echo $row['id']; ?>">
                                                        <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                                       
                                                </td>
                                            </tr>
                                        <?php $cnt = $cnt + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
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