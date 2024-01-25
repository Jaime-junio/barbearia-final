<?php
session_start();

include_once './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agendar"])) {
    $nome = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $date = filter_input(INPUT_POST, "date"); 
    $time = filter_input(INPUT_POST, "time");

    $connection = connectDataBase();

    if (!$connection) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Verificando se já existe um agendamento para a data e horário especificados
    $queryVerificarAgendamento = "SELECT numero FROM agendamentos WHERE data = ? AND horario = ?";
    $stmtVerificarAgendamento = mysqli_prepare($connection, $queryVerificarAgendamento);

    mysqli_stmt_bind_param($stmtVerificarAgendamento, "ss", $date, $time);
    mysqli_stmt_execute($stmtVerificarAgendamento);
    mysqli_stmt_store_result($stmtVerificarAgendamento);

    if (mysqli_stmt_num_rows($stmtVerificarAgendamento) == 0) {
        // Verificando se o cliente já existe
        $queryVerificarCliente = "SELECT id_cliente FROM clientes WHERE email = ?";
        $stmtVerificarCliente = mysqli_prepare($connection, $queryVerificarCliente);

        mysqli_stmt_bind_param($stmtVerificarCliente, "s", $email);
        mysqli_stmt_execute($stmtVerificarCliente);
        mysqli_stmt_store_result($stmtVerificarCliente);

        if (mysqli_stmt_num_rows($stmtVerificarCliente) == 0) {
            // Se o cliente não existir, inserimos ele no banco de dados
            $queryInserirCliente = "INSERT INTO clientes (nome, email) VALUES (?, ?)";
            $stmtInserirCliente = mysqli_prepare($connection, $queryInserirCliente);
            mysqli_stmt_bind_param($stmtInserirCliente, "ss", $nome, $email);

            if (!mysqli_stmt_execute($stmtInserirCliente)) {
                echo "<h2 style='color:blue;'>Erro ao cadastrar o cliente: " . mysqli_error($connection) . "</h2>";
                exit;
            }

            $id_cliente = mysqli_insert_id($connection);
        }

        // Agendamos o cliente
        $queryInserirAgendamento = "INSERT INTO agendamentos (id_cliente, data, horario, nome_cliente) VALUES (?, ?, ?, ?)";
        $stmtInserirAgendamento = mysqli_prepare($connection, $queryInserirAgendamento);
        mysqli_stmt_bind_param($stmtInserirAgendamento, "ssss", $id_cliente, $date, $time, $nome);

        if (!mysqli_stmt_execute($stmtInserirAgendamento)) {
            echo "<h2 style='color:red;'>Erro ao fazer o agendamento: " . mysqli_error($connection) . "</h2>";
            exit;
        }

        echo "<h2 style='color:green;'>Agendamento feito com sucesso!</h2>";
    } else {
        echo "<h2 style='color:red;'>Lamentamos, já existe um agendamento para este horário.</h2>";
    }

    mysqli_close($connection);
}
?>
