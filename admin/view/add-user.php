


<?php
session_start();
include('dbconnection.php');
//Checking session is valid or not
$_SESSION['msg']="";
if (strlen($_SESSION['id'] == 0)) {
    header('location:../logout.php');
} else {

    // for updating user info    
    if (isset($_POST['Submit'])) {

        $username = $_POST['username'];

        $password = $_POST['password'];
        $role = $_POST['role'];


        $id = intval($_GET['id']);
        $query = mysqli_query($con, "update user set username='$username' ,  password='$password', role='$role' where id='$id'");
        $_SESSION['msg'] = "Profile Updated successfully";
    }
    if (isset($_POST['quaylai'])) {
        header('location:manage-users.php');
    }
?>

<script type="text/javascript">
    function validateForm() {
        var a = document.forms["add-sp"]["tensp"].value;
        if (a == null || a == "") {
            alert("Pls. Enter the product name");
            return false;
        }

        var c = document.forms["add-sp"]["gia"].value;
        if (c == null || c == "") {
            alert("Pls. enter the price");
            return false;
        }
        var d = document.forms["add-sp"]["danhmuc"].value;
        if (d == null || d == "") {
            alert("Pls Enter the oroduct category");
            return false;
        }
        var e = document.forms["add-sp"]["image"].value;
        if (e == null || e == "") {
            alert("Pls. browse an image");
            return false;
        }
        /*if (c.which!=8 && c.which!=0 && (c.which<48 || c.which>57))
          {
          alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
          return false;
          }
        if (b.which!=8 && b.which!=0 && (b.which<48 || b.which>57))
          {
          alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
          return false;
          }*/
    }
</script>

<style type="text/css">
    
    .ed {
        border-style: solid;
        border-width: thin;
        border-color: #00CCFF;
        padding: 5px;
        margin-bottom: 4px;
    }

    #button1 {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        border-style: solid;
        border-width: thin;
        border-color: #00CCFF;
        padding: 5px;
        background-color: #00CCFF;
        height: 34px;
    }

    </style><SCRIPT language=Javascript>function isNumberKey(evt) {
        var charCode=(evt.which) ? evt.which: event.keyCode 
        if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;

        return true;
    }

    //
    
</SCRIPT>




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
                    <h3><i class="fa fa-angle-right"></i> Admin's Information</h3>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="content-panel">
                                    <form action="add-user-s.php" method="post" enctype="multipart/form-data" class="form-horizontal style-form" name="add-sp"  onsubmit="return validateForm()">
                                        <p style="color:#F00"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">username </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" class="ed"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group" >
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px; ">password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password"id="qty" class="ed" onkeypress="return isNumberKey(event)" /><br >
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px; ">role</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="role"id="qty" class="ed" value="0"/><br >
                                            </div>
                                        </div>
                                        
                                          
                                        <div style="margin-left:100px;margin-top: 5%;">
                                            <input type="submit" name="Submit" value="save" class="btn btn-theme">
                                            <input type="submit" name="quaylai" value="Quay lại" class="btn btn-theme">
                                        </div>
                               

                                    </form>
                                    </div>
                            </div>
                        </div>
                    </section>
                </section>  
        </section>        
</body>

</html>
<?php } ?>