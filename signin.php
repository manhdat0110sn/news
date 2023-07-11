<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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
        <input type="text" name="password">
        <br>
        <button>Đăng Nhập</button>
    </form>
</body>
</html>