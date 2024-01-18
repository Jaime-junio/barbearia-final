<?php 
session_start();

include('./funcoes_sql/connect.php');

$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="painel.css">
    <title>Adicionar Barbeiro</title>
</head>
<body>
    <div class="header">
        <h2>Painel de Controle</h2>
        <h3>Bem-vindo, <?php echo $_SESSION['email']; ?>! (<a href="../pages/login.php">Sair</a>)</h3>
    </div>

    <div class="central">

    <div class="editar-barbeiro"> 
        <h2>Adicionar Barbeiro</h2>
        <form method="post" action="./funcoes_sql/adicionar_barbeiro.php" enctype="multipart/form-data">

            <label>Nome: </label>
            <input type="text" name="nome" required><br>

            <label>Email: </label>
            <input type="email" name="email"><br>

            <label>Especialidade: </label>
            <input type="text" name="especialidade"><br>

            <label>Telefone: </label>
            <input type="text" name="telefone"><br>

            <label>STATUS: </label><br>

            <input type="radio" value="1" name="disponibilidade">
            <label >ativo</label>
            <input type="radio" value="0" name="disponibilidade">
            <label >inativo</label><br>

            <label>Foto: </label><input type="file" name="foto" accept="image/jpeg"/><br>

            
            <input class="btn" type="submit" name="adicionar" value="Adicionar">
        </form>
    </div>

    <div class="lista-barbeiros">
        <h3>Lista de Barbeiros</h3>
        <h4> Nome | Email | Telefone | Especialidade | Disponibilidade</h4>

        <?php $result = $connection->query("SELECT * FROM barbeiros"); 

        while ($row = $result->fetch_assoc()) {
            
            $status = ($row['disponibilidade'] == 1) ? '<b style="color:green">ativo</b>':'<b style="color:red">inativo</b>';

            echo "<p>{$row['nome']} | {$row['email']} | {$row['telefone']} | {$row['especialidade']} | 
            {$status}
            (<a href='./editar_barbeiro.php?id_barbeiro={$row['id_barbeiro']}'>Editar</a> | 
            <a href='./funcoes_sql/excluir_barbeiro.php?id_barbeiro={$row['id_barbeiro']}'>Excluir</a>)</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
