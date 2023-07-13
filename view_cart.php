<?php
session_start();
$result = $_SESSION['cart']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="width:100%"; border="1px">
        <tr>
            <th>Ten sp</th>
            <th>anh</th>
            <th>tien</th>
            <th>so luong</th>
            <th>tong tien</th>
        </tr>
        <tr>
            <?php
        foreach ($result as $id => $each) {
            ?>
            <tr>
                <td>
                    <?php echo $each['name'] ?>
                </td>
                <td>
                    <img src="admin/products/<?php echo $each['photo'] ?>" alt="" style="height: 100px;">
                </td>
                <td>
                    <?php echo $each['price'] ?>
                </td>
                <td>
                    <a href="update_quantity.php?id=<?php echo $id?>&type=decre">-</a>
                    <?php echo $each['quantity'] ?>
                    <a href="update_quantity.php?id=<?php echo $id?>&type=incre">+</a>
                </td>
                <td>
                    <?php echo $each['price'] * $each['quantity'] ?>
                </td>
            </tr>
            <?php
        }   ?>
        </tr>
        <tr>
            <td colspan="4">Tong tien</td>
            <td>
                <?php
                $total = 0;
                foreach ($result as $id => $each) {
                    $total += $each['price'] * $each['quantity'];
                }
                echo $total;
                ?>
            </td>
        </tr>
    </table>
    <a href="user.php">ve trang chu</a>
</body>
</html>