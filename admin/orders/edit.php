<?php
require '../check_admin.php';
require '../connect.php';
if (empty($_GET['id']) || empty($_GET['status'])) {
    header('location:index.php');
    exit();
}
$id = $_GET['id'];
$status = $_GET['status'];

$sql = "update oders
set status = '$status'
where id = '$id'";
mysqli_query($connect,$sql);
header('location:index.php');
