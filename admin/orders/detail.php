<?php
require '../connect.php';
require '../check_admin.php';
if(empty($_GET['id'])){
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

$sql = "SELECT * from order_product
INNER JOIN products ON order_product.id_product = products.id
WHERE id_order = '$id' ";
$result = mysqli_query($connect,$sql);
$count = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1"; width="100%">
        <tr>
            <th>
                Ten san pham
            </th>
            <th>
                anh
            </th>
            <th>
                So luong
            </th>
            <th>
                Gia
            </th>
            <th>
                Thanh tien
            </th>
        </tr>
        <tr>
            <?php foreach($result as $each){?>
                <tr>
                    <td>
                        <?php echo $each['name'] ?>
                    </td>
                    <td>
                        <img src="../products/<?php echo $each['photo'] ?>" width="100px" height="100px" alt="">
                    </td>
                    <td>
                        <?php echo $each['quantity'] ?>
                    </td>
                    <td>
                        <?php echo $each['price'] ?>
                    </td>
                    <td>
                        <?php echo $each['price'] * $each['quantity'];
                            $count += $each['price'] * $each['quantity'];
                         ?>
                    </td>
                </tr>
            <?php } ?>
        </tr>

    </table>
    <h1>Tong tien la <?php echo $count . "$"; ?></h1>
</body>
</html>