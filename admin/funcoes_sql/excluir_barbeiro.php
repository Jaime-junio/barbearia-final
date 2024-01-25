<?php
session_start();

include('./connect.php');

$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_barbeiro'])) {
    $id = $connection->real_escape_string($_GET['id_barbeiro']);

    // Preparar consulta para obter informações do barbeiro
    $query_info = $connection->prepare("SELECT id_usuario, foto FROM barbeiros WHERE id_barbeiro = ?");
    $query_info->bind_param('i', $id);
    $query_info->execute();
    $query_info->store_result();

    if ($query_info->num_rows > 0) {
        $query_info->bind_result($id_usuario, $nome_foto);
        $query_info->fetch();
        $query_info->close();

        // Iniciar transação para garantir operação atômica
        $connection->begin_transaction();

        // Excluir o barbeiro
        $query_delete_barbeiro = $connection->prepare("DELETE FROM barbeiros WHERE id_barbeiro = ?");
        $query_delete_barbeiro->bind_param('i', $id);
        $query_delete_barbeiro->execute();

        // Excluir o usuário associado
        $query_delete_usuario = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
        $query_delete_usuario->bind_param('i', $id_usuario);
        $query_delete_usuario->execute();

        // Commit se tudo ocorrer bem, rollback caso contrário
        if ($query_delete_barbeiro->affected_rows > 0 && $query_delete_usuario->affected_rows > 0) {
            $connection->commit();

            // Remover a foto dos arquivos
            $caminho_foto = "../../assets/img/$nome_foto";
            if (file_exists($caminho_foto)) {
                unlink($caminho_foto);
            }

            header("Location: ../pages/barbeiros.php");
            exit();
        } else {
            $connection->rollback();
        }

        // Fechar statements
        $query_delete_barbeiro->close();
        $query_delete_usuario->close();
    }
}

// Redirecionar em caso de erro ou se não houver ID válido
header("Location: ../pages/barbeiros.php");
exit();
?>
