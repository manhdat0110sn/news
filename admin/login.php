<?php
session_start();
if(empty($_POST['email']) || empty($_POST['password'])){
    header('location: index.php?error=Vui lòng nhập đầy đủ thông tin');
    exit();
}
$email = $_POST['email'];
$password = $_POST['password'];

require 'connect.php';
$sql = "select * from admin
    where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
if(mysqli_num_rows($result) === 1){
    $_SESSION['name'] =$each['name'];
    $_SESSION['id'] = $each['id'];
    $_SESSION['level'] = $each['level'];
    header('location: root/index.php');
    exit();
}
header('location: index.php?error=Tài khoản hoặc mật khẩu không đúng');