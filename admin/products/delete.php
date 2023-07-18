<?php
require '../connect.php';
require "../check_admin.php";
$id = $_GET['id'];

$sql_delete = "delete from products where id = '$id'";

mysqli_query($connect,$sql_delete);