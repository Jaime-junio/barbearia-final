<?php

session_start();

include './connectNew.php';

$connection = connectNew();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logar'])){

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'password');


    $email = mysqli_escape_string($connection, $email);


        // É BARBEIRO?
        $sqlUsuario = "SELECT senha FROM usuarios WHERE email = '$email' && nivel = 'barbeiro'";
        $resultUsuario = $connection->query($sqlUsuario);
    
        if ($resultUsuario->num_rows > 0) {
            $row = $resultUsuario->fetch_assoc();
            $senhaArmazenada = $row["senha"];
            $area = '../barbeiro/barbeiro_logado.php';
            $senha = hash('sha256', $senha);
        } else {
            // É ADM?
            $sqlAdmin = "SELECT senha FROM usuarios WHERE email = '$email' && nivel = 'administrador'";
            $resultAdmin = $connection->query($sqlAdmin);
    
            if ($resultAdmin->num_rows > 0) {
                $row = $resultAdmin->fetch_assoc();
                $senhaArmazenada = $row["senha"];
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





?>