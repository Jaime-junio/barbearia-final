<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include('../funcoes_sql/connect.php');
$connection = connectDataBase();

include '../includes/header.php';

// Verifica se foi passado um parâmetro de filtro
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

// Preparação da consulta com base no filtro
if (!empty($filtro)) {
    $query = "SELECT * FROM agendamentos WHERE situacao = '$filtro'";
} else {
    $query = "SELECT * FROM agendamentos 
        ORDER BY CASE 
            WHEN situacao = 'pendente' THEN 0
            WHEN situacao = 'pago' THEN 1 
            ELSE 2 
        END, data ASC";
}

$result = $connection->query($query);
?>

<div class="central">
    <div class="lista-barbeiros e2">
        <h3 style="display: flex; justify-content: space-between; align-items: center; font-size: 1.2em;">Agendamentos
        <div style="font-size:smaller;">
            <a href="?filtro=pago">Mostrar Pagos</a> |
            <a href="?filtro=cancelado">Mostrar Cancelados</a> |
            <a href="?filtro=pendente">Mostrar Pendentes</a> |
            <a href="?">Mostrar Todos</a>
        </div>
        </h3> 

        <table> 
        <thead>
            <tr>
                <th>NÚMERO</th>
                <th>CLIENTE</th>
                <th>DATA</th>
                <th>HORARIO</th>
                <th>SITUACAO</th>
                <th>AÇÕES:</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>   
                    <td><?php echo $row['numero']; ?></td>
                    <td><?php echo $row['nome_cliente']; ?></td>
                    <td><?php echo $row['data']; ?></td>
                    <td><?php echo $row['horario']; ?></td>
                    <td><?php echo $row['situacao']; ?></td>
                    <td>
                    <a href='../funcoes_sql/mudar_situacao.php?numero=<?php echo $row['numero']; ?>&situacao=pago'>PAGO</a> | 
                    <a href='../funcoes_sql/mudar_situacao.php?numero=<?php echo $row['numero']; ?>&situacao=cancelado'>CANCELADO</a> | 
                    <a href='../funcoes_sql/mudar_situacao.php?numero=<?php echo $row['numero']; ?>&situacao=pendente'>PENDENTE</a> | 
                    <a href='../funcoes_sql/mudar_situacao.php?deletar=<?php echo $row['numero']; ?>'>DELETAR</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>               
</div>

</body>
</html>
