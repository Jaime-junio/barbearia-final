<?php
session_start();

include './connectNew.php';

$connection = connectNew();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logar'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'password');

    if (!$email || !$senha) {
        header('Location: erro.html?dados_invalidos');
        exit;
    }

    $email = mysqli_escape_string($connection, $email);

    $sql = "SELECT senha, nivel FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senhaArmazenada, $nivel);
        $stmt->fetch();
        $senha = hash('sha256', $senha);

        if ($senha == $senhaArmazenada) {
            $_SESSION['email'] = $email;
            $area = ($nivel == 'barbeiro') ? '../barbeiro/pages/agendamentos.php' : '../admin/pages/agendamentos.php';
            header("Location: $area");
            exit;
        } else {
            header('Location: erro.html?senha_incorreta');
            exit;
        }
    } else {
        header('Location: erro.html?usuario_nao_encontrado');
        exit;
    }

    $stmt->close();
    $connection->close();
}
?>
