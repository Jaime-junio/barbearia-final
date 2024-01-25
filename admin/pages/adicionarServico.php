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
        <h2>Adicionar Serviço</h2>
        <form method="post" action="../funcoes_sql/adicionar_servico.php">

            <label>Título: </label>
            <input type="text" name="titulo" required><br>

            <label>Preço R$ </label>
            <input type="number" name="preco" required><br>

            <label>Parágrafo: </label>
            <input type="text" name="paragrafo" required><br>

            <input class="btn" type="submit" name="adicionar" value="Adicionar">
        </form>
    </div>
</div>
</body>
</html>
