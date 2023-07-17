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
        if(isset($_GET['error'])){
    ?>
            <span style="color: red;"><?php  echo $_GET['error'];
        }
                    ?>      
            </span>
        
    <form action="process_signup.php" method="post">
        Tên đăng nhập:
        <input type="text" name="name">
        <br>
        Gmail:
        <input type="email" name="email" id="">
        <br>
        Mật khẩu:
        <input type="text" value="" name="password">
        <br>
        Số điện thoại:
        <input type="tel" name="phone" id="">
        <br>
        Địa chỉ:
        <input type="text" name="address" id="">
        <button type="submit">Đăng Kí</button>
    </form>
</body>
</html>