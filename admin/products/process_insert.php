<?php

require '../connect.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$description = $_POST['description'];
$manufacture_id = $_POST['manufacture_id'];

$target_file = "";
if($photo['size']>0){
    $target_dir = "photos/";
    // convert file img to array but  array string  is . format image
    $file_photo = explode(".",basename($photo['name']))[1];
    $target_file = $target_dir . time() ."." . $file_photo ;
    move_uploaded_file($photo["tmp_name"], $target_file);
}



$sql = "insert into products(name,photo,description,manufacture_id)
values ('$name','$target_file','$description','$manufacture_id')";


mysqli_query($connect,$sql);