
<?php
function add_sp($id_danhmuc,$tensp,$gia,$tenkhachhang,$img){
    $conn=connectdb();
    $sql = "INSERT INTO sanpham (id_danhmuc,tensp,gia,tenkhachhang,img)
    VALUES ('".$id_danhmuc."','".$tensp."','".$gia."','".$tenkhachhang."','".$img."')";
    // use exec() because no results are returned
    $conn->exec($sql); 
}

function delsp($id){
    $conn=connectdb();
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    // use exec() because no results are returned
    $conn->exec($sql);
}


function getall_sp($id_danhmuc=0,$kyw=""){
    $conn=connectdb();
    $sql="SELECT * FROM sanpham WHERE 1";

    if($id_danhmuc>0) $sql.=" AND id_danhmuc=".$id_danhmuc;
    if ($kyw!="") $sql.=" AND name like '%".$kyw."%'";
    $sql.=" order by id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getdetail($id=0){
    $conn=connectdb();
    $sql="SELECT * FROM imgdetail WHERE id=1 ";
    if($id==1) $sql.=" AND id=".$id;
    $sql.="order by id DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getonesp($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function get_product_special($special=0){
    $conn=connectdb();
    $sql="SELECT * FROM sanpham WHERE special=1 ";
    if($special==1) $sql.=" AND special=".$special;
    $sql.="order by id DESC LIMIT 2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getall_thongke(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT danhmuc.id_danhmuc as iddm, danhmuc.name as tendm, count(sanpham.id) as countsp,min(sanpham.gia) as mingia,max(sanpham.gia) as maxgia,round(avg(sanpham.gia),1) as avggia  FROM sanpham left join danhmuc on danhmuc.id_danhmuc=sanpham.id_danhmuc group by danhmuc.id_danhmuc order by danhmuc.id_danhmuc desc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function updatesp($id,$tensp,$img,$gia,$id_danhmuc,$tenkhachhang){
    $conn=connectdb();
    if ($img=="") {
        $sql = "UPDATE sanpham SET tensp='".$tensp."',gia='".$gia."',id_danhmuc='".$id_danhmuc."',tenkhachhang='".$tenkhachhang."' WHERE id=".$id;
    }else{
        $sql = "UPDATE sanpham SET tensp='".$tensp."',gia='".$gia."',id_danhmuc='".$id_danhmuc."',img='".$img."',tenkhachhang='".$tenkhachhang."' WHERE id=".$id;

    }
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
function showpro($ds){
    foreach ($ds as $sp) {
        if (!is_numeric($sp['gia'])) {
         $gia="0";
        }
         if($sp['gia']==0){
             $gia="Đang cập nhật";
         }else{
             if ($sp['giacu']>0) {
                 $gia= '<del>$'.$sp['giacu'].'</del>$'.$sp['gia'].'';
             }else{
                 $gia= '$'.$sp['gia'];
             }
         }
        echo' 
            <li class="product video">        
                <form action="index.php?act=addcart"  method="post" class="webpage" >
                
                    <a href="index.php?act=chitietsp&id='.$sp['id'].'">
                        <img src="./uploaded/'.$sp['img'].'" alt="Product" />
                        
                        <h5>'.$sp['tensp'].'</h5>
                        
                        <span class="price"> '.$gia.'</span>
                        <a id="addshop" style="margin-top:5%">
                            <input type="submit" name="addtocart" value="Add to cart"  title="Add To Cart">
                        </a>
                    </a>
                        
                        
                    <div class="wishlist-box">
                        <a href="#"><i class="fa fa-arrows-alt"></i></a>
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                    <div>
                    
                    <input type="hidden" value="'.$sp['id'].'" name="id">
                    <input type="hidden" value="'.$sp['tensp'].'" name="tensp">
                    <input type="hidden" value="'.$sp['img'].'" name="img">
                    <input type="hidden" value="'.$sp['gia'].'" name="gia">
                </div>
            </form>
                </li>
                  
            
        ';
    }
}
function showimg($ds){
    foreach ($ds as $sp) {
        
        
        echo' 
        
        <div class="item">
            
            <img src="./uploaded/'.$sp['detail_one'].' " />
           
        </div>

        <div class="item">
        <img src="./uploaded/'.$sp['detail_two'].' " />
        </div>

        <div class="item">
        <img src="./uploaded/'.$sp['detail_three'].'  "/>
        </div>
   
       
        ';
    }
}

   
  