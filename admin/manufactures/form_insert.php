<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if (isset($_GET['error'])) {?>
        <!-- code... -->
        <span style="color: red;">
            <?php echo $_GET['error']?>
        </span>
    <?php } ?>
    
    <form action="process_insert.php" method="post">
        Tên 
        <input type="text" name="name" id="">
        <br>
        Địa chỉ
        <input type="text" name="address" id="">
        <br>
        Số điện thoại
        <input type="tel" name="phone" id="">
        <br>
        Ảnh
        <input type="text" name="photo">
        <button type="submit">Thêm</button>
    </form>
    
</body>
</html>