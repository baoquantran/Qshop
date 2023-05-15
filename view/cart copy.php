<?php include('./db.php'); ?>
<?php session_start(); ?>
<?php //print_r($_SESSION['cart']); 
?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
$jim = new Data();
$countproduct = $jim->countproduct();

$cat = $jim->getcategory();
class Data
{
    function countproduct()
    {
        $count = 0;
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach ($cart as $row) :
            if ($row['qty'] != 0) {
                $count = $count + 1;
            }
        endforeach;

        return $count;
    }
    function getcategory()
    {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM category");
        return $result;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ hàng</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        .boxcenter {
            width: 80%;
            margin-left: 3%;
        }

        .boxsp {
            float: left;
            width: 30%;
            margin: 1.5%;
            text-align: center;
        }

        .boxsp img {
            width: 100%;
        }



        .boxsp p {
            font-size: 14pt;
            font-weight: bold;
        }

        th {
            background-color: #CCC;
        }

        table {
            width: 100%;
        }

        th,
        td {
            border: 1px #999 solid;

        }
    </style>
    <link href='//hstatic.net/0/0/global/design/plugins/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' type='text/css' media='all' />
    <link href='//theme.hstatic.net/1000012173/1000908251/14/master.scss.min.css?v=53' rel='stylesheet' type='text/css' media='all' />
    <link href="//theme.hstatic.net/1000012173/1000908251/14/slicknav-v1.5.css?v=53" rel="preload stylesheet" as="style" type="text/css">
    <link href="//theme.hstatic.net/1000012173/1000908251/14/styles-themes.scss.css?v=53" rel="preload stylesheet" as="style" type="text/css">
    <script src='//hstatic.net/0/0/global/design/haravan/h_library/js/jquery-1.11.3.min.js' type='text/javascript'></script>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/chitiet.css">
</head>
<div class="mainBreadcrumb  paralax_bkgTop">
    <div class="container">
        <div class="wrap-flex">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="breadcrumd_theme">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li itemprop="itemListElement">
                            <a href="../index.php?act=home" target="_self">
                                <span itemprop="name">Trang chủ Themes</span>
                            </a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement">
                            <a href="#" target="_self">
                                <span itemprop="name" style="position: 0.7; color: #C0C0C0 ;">cart</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                        <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="name"> </span>
                            <meta itemprop="position" content="3" />
                        </li>
                    </ol>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <div class="searchpage-top clearfix">

                    <form class="searchpage-form" action="/search" method="get">

                        <input type="hidden" name="type" value="product">
                        <input autocomplete="off" class="input-search" id="search-box" name="q" placeholder="Tìm giao diện..." size="35" type="text">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="circles-background"></div>
</div>
<link rel="stylesheet" href="css/cart.css">
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-responsive">
                    <?php

                    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                        echo ' <table >        
                                                    <tr >
                                                        <th class="text-center">STT</th>
                                                        <th class="text-center">Tên sản phẩm</th>
                                                       
                                                        <th class="text-center">Đơn giá</th>
                                                        <th class="text-center">Số lượng</th>
                                                        <th class="text-center">Thành tiền</th>
                                                        <th class="text-center">Hành động</th>
                                                    </tr>';
                            $i = 0;
                            $tong = 0;
                            foreach ($_SESSION['giohang'] as $item) {
                                $tt = $item[3] * $item[4];
                                $thue = (12 / 100) * $tt;
                                $tong += $tt - $thue;

                                echo ' <tr>
                                                                <td class="text-center">' . ($i + 1) . '</td>
                                                                <td class="text-center">' . $item[1] . '</td>
                                                                
                                                                <td class="text-center">' . $item[3] . '</td>
                                                                <td class="text-center">' . $item[4] . '</td>
                                                                <td class="text-center">' . number_format($tt, 2) . '</td>
                                                                <td class="text-center"><a href="../index.php?act=delcart&i=' . $i . '">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                              </svg></a></td>
                                                            </tr>';
                            $i++;
                        }
                        echo '<tr>
                                                        <td colspan="3"></td>
                                                            <td class="text-right"><strong>VAT (12%)&emsp;</strong></td>
                                                            <td class="text-left">&emsp;<font style="color:#a94442"><strong>' . number_format($thue, 2) . '</strong></font></td>
                                                            <td></td>
                                                        <tr>
                                                        <td colspan="3"></td>
                                                            <td class="text-right"><strong>TOTAL&emsp;</td>
                                                            <td class="text-left">&emsp;<font style="color:red"><strong>' . number_format($tong, 2) . '</strong></font></td>
                                                            <td></td>
                                                        </tr>
                                                        
                                                        
                                                        </tr>';
                        echo '</table>';
                    }
                    ?>
                    <?php ?>
                   
                </table>
                <br>
                <div class="pull-right">
                    <a href="../cart/data.php?q=emptycart" class="btn btn-danger btn-lg">Empty Cart!!!</a>
                    <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                </div>

            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
</section>
<!--/form-->


<?php include('./modal.php'); ?>