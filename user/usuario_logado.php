<?php 
session_start();

include('../config/connect.php');
$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: ../pages/login.php");
    exit();
}

include './header.php';
?>