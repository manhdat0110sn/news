<?php
    require '../connect.php';

    if (!isset($_GET['id'])) {
        # code...
        header('location:index.php?error=Chưa truyền mã để xóa bài đăng');
        exit;
    }

    $id = $_GET['id'];

    $sql = "delete from manufacturers where id='$id'";

    mysqli_query($connect,$sql);

    header("location:index.php?success=Đã xóa thành công bài đăng có mã $id ");

    mysqli_close($connect);
