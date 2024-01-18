<?php
session_start();

include_once './connect.php';
connectDataBase();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agendar"])) {
    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, "telefone");
    $nascimento = filter_input(INPUT_POST, "nascimento"); // dados para tabela clientes

    $data = filter_input(INPUT_POST, "data"); // dados para tabela agendamentos
    $horario = filter_input(INPUT_POST, "horario");
    $barbeiro = filter_input(INPUT_POST, "barbeiro");

    $connection = connectDataBase();



    // Verifica se o agendamento já existe para a data, horário e barbeiro 
    $queryVerificarAgendamento = "SELECT numero FROM agendamentos 
                                  WHERE data = '$data' 
                                  AND horario = '$horario' 
                                  AND id_barbeiro = (SELECT id_barbeiro FROM barbeiros WHERE nome = '$barbeiro')";
    $resultAgendamento = mysqli_query($connection, $queryVerificarAgendamento);

    if (mysqli_num_rows($resultAgendamento) == 0) { // Se o agendamento não existe, continue com a verificação do cliente
        $queryVerificarCliente = "SELECT id_cliente FROM clientes WHERE email = '$email'";
        $resultCliente = mysqli_query($connection, $queryVerificarCliente);

        if (mysqli_num_rows($resultCliente) == 0) { // Se o cliente não existir, vamos inserir ele.
            $senha = date('dmY', strtotime($nascimento)); //sim, a senha é a data de nascimento
            
            $queryInserirCliente = "INSERT INTO clientes (nome, telefone, email, nascimento, senha) VALUES ('$nome','$telefone', '$email', '$nascimento', '$senha')";
            if (mysqli_query($connection, $queryInserirCliente)) {
                $id_cliente = mysqli_insert_id($connection);
            } else {
                echo "<h2 style='color:blue;'>Cliente já cadastrado! " . mysqli_error($connection) . "</h2>";
                exit;
            }
        } else {
            // Pegando o id do cliente
            $row = mysqli_fetch_assoc($resultCliente);
            $id_cliente = $row['id_cliente']; 
        }

        // Agora sim agendamos
        $queryInserirAgendamento = "INSERT INTO agendamentos (id_cliente, data, horario, nome_barbeiro, nome_cliente, id_barbeiro) 
                                    VALUES ('$id_cliente', '$data', '$horario', '$barbeiro', '$nome',
                                    (SELECT id_barbeiro FROM barbeiros WHERE nome = '$barbeiro'))";
        if (!mysqli_query($connection, $queryInserirAgendamento)) {
            echo "<h2 style='color:red;'>Erro ao fazer o agendamento: " . mysqli_error($connection) . "</h2>";
            exit;
        }
        echo "<h2 style='color:green;'>Agendamento feito com sucesso!</h2>";
    } else {
        echo "<h2 style='color:red;'>Lamentamos, já existe um agendamento para este horário e barbeiro.</h2>";
    }
}
