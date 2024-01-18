<?php 
session_start();

include('../funcoes_sql/connect.php');

$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include '../includes/header.php';

//id titulo preco e paragrafo
?>
<div class="central">
    
    <div class="lista-barbeiros e2">

    <h3 style="display: flex; justify-content: space-between; align-items: center; font-size: 1.2em;">Serviços da Barbearia
    <input type="text" placeholder="Pesquisar por serviço..." style="margin-right: -700px; margin-top: 12px; font-size: 0.8em; border-radius: 8px; padding: 8px;">
    <a href="../adicionar/adicionarServico.php" class="add-button" title="Adicionar serviço" style="margin-right: 5px;margin-left: 55px; font-size: 1.5em; border-radius: 50%; padding: 10px;">+</a>
    </h3> 
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Preço</th>
                    <th>Parágrafo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $connection->query("SELECT * FROM servicos");
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo 'R$ ' . $row['preco']; ?></td>
                        <td><?php echo $row['paragrafo']; ?></td>
                        <td>
                        <a href='../editar/editarServico.php?id=<?php echo $row['id']; ?>'>Editar</a> |
                        <a href='../funcoes_sql/excluir_servico.php?id=<?php echo $row['id']; ?>'>Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>               
</div>

</body>
</html>