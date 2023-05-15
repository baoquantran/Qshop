<?php 
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
ini_set('display_errors', 1);
$jim = new Shopping();
$q = $_GET['q'];
if(!isset($_SESSION['giohang'])){
    $_SESSION['giohang'] = array(); 
    $_SESSION['id'] = 0;
}
if($q == 'addtocart'){
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $jim->addtocart($ten,$gia,$soluong);
}else if($q == 'emptycart'){
    unset($_SESSION['giohang']); 
    unset($_SESSION['id']); 
    header("location:../index.php");
}else if($q == 'removefromcart'){
    $id = $_GET['id'];
    $jim->removefromcart($id);
}else if($q == 'updatecart'){
    $id = $_GET['id'];
    $soluong = $_POST['soluong'];
    $tensp = $_GET['tensp'];
    $jim->updatecart($id,$soluong,$tensp);
}else if($q == 'countcart'){
    $jim->countcart();
}else if($q == 'countorders'){
    $jim->countorder();
}else if($q == 'countproducts'){
    $jim->countproducts();
}else if($q == 'countcategory'){
    $jim->countcategory();
}else if($q == 'checkout'){
    $jim->checkout();
}else if($q == 'verify'){
    $jim->verify();   
}
/*$_SESSION['cart'];
$product = 'product101';
$price ='300';
$jim->addtocart($product, $price);*/
class Shopping {
    private $conn;
   public function __construct() {
    include('../view/db.php');
    $this->conn = $conn;
    }
    function addtocart($tensp, $gia, $soluong){
        $giohang = array(
            'id' => $_SESSION['id'],
            'tensp' => $tensp,
            'gia' => $gia,
            'soluong' => $soluong
        );
        if(!isset($_SESSION['giohang'][$tensp]))
            $_SESSION['giohang'][$tensp]= $giohang;
        else
             $_SESSION['giohang'][$tensp]['soluong'] +=1; 
        $_SESSION['id'] = $_SESSION['id'] + 1;
        
        return true;
    }
    
    function removefromcart($id){        
        $_SESSION['giohang'][$id] = 0;
        //print_r($_SESSION['cart'][$id]['qty']);
        header("location:../view/cart.php");
    }
    
    function updatecart($id,$qty,$tensp){
        $_SESSION['giohang'][$tensp]['soluong'] = $qty;
       
        
       header("location:../view/cart.php");
    }
    
    function countcart(){
        $count = 0;
        $giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang']:array();
        foreach($giohang as $row):
            if($row['soluong']!=0){
                $count = $count + $row['soluong'];
            }            
        endforeach;

        echo $count;   
    }
    function countorder(){
        $q = "select * from asm.order where status='unconfirmed'";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countproducts(){
        $q = "select * from asm.sanpham";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countcategory(){
        $q = "select * from asm.category";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function checkout(){
        include('./view/db.php');
        $fname = $_POST['fname'];   
        $lname = $_POST['lname'];   
        $contact = $_POST['contact'];   
        $email = $_POST['email'];   
        $address = $_POST['address'];   
        $fullname = $fname.' '.$lname;
        $date = date('m/d/y h:i:s A');
        $item = '';
        $username=$_POST['username'];
        foreach($_SESSION['giohang'] as $row):
            if(count($_SESSION['giohang'])  != 0){
                $product = '('.$row[4].') '.$row[1];
                $item = $product.', '.$item.'';
                
                $tt= $row[3] * $row[4];
                $amount=$amount+$tt;
            } 
        endforeach;
       
        echo $q = "INSERT INTO asm.order VALUES (NULL, '$fullname', '$contact', '$address', '$email', '$item', '$amount', 'unconfirmed', '$date', '','$username')";

        mysqli_query($this->conn,$q);
        
        unset($_SESSION['giohang']); 
        header("location:../view/success.php");
    }
    
    function verify(){
        $username = $_POST['username'];   
        $password = $_POST['password'];   
        
        $q = "SELECT * from asm.user where username='$username' and password='$password'";
        $result = mysqli_query($this->conn,$q);
        $_SESSION['login']='yes';
        echo mysqli_num_rows($result);
    }
}
