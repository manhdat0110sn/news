<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SESSION['cart'][$id] === 0) {
        require "admin/connect.php";
        $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['quantity'] = 1;
        $_SESSION['cart'][$id]['photo'] = $each['photo'];
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }

}
header('location: user.php');
