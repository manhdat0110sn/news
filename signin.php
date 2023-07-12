<?php
session_start();
require 'admin/connect.php';
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
        if(isset($_COOKIE['token'])){
            $token = $_COOKIE['token'];
            $sql = "SELECT * FROM customers WHERE token = '$token'";
            $result = mysqli_query($connect,$sql);
            $number_rows = mysqli_num_rows($result);
            if($number_rows == 1){
                $name = mysqli_fetch_array($result)['name'];
                $_SESSION['name'] = $name;
                $_SESSION['id'] = mysqli_fetch_array($result)['id'];
                header('location:user.php');
                exit();
            }

        }
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
    <br>
    <form action="process_signin.php" method="post">
        Gmail :
        <input type="text" name="gmail">
        <br>
        Mật khẩu :
        <input type="password" name="password">
        <br>
        Ghi nhớ đăng nhập : 
        <input type="checkbox" name="remember" id="">
        <br>
        <button>Đăng Nhập</button>
    </form>
</body>
</html>