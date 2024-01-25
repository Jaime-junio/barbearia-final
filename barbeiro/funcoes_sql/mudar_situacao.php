<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include('../funcoes_sql/connect.php');
$connection = connectDataBase();

if (isset($_GET['numero']) && isset($_GET['situacao'])) {
    $numero_agendamento = $_GET['numero'];
    $nova_situacao = $_GET['situacao'];

    $update_query = "UPDATE agendamentos SET situacao = '$nova_situacao' WHERE numero = $numero_agendamento";
    $connection->query($update_query);

    header("Location: ../pages/agendamentos.php");
    exit();
} elseif(isset($_GET['deletar'])) {
    $numero_agendamento = $_GET['deletar'];

    $delete_query = "DELETE FROM agendamentos WHERE numero = $numero_agendamento";
    $connection->query($delete_query);

    header("Location: ../pages/agendamentos.php");
    exit();
} else {
    header("Location: ../pages/agendamentos.php");
    exit();
}
?>
