<?php

require '../connect.php';
require "../check_admin.php";

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$manufacture_id = $_POST['manufacture_id'];
$photo_new = $_FILES['photo_new'];
$target_file;

if($photo_new['size']>0){
    $target_dir = "photos/";
// convert file img to array but  array string  is . format image
    $file_photo = explode(".",basename($photo_new['name']))[1];
    $target_file = $target_dir . time() ."." . $file_photo ;
    move_uploaded_file($photo_new["tmp_name"], $target_file);
}else {
    $target_file = $_POST['photo_old'];
    
}

$sql_update = "update products 
set
name = '$name',
photo = '$target_file',
description = '$description',
manufacture_id = $manufacture_id
where
id = '$id'";

mysqli_query($connect,$sql_update);

mysqli_close($connect);






