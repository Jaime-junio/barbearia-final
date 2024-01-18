<?php
session_start();

include('./connect.php');

$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_barbeiro'])) {
    $id = $_GET['id_barbeiro'];

    $query_info = "SELECT * FROM barbeiros WHERE id_barbeiro = $id";
    $result_info = $connection->query($query_info);

    if ($result_info->num_rows > 0) {
        $row = $result_info->fetch_assoc();
        $nome_foto = $row['foto']; //porque tenho que apagar a foto dos nossos arquivos tambem né

        $connection->query("DELETE FROM barbeiros WHERE id_barbeiro = $id");

        $caminho_foto = "../../assets/img/$nome_foto"; 
        if (file_exists($caminho_foto)) {
            unlink($caminho_foto);
        }

        header("Location: ../pages/barbeiros.php");
        exit();
    } else {
        header("Location: ../page/barbeiros.php");
        exit();
    }
} else {
    header("Location: ../page/barbeiros.php");
    exit();
}
?>
