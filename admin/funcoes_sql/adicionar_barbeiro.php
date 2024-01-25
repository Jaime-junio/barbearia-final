<?php
session_start();

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $nome = $connection->real_escape_string($_POST['nome']); 
    $email = $connection->real_escape_string($_POST['email']);
    $especialidade = $connection->real_escape_string($_POST['especialidade']);
    $disponibilidade = $connection->real_escape_string($_POST['disponibilidade']);
    $senha = $connection->real_escape_string($_POST['senha']);
    $senhaHashed = hash('sha256', $senha);

    // Usando prepared statements para evitar SQL injection
    $query2 = $connection->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, 'barbeiro')");
    $query2->bind_param('sss', $nome, $email, $senhaHashed);

    $query = $connection->prepare("INSERT INTO barbeiros (id_usuario, especialidade, disponibilidade) VALUES (?, ?, ?)");

    $connection->begin_transaction(); 

    if ($query2->execute()) {
        $usuarioID = $query2->insert_id;

        $query->bind_param('iss', $usuarioID, $especialidade, $disponibilidade);

        if ($query->execute()) {
            $novoNomeFoto = enviarFoto();

            if ($novoNomeFoto !== false) {
                $queryFoto = $connection->prepare("UPDATE barbeiros SET foto = ? WHERE id_usuario = ?");
                $queryFoto->bind_param('si', $novoNomeFoto, $usuarioID);

                if ($queryFoto->execute()) {
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
            echo "<b style='color:red; font-size: x-large;'>Erro na inserção na tabela barbeiros.</b> <span style='font-size: x-large;'>Redirecionado 3, 2, 1...</span>";
        }
    } else {
        $connection->rollback();
        echo "<b style='color:red; font-size: x-large;'>Erro na inserção na tabela usuarios: </b> <span style='font-size: x-large;'>Redirecionado 3, 2, 1...</span>" . $query2->error;
    }

    // Fechar statements
    $query2->close();
    $query->close();

    header("Refresh: 3; URL=../pages/barbeiros.php");
    exit();
}

function enviarFoto() {
    $formatosPermitidos = array("jpg", "jpeg");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "../../assets/img";
        $temporario = $_FILES['foto']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";

        if (move_uploaded_file($temporario, $pasta . '/' . $novoNome)) {
            return $novoNome; 
        } else {
            return false;
        }
    } else {
        return false; 
    }
}
?>
