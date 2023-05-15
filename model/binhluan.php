<?php
function thembl($username,$binhluan,$id_user,$id_sanpham){
    $conn=connectdb();
    $sql = "INSERT INTO cmt (username,binhluan,id_user,id_sanpham)
    VALUES ('$username','$binhluan','$id_user','$id_sanpham')";
    // use exec() because no results are returned
    $conn->exec($sql); 
}
function showbl($role=0){
    $conn=connectdb();
    $sql="SELECT * FROM cmt WHERE role=1 ";
    if($role==1) $sql.=" AND special=".$role;
    $sql.="order by id DESC LIMIT 10";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>