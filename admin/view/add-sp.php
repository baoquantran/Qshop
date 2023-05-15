


<?php
session_start();
include('dbconnection.php');
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:../logout.php');
} else {

    // for updating user info    
    if (isset($_POST['Submit'])) {
        $file=$_FILES['img']['tmp_name'];
        $image= addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $image_name= addslashes($_FILES['img']['name']);
        $image_size= getimagesize($_FILES['img']['tmp_name']);

		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
            move_uploaded_file($_FILES["img"]["tmp_name"],"../uploaded/" . $_FILES["img"]["name"]);    
        $tensp = $_POST['tensp'];
        $img=$_FILES["img"]["name"];
        $size = $_POST['size'];

        $giacu = $_POST['giacu'];
        $gia = $_POST['gia'];
        $special = $_POST['special'];
        $id_danhmuc = $_POST['id_danhmuc'];


        
        $query = mysqli_query($con, "INSERT INTO sanpham (tensp, img, size, giacu, gia, special, id_danhmuc ) VALUES ('$tensp','$img','$size','$giacu','$gia','$special','$id_danhmuc')");
        $_SESSION['msg'] = "Profile Updated successfully";
    }
    if (isset($_POST['quaylai'])) {
        header('location:all-sp.php');
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
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form" name="add-sp"  onsubmit="return validateForm()">
                                        <p style="color:#F00"><?php echo @$_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Tên sản phẩm </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tensp" class="ed"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Ảnh </label>
                                            <div class="col-sm-10">
                                            <input type="file" class="form-control" name="img" id="qty" class="ed" onkeypress="return isNumberKey(event)" /><br >
                                            </div>
                                        </div>
                                        <br>
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
                                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Giá cũ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="giacu" value="<?php
                                                                                                            $r = mysqli_query($con, "select * from sanpham");
                                                                                                            $row = mysqli_fetch_array($r);
                                                                                                            echo $row['giacu']; ?>">
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