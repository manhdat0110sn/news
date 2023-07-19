<?php
require "admin/connect.php";
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
// search email 
$sql = "select count(*) from customers
where email = '$email' or phone = '$phone' ";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

// check email and phone number
if($number_rows == 1){
    header('location:signup.php?error=Trung email mat roi');
    exit;
}
// insert information into database
$token = uniqid('user_',true) . "._" . time();
$sql = "insert into customers(name,email,phone,password,token,address)
values ('$name','$email','$phone','$password','$token','$address')";

$result = mysqli_query($connect,$sql);

require "send_mail.php";
$tittle = "Xác nhận đăng kí tài khoản";
$content = "Xin chào $name, bạn đã đăng kí tài khoản thành công";
send_Mail($email,$content,$tittle,$name);

// select information from database by email
$sql = "select * from customers
where email = '$email' ";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$_SESSION["name"] = $name;
$_SESSION["id"] = $each['id'];
setcookie("token",$token,time()+60*60*24*30);


header('location:user.php?success=Dang nhap thanh cong');
