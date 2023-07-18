<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đây là trang admin</h1>
    <?php
        require "../check_admin.php";
        echo "welcome " . $_SESSION['name'];
        require '../menu.php';
    ?>
    <a href="../logout.php">Đăng Xuất</a>
</body>
</html>