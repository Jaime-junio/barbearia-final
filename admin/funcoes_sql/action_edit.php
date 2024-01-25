<?php
session_start();

include('./connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id = $connection->real_escape_string($_POST['id']);
    $id_usuario = $connection->real_escape_string($_POST['id_usuario']);
    $urlFotoAntiga = $connection->real_escape_string($_POST['fotoAntiga']);

    $nome = $connection->real_escape_string($_POST['nome']);
    $email = $connection->real_escape_string($_POST['email']);
    $novaSenha = $connection->real_escape_string($_POST['nova_senha']);
    $nivel = $connection->real_escape_string($_POST['nivel']);
    $especialidade = $connection->real_escape_string($_POST['especialidade']);
    $disponibilidade = $connection->real_escape_string($_POST['disponibilidade']);

    // Se uma nova senha foi fornecida, hash dela; senão, manter a senha existente
    $senha = (!empty($novaSenha)) ? hash('sha256', $novaSenha) : null;

    $novaFoto = enviarNovaFoto($urlFotoAntiga);

    // Utilizando prepared statement para evitar SQL injection CLARAMENTE
    $query_update_usuarios = $connection->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ?, nivel = ? WHERE id = ?");
    $query_update_usuarios->bind_param('ssssi', $nome, $email, $senha, $nivel, $id_usuario);

    if ($query_update_usuarios->execute()) {
        $query_update_barbeiros = $connection->prepare("UPDATE barbeiros SET especialidade = ?, disponibilidade = ?, foto = ? WHERE id_barbeiro = ?");
        $query_update_barbeiros->bind_param('sisi', $especialidade, $disponibilidade, $novaFoto, $id);

        if ($query_update_barbeiros->execute()) {
            header("Location: ../pages/barbeiros.php");
            exit();
        } else {
        }

        $query_update_barbeiros->close();
    } else {

    }

    $query_update_usuarios->close();
} else {
    header("Location: ../pages/barbeiros.php");
    exit();
}

function enviarNovaFoto($urlFotoAntiga) {
    $formatosPermitidos = array("jpg", "jpeg");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "../../assets/img";
        $temporario = $_FILES['foto']['tmp_name'];
        $novoNome = uniqid().".$extensao";

        if (move_uploaded_file($temporario, $pasta.'/'.$novoNome)) {
            $caminho_foto = "../../assets/img/$urlFotoAntiga";
            
            // Remover a foto antiga se existir
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
