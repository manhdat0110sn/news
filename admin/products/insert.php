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
        require "../check_admin.php";
        require '../connect.php';
        $sql = "select * from manufacturers";
        $result = mysqli_query($connect,$sql);
    ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        Name
        <input type="text" name="name">
        <br>
        Image 
        <input type="file" name="photo" id="">
        <br>
        Description
        <input type="text" name="description">
        <br>
        Ten nha san xuat
        <select name="manufacture_id" id="">
            
            <?php
                foreach ($result as $each) { ?>
                    <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
            <?php  
                } 
            ?>
        </select>
        <input type="submit" value="upload">
    </form>
</body>
</html>