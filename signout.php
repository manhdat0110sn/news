<?php 

require "admin/connect.php";
session_start();
unset($_SESSION['name']);
unset($_SESSION['id']);

header('location:user.php');