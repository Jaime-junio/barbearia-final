<?php 

session_start();

include('./funcoes_sql/connect.php');
$connection = connectDataBase();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_barbeiro'])) {
    $id = $_GET['id_barbeiro'];

    // Buscar informações do barbeiro pelo ID
    $result = $connection->query("SELECT * FROM barbeiros WHERE id_barbeiro = $id");

    if ($result->num_rows === 1) {
        $barbeiro = $result->fetch_assoc();
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
    <link rel="stylesheet" href="painel.css">
    <title>Editar Barbeiro</title>
</head>

<body>

    <div class="header">
        <h2>Painel de Controle</h2>
        <h3>Bem-vindo, <?php echo $_SESSION['email']; ?>! (<a href="../pages/login.php">Sair</a>)</h3>
    </div>
    <div class="editar-barbeiro">
        <h2>Editar Barbeiro</h2>
        <img src="../assets/img/<?=$barbeiro['foto'];?>" alt="<?=$barbeiro['foto'];?>"
            style="width: 200px; height: auto; float: left; margin-right: 20px;">
        <form method="post" action="./funcoes_sql/action_edit.php" enctype="multipart/form-data">
            <br><input type="hidden" name="id" value="<?php echo $barbeiro['id_barbeiro']; ?>" />
            <input type="hidden" name="fotoAntiga" value="<?php echo $barbeiro['foto']; ?>" />


            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $barbeiro['nome']; ?>" required /><br>

            <label>Email: </label>
            <input type="email" name="email" value="<?php echo $barbeiro['email']; ?>" required /><br>

            <div class="alinhamento-input">
                <label>Especialidade: </label>
                <input type="text" name="especialidade" value="<?php echo $barbeiro['especialidade']; ?> "
                    required /><br>

                <label>Telefone: </label>
                <input type="tel" name="telefone" value="<?php echo $barbeiro['telefone']; ?> " required /><br>

                <label>Status: </label>
                <input type="radio" value="1" name="disponibilidade"
                    <?php if($barbeiro['disponibilidade'] == 1) {echo 'checked';} ?> />
                <label>ativo</label>
                <input type="radio" value="0" name="disponibilidade"
                    <?php if($barbeiro['disponibilidade'] == 0) {echo 'checked';} ?> />
                <label>inativo</label><br>

                <label>Foto: </label><input type="file" name="foto" accept="image/jpeg" /><br>


                <input class="btn" type="submit" name="editar" value="Editar" />
            </div>
        </form>

    </div>
</body>

</html>