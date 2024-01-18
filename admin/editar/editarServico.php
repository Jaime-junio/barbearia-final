<?php 

session_start();

include('../funcoes_sql/connect.php');
$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $connection->query("SELECT * FROM servicos WHERE id = $id");

    if ($result->num_rows === 1) {
        $servico = $result->fetch_assoc();
    } else {
        // Redirecionar se o ID não for encontrado
        header("Location: ../pages/servicos.php");
        exit();
    }
} 

include '../includes/header.php';
?>

    <div class="editar-barbeiro">
        
    <h2>Editar Servico</h2>
    <form method="post" action="../funcoes_sql/action_servico.php">
        <br>
        <input type="hidden" name="id" value="<?php echo $servico['id']; ?>" />

        <label>Título: </label>
        <input type="text" name="titulo" value="<?php echo $servico['titulo']; ?>" required /><br>

        <label>Preço R$ </label>
        <input type="text" name="preco" value="<?php echo $servico['preco']; ?>" required /><br>

        <label>Parágrafo: </label>
        <input type="text" name="paragrafo" value="<?php echo $servico['paragrafo']; ?> " required /><br>

        <input class="btn" type="submit" name="editar" value="Editar" />
    </div>
    </form>

    </div>
</body>
</html>


?>

