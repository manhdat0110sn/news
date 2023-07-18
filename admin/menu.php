
<ul>
    <li>
        <a href="../manufactures">quản lý nhà sản xuất</a>
    </li>
</ul>
<ul>
    <li>
        <a href="../products">quản lý san pham</a>
    </li>
</ul>
<ul>
    <li>
        <a href="../orders">quản lý đơn hàng</a>
    </li>
</ul>

<?php if (isset($_GET['error'])) {?>
    <span style="color: red;">
        <?php echo $_GET['error']; ?>
    </span>

<?php } ?>

<?php if (isset($_GET['success'])) {?>
    <span style="color:blue">
        <?php echo $_GET['success']; ?>
    </span>

<?php } ?>
