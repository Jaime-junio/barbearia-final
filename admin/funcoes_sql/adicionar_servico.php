<?php
session_start();

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {

    $titulo = $connection->real_escape_string($_POST['titulo']); 
    $preco = $connection->real_escape_string($_POST['preco']);
    $paragrafo = $connection->real_escape_string($_POST['paragrafo']);

    $query = "INSERT INTO servicos (titulo, preco, paragrafo) VALUES ('$titulo', '$preco', '$paragrafo')";
    
    $connection->query($query);
        
    header("Location: ../pages/servicos.php");
    exit();
}else{
    header("Location: ../pages/servicos.php");
}
?>