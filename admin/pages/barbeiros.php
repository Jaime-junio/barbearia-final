<?php 
session_start();

include('../funcoes_sql/connect.php');

$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include '../includes/header.php';
?>
<div class="central">
    
    <div class="lista-barbeiros e2">

    <h3 style="display: flex; justify-content: space-between; align-items: center; font-size: 1.2em;">
    Lista de Barbeiros
    <input type="text" placeholder="Pesquisar por funcionário..." style="margin-right: -700px; margin-top: 12px; font-size: 0.8em; border-radius: 8px; padding: 8px;">
    <a href="../adicionar/adicionarBarbeiro.php" class="add-button" title="Adicionar Barbeiro" style="margin-right: 20px; font-size: 1.5em; border-radius: 50%; padding: 10px;">+</a>
    </h3>
            
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Especialidade</th>
                    <th>Disponibilidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $connection->query("SELECT * FROM barbeiros");
                while ($row = $result->fetch_assoc()) {
                    $status = ($row['disponibilidade'] == 1) ? '<b style="color:green">ativo</b>' : '<b style="color:red">inativo</b>';
                    ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefone']; ?></td>
                        <td><?php echo $row['especialidade']; ?></td>
                        <td style="text-align: center; "><?php echo $status; ?></td>
                        <td>
                            <a href='../editar/editar_barbeiro.php?id_barbeiro=<?php echo $row['id_barbeiro']; ?>'>Editar</a> |
                            <a href='../funcoes_sql/excluir_barbeiro.php?id_barbeiro=<?php echo $row['id_barbeiro']; ?>'>Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>               
</div>

</body>
</html>





