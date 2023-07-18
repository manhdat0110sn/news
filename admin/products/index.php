<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require "../check_admin.php";
        require '../connect.php';
        require '../menu.php';
        $sql = "SELECT 
        products.*,
        manufacturers.name as manufacture_name
        FROM products
        join manufacturers
        on products.manufacture_id = manufacturers.id";
        $result = mysqli_query($connect,$sql);



    ?>
    <a href="insert.php">insert</a>
    <table border="1" style="width: 100%;">
        <tr>
            <td>mã</td>
            <td>tên sp</td>
            <td>ảnh</td>
            <td>mô tả</td>
            <td>tên nhà sản xuất</td>
            <td>sửa</td>
            <td>xóa</td>
        </tr>
        <?php foreach ($result as $each) {?>
            <tr>
                <td >
                    <?php echo $each['id'] ?>
                </td>
                <td >
                    <?php echo $each['name'] ?>
                </td>
                <td >
                    <img height="100px" src="<?php echo $each['photo'] ?>" alt="">
                    
                </td>
                <td >
                    <?php echo $each['description'] ?>
                </td>
                <td >
                    <?php echo $each['manufacture_name'] ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $each['id'];?>">sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'];?>">xoa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>