<?php

// function themdm($name){
//     $conn=connectdb();
//     $sql = "INSERT INTO danhmuc (name) VALUES ('".$name."')";
//     // use exec() because no results are returned
//     $conn->exec($sql);
// }

// function updatedm($id,$name){
//     $conn=connectdb();
//     $sql = "UPDATE danhmuc SET name='".$name."' WHERE id=".$id;
//     // Prepare statement
//     $stmt = $conn->prepare($sql);
//     // execute the query
//     $stmt->execute();
// }

// function deldm($id){
//     $conn=connectdb();
//     $sql = "DELETE FROM danhmuc WHERE id=".$id;
//     // use exec() because no results are returned
//     $conn->exec($sql);
  
// }


// function getonedm($id){
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM danhmuc WHERE id=".$id);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;
// }


function checkuser($username,$password){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if (count($kq)>0) return $kq[0]['role'];
    else return 0;
}
function getuserinfo($username,$password){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function user($username,$password,$address){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND password='".$password."' AND address='".$address."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

// 
function userorder($username){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username='".$username."' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if (count($kq)>0) return $kq[0]['role'];
    else return 0;
}
?>


