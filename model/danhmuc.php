<?php

function themdm($name){
    $conn=connectdb();
    $sql = "INSERT INTO danhmuc (name) VALUES ('".$name."')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function updatedm($id,$name){
    $conn=connectdb();
    $sql = "UPDATE danhmuc SET name='".$name."' WHERE id=".$id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}

function deldm($id){
    $conn=connectdb();
    $sql = "DELETE FROM danhmuc WHERE id=".$id;
    // use exec() because no results are returned
    $conn->exec($sql);
  
}


function getonedm($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM danhmuc WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}



function getall_dm($hienthi=0){
    $conn=connectdb();
    $sql="SELECT * FROM danhmuc WHERE hienthi=1 ";
    if($hienthi==1) $sql.=" AND hienthi=".$hienthi;
    $sql.="order by id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

?>

