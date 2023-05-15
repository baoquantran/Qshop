<?php include('db.php'); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
            global $conn;
                $q = "SELECT * FROM asm.order where status='unconfirmed' order by dateOrdered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getdeliveredorders(){
            global $conn;
                $q = "SELECT * FROM asm.order where status='delivered' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getpaidorders(){
            global $conn;
                $q = "SELECT * FROM asm.order where status='confirmed' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        
        function getorder(){
            global $conn;
            $id = $_GET['id'];
            $q = "SELECT * FROM asm.order where id=$id";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        
        function deliver(){
            global $conn;
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE asm.order set dateDelivered='$date', status='delivered' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        function paid(){
            global $conn;
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE asm.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        
       
        function delete(){
            global $conn;
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM asm.$table where id=$id";
            mysqli_query($conn,"DELETE FROM asm.$table where id=$id");
            return true;
        }
        
      
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

    <title>Admin | Danh mục</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/facebox.css">
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
                    <h5 class="centered">admin</h5>

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
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Quản lý Đơn hàng</h3>
                <div class="row">




                    <hr>
                    <?php $item = $jim->getorder(); ?>
                        <?php while($row = mysqli_fetch_array($item)): ?>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ORDER INFORMATION</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                 
                                    <tr>
                                        <td class="text-right"><strong>Customer :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['name'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Username :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['username'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Contact :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['contact'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Address :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['address'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Email :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['email'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Date Ordered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['dateOrdered'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Amount :</strong></td>
                                        <td class="text-danger"><strong><?php echo $row['amount'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?></strong></td>
                                    </tr>
                                    
                                    <tr>
                                    <?php if($p == 'unconfirmed'){ ?>
                                        <td class="text-right" colspan="2"><a href="order.php?p=deliver&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Deliver</a></td>
                                    <?php }else if($p == 'delivered'){?>
                                        <td class="text-right" colspan="2"><a href="order.php?p=paid&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Paid</a></td>
                                    <?php } ?>
                                        
                                    </tr>
                                </table>
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
                </div>
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