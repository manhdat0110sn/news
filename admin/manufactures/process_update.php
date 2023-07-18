<?php
if (empty($_POST['id'])) {
    header('location:index.php?error=Thiếu id bài đăng ');
    exit;
}

$id = $_POST['id'];



if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])) {
    header("location:form_update.php?id=$id&error=Chưa điền đầy đủ");
    exit;
}




$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];
require '../connect.php';
require '../check_super_admin.php';

$sql = "
update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
photo = '$photo'
where 
id = '$id'
";



mysqli_query($connect, $sql);


header('location:index.php?success=Sửa thành công');

mysqli_close($connect);
