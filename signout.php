<?php 

require "admin/connect.php";
session_start();
unset($_SESSION['name']);
unset($_SESSION['id']);
setcookie('token','',time()-60*60*24*30);

header('location:user.php');