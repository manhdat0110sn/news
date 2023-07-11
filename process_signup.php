<?php
require "admin/connect.php";
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
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
$sql = "insert into customers(name,email,phone,password)
values ('$name','$email','$phone','$password')";
$result = mysqli_query($connect,$sql);

// select information from database by email
$sql = "select count(*) from customers
where email = '$email' ";
$result = mysqli_query($connect,$sql);
$id_rows = mysqli_fetch_array($result)['id'];
$_SESSION["name"] = $name;
$_SESSION["id"] = $id_rows;


header('location:user.php?success=Dang nhap thanh cong');
