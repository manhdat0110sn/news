<?php
session_start();
require 'admin/connect.php';

$gmail = $_POST['gmail'];
$password = $_POST['password'];

// select name from database
$sql = "select count(*) from customers
where email = '$gmail' ";
$sql_query = mysqli_query($connect,$sql);
$result = mysqli_fetch_array($sql_query)['count(*)'];

//select password from database
$sql = "select count(*) from customers
where password = '$password' and email = '$gmail' ";
$sql_query = mysqli_query($connect,$sql);
$result_password = mysqli_fetch_array($sql_query)['count(*)'];

if($result != 1 or $result_password !=1){
    header('location:signin.php?error=sai ten dang nhap hoac mat khau');
    exit();
}

$sql = "select * from customers
where email = '$gmail'";
$sql_query = mysqli_query($connect,$sql);
$result_name = mysqli_fetch_array($sql_query)['name'];
$result_id = mysqli_fetch_array($sql_query)['id'];

$_SESSION['name'] = $result_name;
$_SESSION['id'] = $result_id;

header('location:user.php?Dang nhap thanh cong');


