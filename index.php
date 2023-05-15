<?php
session_start();



ob_start();
// 
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
// 

include "./model/connectdb.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
$dsdm = getall_dm();
include "./model/user.php";
connectdb();
$sphome1 = getall_sp(0, "");
$spdacbiet = get_product_special();
$dsdetail = getdetail();
include "view/header.php";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'shop':
            include "view/shop.php";
            break;
        case 'about':
            include "view/about.php";
            break;
        case 'contact':
            include "view/contact.php";
            break;
        case 'blog':
            include "view/blog.php";
            break;
        case 'blog-post':
            include "view/blog-post.php";
            break;
        case 'checkout':
            include "view/checkout.php";
            break;
        case 'cart':
            include "view/cart.php";
            break;
        case '404':
            include "view/404.php";
            break;
        case 'alltheme':
            include "view/allsp.php";
            break;
        case 'banggia':
            include "view/banggia.php";
            break;
        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $kq = getonesp($id);
            }
            include "view/chitietsp.php";
            break;

        case 'addcart':
            //lấy dữ liệu từ form để lưu vào giỏ hàng
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];


                if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }

                $fg = 0;
                // kt sp có tồn tại trong giỏ hàng chưa nếu có cập nhập sl
                $i = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[1] === $tensp) {
                        $slnew = $sl + $item[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }

                // ngược lại tạo add mới sp vào giỏ hàng

                // khởi tạo mảng con trc khi đưa vào giỏ hàng
                if ($fg == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl);
                    $_SESSION['giohang'][] = $item;
                }
                header('location: index.php?act=cart');
            }

            // 
            // view giỏ hàng lên
            // include "view/viewcart.php";     
            break;
        case 'delcart':
            if (isset($_GET['i']) && ($_GET['i'] >= 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
                }
            } else {
                // xóa all
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }

            // 2 trường hợp chuyển trang còn sp 
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location: index.php?act=cart');
            } else {
                // và hết sp
                header('location: index.php');
            }
            break;
        case 'cart':
            header('location: ./view/cart.php');
            break;
        case 'home':
            header('location: index.php');
            break;

        case 'product':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
            }

            $dssp = $sphome1;

            include "view/product.php";
            break;
        case 'userinfo':
            include "view/userinfo.php";
            break;
       
        case 'dangnhap':
            
            include "view/login.php";
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $kq = getuserinfo($username, $password);
                $role = $kq[0]['role'];
                if ($role == 1) {
                    $_SESSION['role'] = $role;
                    header('location:admin/view/all-sp.php');
                } else {
                    $_SESSION['role'] = $role;
                    $_SESSION['id'] = $kq[0]['id'];
                    $_SESSION['username'] = $kq[0]['username'];
                    header('location:index.php');
                    break;
                }
            }
        case 'dangki':

            include "view/dangki.php";
            break;
        case 'xoa':
            unset($_SESSION['giohang']);
        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            header('location:index.php');
            break;
        case 'logout':
           
            unset($_SESSION['id']);
            session_destroy();
            header("Location: index.php");
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
