<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đăng nhập </h1>
    <?php
    if (isset($_GET['error'])) {?>
        <span style="color: red;">
            <?php echo $_GET['error']; ?>
        </span>
    <?php } ?>
    <form action="login.php" method="post">
        Email :
        <input type="text" name="email" id="" placeholder="manhdatsn@gmal.com">
        <br>
        Password :
        <input type="password" name="password" id="" placeholder="1234#12">
        <br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>