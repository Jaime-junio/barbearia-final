<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include '../includes/header.php';
?>

<div class="central">
    <div class="editar-barbeiro"> 
        <h2>Adicionar Barbeiro</h2>
        <form method="post" action="../funcoes_sql/adicionar_barbeiro.php" enctype="multipart/form-data">

            <label>Nome: </label>
            <input type="text" name="nome" required><br>

            <label>Email: </label>
            <input type="email" name="email" required><br>

            <label>Senha: </label>
            <input type="password" name="senha" required><br>

            <label>Especialidade: </label>
            <input type="text" name="especialidade" required><br>

            <label>STATUS: </label>

            <input type="radio" value="1" name="disponibilidade" checked required>
            <label >ativo</label>
            <input type="radio" value="0" name="disponibilidade" required>
            <label >inativo</label><br>

            <label>Foto: </label>
            <input type="file" name="foto" accept="image/jpeg"/><br>

            
            <input class="btn" type="submit" name="adicionar" value="Adicionar">
        </form>
    </div>
</div>
</body>
</html>
