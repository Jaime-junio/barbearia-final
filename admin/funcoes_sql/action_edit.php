<?php

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id = $connection->real_escape_string($_POST['id']);
    $urlFotoAntiga = $connection->real_escape_string($_POST['fotoAntiga']);

    $nome = $connection->real_escape_string($_POST['nome']);
    $especialidade = $connection->real_escape_string($_POST['especialidade']);
    $email = $connection->real_escape_string($_POST['email']);
    $telefone = $connection->real_escape_string($_POST['telefone']);
    $disponibilidade = $connection->real_escape_string($_POST['disponibilidade']);

    $foto = enviarFoto($urlFotoAntiga);

    $query = "UPDATE barbeiros SET nome = '$nome', especialidade = '$especialidade', telefone = '$telefone', email = '$email', disponibilidade = '$disponibilidade', foto = '$foto' WHERE id_barbeiro = $id";

    $connection->query($query);

    header("Location: ../pages/barbeiros.php");
    exit();
} else {
    header("Location: ../pages/barbeiros.php");
    exit();
}

function enviarFoto($urlFotoAntiga){

    $formatosPermitidos = array("jpg", "jpeg");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)){

        $pasta = "../../assets/img";
        $temporario = $_FILES['foto']['tmp_name'];
        $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario, $pasta.'/'.$novoNome)){
            $caminho_foto = "../../assets/img/$urlFotoAntiga"; 
            if (file_exists($caminho_foto)) {
                unlink($caminho_foto);
            }
            return $novoNome;     
        } else {
            return false;
        }
    } else {
        return false; 
    }
}
?> 