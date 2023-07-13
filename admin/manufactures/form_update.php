<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    if (!(isset($_GET['id']))) {
        header('location:index.php?error=Lỗi id bài đăng');
        exit;
    }
    require '../menu.php';
    require '../connect.php';

    $id = $_GET['id'];

    $sql = "select * from manufacturers where id='$id'";

    $query = mysqli_query($connect, $sql);

    $result = mysqli_fetch_array($query);
    ?>
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Tên
        <input type="text" name="name" id="" value="<?php echo $result['name'] ?>">
        <br>
        Địa chỉ
        <input type="text" name="address" id="" value="<?php echo $result['address'] ?>">
        <br>
        Số điện thoại
        <input type="tel" name="phone" id="" value="<?php echo $result['phone'] ?>">
        <br>
        Ảnh
        <input type="text" name="photo" value="<?php echo $result['photo'] ?>">
        <button type="submit">Sửa</button>
    </form>
    <?php mysqli_close($connect) ?>
</body>

</html>