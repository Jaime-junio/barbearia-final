<?php 

session_start();

include('../funcoes_sql/connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_servico'] = $id;

    // Buscar informações do serviço pelo ID
    $result = $connection->query("SELECT * FROM servicos WHERE id = $id");

    if ($result->num_rows === 1) {
        $servico = $result->fetch_assoc();
    } else {
        // Redirecionar se o ID não for encontrado
        header("Location: admin_logado.php");
        exit();
    }
} 
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/painel.css">
    <title>Editar Serviço</title>
</head>

<body>

    <div class="header">
        <h2>Painel de Controle</h2>
        <h3>Bem-vindo, <?php echo $_SESSION['email']; ?>! (<a href="../pages/login.php">Sair</a>)</h3>
    </div>
    <div class="editar-barbeiro">
        <h2>Editar Serviço</h2>
        <form method="post" action="../funcoes_sql/action_servico.php">
            <label>Título: </label>
            <input type="text" name="titulo" value="<?php echo $servico['titulo']; ?>" required /><br>

            <label>Preço: </label>
            <input type="number" name="preco" value="<?php echo $servico['preco']; ?>" required /><br>

            <label>Parágrafo: </label>
            <input type="text" name="paragrafo" value="<?php echo $servico['paragrafo']; ?>" required /><br>

            <input class="btn" type="submit" name="editar_servico" value="Editar" />
        </form>
    </div>
</body>

</html>
