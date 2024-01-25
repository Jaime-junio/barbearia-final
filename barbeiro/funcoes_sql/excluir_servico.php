<?php
session_start();

include('./connect.php');

$connection = connectDataBase();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $stmt = $connection->prepare("DELETE FROM servicos WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indica que é um parâmetro inteiro
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../pages/servicos.php");
        exit();
    } else {
        header("Location: ../pages/servicos.php");
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../pages/servicos.php");
    exit();
}
?>
