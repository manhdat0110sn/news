<?php
require "../connect.php";
require "../check_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" style="width: 100%;">
        <tr>
            <th>
                Ma don hang
            </th>
            <th>
                Thông tin nguoi nhan
            </th>
            <th>
                Thong tin ngươi dat
            </th>
            <th>Tong tien</th>
            <th>trang thai</th>
            <th>thoi gian dat hang</th>
            <th>Xem</th>
            <th>Sua</th>
        </tr>
        <tr>
            <?php
            $sql = "SELECT oders.*,
            customers.name,
            customers.phone,
            customers.address
            from oders
            INNER JOIN customers ON oders.customer_id = customers.id
            ";
            $result = mysqli_query($connect,$sql);
            
            foreach ($result as $each) {
                ?>
                <tr>
                    <td>
                        <?php echo $each['id'] ?>
                    </td>
                    <td>
                        <?php echo $each['name_receiver'] ?>
                        <br>
                        <?php echo $each['phone_receiver'] ?>
                        <br>
                        <?php echo $each['address_receiver'] ?>
                    </td>
                    <td>
                        <?php echo $each['name'] ?>
                        <br>
                        <?php echo $each['phone'] ?>
                        <br>
                        <?php echo $each['address'] ?>
                    </td>
                    <td>
                        <?php echo $each['total_price'] ?>
                    </td>
                    <td>
                    <?php
                        switch ($each['status']) {
                            case '0':
                                echo "Đang chờ xử lý";
                                break;
                            case '1':
                                echo "Đã xử lý";
                                break;
                            case '2':
                                echo "Đã hủy";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $each['create_at'] ?>
                    </td>
                    <td>
                        <a href="detail.php?id=<?php echo $each['id'] ?>">Xem</a>
                    </td>
                    <td>
                        <?php
                        if ($each['status'] == 0) {?>
                            <a href="edit.php?id=<?php echo $each['id'] ?>&status=1">Duyet</a>
                            <br>
                            <a href="edit.php?id=<?php echo $each['id'] ?>&status=2">Huy</a>
                        <?php } 
                        else {
                            echo "admin Đã xử lý";
                        }
                        ?>
                        
                    </td>
                </tr>
                <?php
            }
            ?>
        </tr>
    </table>
</body>
</html>