<?php

session_start();

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id = $_SESSION['id_servico'];
    $titulo = $connection->real_escape_string($_POST['titulo']);
    $preco = $connection->real_escape_string($_POST['preco']);
    $paragrafo = $connection->real_escape_string($_POST['paragrafo']);

    $query = "UPDATE servicos SET titulo = '$titulo', preco = '$preco', paragrafo = '$paragrafo' WHERE id = '$id'";

    $connection->query($query);

    header("Location: ../pages/servicos.php");
    exit();
} else {

    header("Location: ../pages/servicos.php");
    exit();
}

?>