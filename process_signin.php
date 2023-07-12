<?php
session_start();
require 'admin/connect.php';


$gmail = $_POST['gmail'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
}else {
    $remember = false;
}


//select password from database
$sql = "select count(*) from customers
where password = '$password' and email = '$gmail' ";
$sql_query = mysqli_query($connect,$sql);
$result_password = mysqli_fetch_array($sql_query)['count(*)'];

if($result_password !=1){
    header('location:signin.php?error=sai ten dang nhap hoac mat khau');
    exit();
}else{

    
    if($remember){
        $token = uniqid('user_',true) . "._" . time();
        $sql = "update customers
        set 
        token = '$token'
        where
        email = '$gmail'";
        $sql_query = mysqli_query($connect,$sql);
        setcookie("token",$token,time()+60*60*24*30);
    
    }
    $sql_cookie = "select * from customers
    where email = '$gmail'";
    $sql_query = mysqli_query($connect,$sql_cookie);
    $each = mysqli_fetch_array($sql_query);
    //$id = mysqli_fetch_array($sql_query)['id'];
    $_SESSION['name'] = $each['name'];
    $_SESSION['id'] = $each['id'];
    
    header('location:user.php?Dang nhap thanh cong');

}




