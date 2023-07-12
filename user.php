<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "admin/connect.php"; 
        if(isset($_SESSION['name'])){
            echo "Xin chào " . $_SESSION['name'];  ?>
            <br>
            <a href="signout.php">Đăng Xuất</a>
    <?php
        }else {
    ?>
    <br>
    <a href="signup.php">Đăng Kí</a>
    <br>
    <a href="signin.php">Đăng Nhập</a>
    <?php } ?>
</body>
</html>