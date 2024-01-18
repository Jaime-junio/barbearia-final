<?php
session_start();

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {

    $nome = $connection->real_escape_string($_POST['nome']); 
    $email = $connection->real_escape_string($_POST['email']);
    $especialidade = $connection->real_escape_string($_POST['especialidade']);
    $telefone = $connection->real_escape_string($_POST['telefone']);
    $disponibilidade = $connection->real_escape_string($_POST['disponibilidade']);

    $connection->begin_transaction(); 

    $query = "INSERT INTO barbeiros (nome, especialidade, email, telefone, disponibilidade) VALUES ('$nome', '$especialidade', '$email', '$telefone', '$disponibilidade')";
    
    if ($connection->query($query)) {
        $novoNomeFoto = enviarFoto();
        if($novoNomeFoto !== false){
            $queryFoto = "UPDATE barbeiros SET foto = '$novoNomeFoto' WHERE nome = '$nome'";
            if ($connection->query($queryFoto)) {
                $connection->commit();
                echo "<b style='color:green; font-size: x-large;'>Inserção e upload da foto bem-sucedidos!</b> <span style='font-size: x-large;'>Redirecionado 3, 2, 1...</span>";
            } else {
                $connection->rollback();
                echo "<b style='color:red; font-size: x-large;'>Erro ao atualizar o nome da foto no banco de dados.</b> <span style='font-size: x-large;'>Redirecionado 3, 2, 1...</span>";
            }
        } else {
            $connection->rollback();
            echo "<b style='color:red; font-size: x-large;'>Erro: Formato inválido.</b> <span style='font-size: x-large;'>Redirecionado 3, 2, 1...</span>";
        }
    } else {
        $connection->rollback();
        echo "<b style='color:red; font-size: x-large;'>Erro na inserção: </b> <span style='font-size: x-large;>Redirecionado 3, 2, 1...</span>" . $connection->error;
    }

    header("Refresh: 3; URL=../pages/barbeiros.php");
    exit();
}

function enviarFoto(){

    $formatosPermitidos = array("jpg", "jpeg");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)){
        $pasta = "../../assets/img";
        $temporario = $_FILES['foto']['tmp_name'];
        $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario, $pasta.'/'.$novoNome)){
            return $novoNome; 
        } else {
            return false;
        }
    } else {
        return false; 
    }
}

?>
