<?php

if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])) {
    # code...
    header('location:form_insert.php?error=Chưa nhập đầy đủ');
    exit;
}
require '../check_super_admin.php';
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];
require '../connect.php';

$sql = "insert into manufacturers(name,address,phone,photo)
values('$name','$address','$phone','$photo')";

mysqli_query($connect, $sql);


header('location:index.php?success=Thêm thành công');

mysqli_close($connect);
