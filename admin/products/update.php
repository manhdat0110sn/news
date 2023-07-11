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
        require '../connect.php';
        $id = $_GET['id'];

        $sql_result = "select * from manufacturers";
        $result = mysqli_query($connect,$sql_result);

        $sql = "select * from products 
        where id = '$id'
        ";
        
        
        $result_product = mysqli_query($connect,$sql);
        
        $result_sql_array = mysqli_fetch_array($result_product);
        

    ?>
    <form action="process_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id  ?>">
        Name
        <input type="text" name="name" value="<?php echo $result_sql_array['name'];  ?>">
        <br>
        Anh cu 
        <br>
        <img src="<?php echo $result_sql_array['photo'];  ?>" height="100" alt="">
        <input type="hidden" name="photo_old" value="<?php echo $result_sql_array['photo'];  ?>">
        <br>
        anh moi
        <br>
        <input type="file" name="photo_new" id="" >
        <br>
        Description
        <input type="text" name="description" value="<?php echo $result_sql_array['description'];  ?>">
        <br>
        Ten nha san xuat
        <select name="manufacture_id" id="">
            
            <?php
                foreach ($result as $each) { 
                    if ($each['id'] == $result_sql_array['manufacture_id']) { ?>

                        <option value="<?php echo $each['id'] ?>" selected><?php echo $each['name'] ?></option>
            <?php  
                    }
                ?>
                    <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
            <?php
                } 
            ?>
        </select>
        <button>Sua</button>
    </form>
</body>
</html>