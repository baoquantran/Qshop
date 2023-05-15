<?php
// trang
session_start();
ob_start();
if (isset($_SESSION['role'])&&($_SESSION['role']==1)) {
    

include "../model/connectdb.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
connectdb();

If(isset($_GET['act'])){
switch ($_GET['act']) {
    case 'trangchuadmin':
        include "../admin/view/trangchuadmin.php";
        break;
    case 'danhmuc':
        $kq=getall_dm();
        include "../admin/view/danhmuc.php";
    case 'thongke':
        $listthongke=getall_thongke();


        include "view/thongke.php";
       
    break;
    case 'adddm':
        if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
            $name=$_POST['name'];
            themdm($name);
        }
        $kq=getall_dm();
        include "../admin/view/danhmuc.php";
       
        break;
   
    case 'updatedmforms':  
        // lấy 1 record đúng với id truyền 
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $kqone=getonedm($id);
             // cần ds danh mục
            $kq=getall_dm();
            include "../admin/view/updatedmforms.php";     
           }
        if (isset($_POST['id'])) {
            $id=$_POST['id'];
            $name=$_POST['name'];
            updatedm($id,$name);
             // cần ds danh mục
            $kq=getall_dm();
            include "../admin/view/danhmucc.php";     
           }
        break;
    case 'deldm':  
       if (isset($_GET['id'])) {
        $id=$_GET['id'];
        deldm($id);
       }
       $kq=getall_dm();
       include "../admin/view/danhmucc.php";
        break;


        // sản phẩm
    case 'sanpham':
         // lấy dsdm
            $dsdm=getall_dm();
           
        // load sp
            $kq=getall_sp();
            include "../admin/view/sanpham.php";
            break;
    
   
    case 'delsp':
                //ktra ton tai va co phai so hay ko
                if(isset($_GET['id']) && is_numeric($_GET['id'])){
                    $id=$_GET['id'];
                    delsp($id);
                    
                }
                $dsdm=getall_dm();
                $kq=getall_sp();
                include "../admin/view/sanpham.php";
                break;
    
    case 'sanpham_add':
            if((isset($_POST['themmoi']))&&($_POST['themmoi'])){
                $tensp=$_POST['tensp'];
                $gia=$_POST['gia']; 
                $tenkhachhang=$_POST['tenkhachhang']; 
                $id_danhmuc=$_POST['id_danhmuc'] ; 

                $target_dir = "../uploaded/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if($uploadOk == 1) {
                    add_sp($id_danhmuc,$tensp,$gia,$tenkhachhang,$img);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }
        
            }
            $dsdm=getall_dm();
            $kq=getall_sp();
            include "../admin/view/sanpham.php";
            break;
    
    case 'thoat':
        if (isset($_SESSION['role'])) unset($_SESSION['role']);
        header('location:login-user.php');
        break;
    default:
        include "../admin/view/trangchuadmin.php";
        break;
    
}}else{
    include "../admin/view/trangchuadmin.php";
}

}else {
    header('location: login-user.php');
}
?>
