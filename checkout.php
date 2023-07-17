<?php
session_start();
if(empty($_SESSION['cart'])){
    header("location: user.php");
    exit();
}
require 'admin/connect.php';

$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];
$name_receiver = $_POST['name_receiver'];

$cart = $_SESSION['cart'];

$total_price = 0;
foreach ($cart as $key => $value) {
    $total_price += $value['price'] * $value['quantity'];
}
$status = 0; //0: chưa xử lý, 1: đã xử lý
$sql = "select count(*) from oders" ;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$id_order;
if($row[0] == 0){
    $id_order = 1;
}
else{
    $id_order = $row[0] + 1;
}


$customer_id = $_SESSION['id'];
$sql = "insert into oders (id,customer_id, total_price, phone_receiver, address_receiver, name_receiver,status)
values ('$id_order','$customer_id', '$total_price', '$phone_receiver', '$address_receiver', '$name_receiver','$status')";
mysqli_query($connect, $sql);
$sql = "insert into order_product (id_order, id_product, quantity)  values ";
foreach ($cart as $id_product => $value) {
    $quantity = $value['quantity'];
    $sql = $sql . " ($id_order, $id_product, $quantity),";
    
}

mysqli_query($connect, chop($sql, ","));
unset($_SESSION['cart']);
header('location:user.php');