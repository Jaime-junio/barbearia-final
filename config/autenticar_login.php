<?php

session_start();

include './connectNew.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha");

    
    if ($email === false || strlen($senha) < 8) {
        header('Location: erro.html?erro');
        exit;
    }

    if($connection = connectNew()){
        
    // É CLIENTE?
    $sqlUsuario = "SELECT senha FROM clientes WHERE email = '$email'";
    $resultUsuario = $connection->query($sqlUsuario);

    if ($resultUsuario->num_rows > 0) {
        $row = $resultUsuario->fetch_assoc();
        $senhaArmazenada = $row["senha"];
        $area = '../user/usuario_logado.php';
    } else {
        // É ADM?
        $sqlAdmin = "SELECT senha FROM administradores WHERE email = '$email'";
        $resultAdmin = $connection->query($sqlAdmin);

        if ($resultAdmin->num_rows > 0) {
            $rowAdmin = $resultAdmin->fetch_assoc();
            $senhaArmazenada = $rowAdmin["senha"];
            $area = '../admin/pages/agendamentos.php';
            $senha = hash('sha256', $senha); 
        } else {
            header('Location: erro.html?usuario_nao_encontrado');
            exit;
        }
    }

    if ($senha == $senhaArmazenada) {
        $_SESSION['email'] = $email;
        header("Location: $area");
        exit;
    } else {
        header('Location: erro.html?senha_incorreta');
        exit;
    }

    $connection->close();
    }
}
?>
