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
        require '../menu.php'; 
        require '../connect.php';

        
        $search = '';
        if (isset($_GET['search'])) {
            # code...
            $search = $_GET['search'];
        }

        $pages = 1;

        if (isset($_GET['page'])) {
            # code...
            $pages = $_GET['page'];
        }     
        
        
        $quantity_limit = 3;
        $offet_posts = $quantity_limit * ($pages-1);

        $sql = "select count(*) as count from manufacturers
        where name  like '%$search%'";

        $result_post = mysqli_query($connect,$sql);

        $result_numbers_post = (mysqli_fetch_array($result_post))['count'];



        $numbers_page =  ceil($result_numbers_post/$quantity_limit);


        $sql_search = "select * from manufacturers
        where name  like '%$search%'
        limit $quantity_limit offset $offet_posts";
        $result_sql_search = mysqli_query($connect,$sql_search);

    ?>
    <a href="form_insert.php">Thêm</a>

    <table border="1" witdth="100%">
        <caption>
            <form action="">
                <input type="search" name="search" id=""placeholder="Search the site…" value="<?php echo $search; ?>">
            </form>
        </caption>
        <tr>
            <td>Mã</td>
            <td>Tên</td>
            <td>Địa Chỉ</td>
            <td>Số Điện Thoại</td>
            <td>Ảnh</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach ($result_sql_search as $value) {?>
            <tr>
                <td>
                    <?php echo $value['id'] ?>
                </td>
                <td>
                    <?php echo $value['name'] ?>
                </td>
                <td>
                    <?php echo $value['address'] ?>
                </td>
                <td>
                    <?php echo $value['phone'] ?>
                </td>
                <td>
                    <img height="100" src="<?php echo $value['photo'] ?>" alt="">
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $value['id']; ?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $value['id']; ?>">Xóa</a>
                    
                </td>
            </tr>
        <?php } ?>
        
    </table>
    <?php for ($i=1; $i <= $numbers_page ; $i++) { ?>
       <a href="?page=<?php echo $i; ?>&search=<?php echo $search ?>">
        <?php echo $i; ?>
       </a>
    <?php } ?>
    <?php mysqli_close($connect) ?>
</body>
</html>