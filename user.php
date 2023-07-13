<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="user.css">
    <title>Document</title>
</head>

<body>
    <?php
    require "admin/connect.php";
    if (isset($_SESSION['name'])) {
        echo "Xin chào " . $_SESSION['name'];  ?>
        <br>
        <a href="signout.php">Đăng Xuất</a>
    <?php
    } else {
    ?>
        <br>
        <a href="signup.php">Đăng Kí</a>
        <br>
        <a href="signin.php">Đăng Nhập</a>
    <?php }
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);
    ?>
    <div class="container">
        <?php
        foreach ($result as $each) {
        ?>
            <div class="card">
                <div>
                    <img src="admin/products/<?php echo $each['photo'] ?>" alt="" style="height: 100px;">
                </div>
                <div style="height: 30px;">
                    <h3><?php echo $each['name'] ?></h3>

                </div>
                <div style="height: 30px;">
                    <p>Giá : <?php echo $each['price'] ?></p>
                </div>
                <div>
                    <a href="add_to_cart.php?id=<?php echo $each['id'] ?>">Thêm vào giỏ hàng</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <a href="view_cart.php">Tinh tien</a>

</body>

</html>