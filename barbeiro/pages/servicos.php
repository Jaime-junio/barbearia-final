<?php
session_start();

include('../funcoes_sql/connect.php');

$connection = connectDataBase();

if (!isset($_SESSION['email'])) {
    header("Location: ../../pages/login.php");
    exit();
}

include '../includes/header.php';

// Verifica pesquisa
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $searchTerm = filter_input(INPUT_GET, 'search');
    
    $sql = "SELECT * FROM servicos WHERE titulo LIKE ?";

    $stmt = $connection->prepare($sql);
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param('s', $searchTerm);
} else {
    // Query padrão
    $stmt = $connection->prepare("SELECT * FROM servicos");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="central">
    <div class="lista-barbeiros e2">
        <h3 style="display: flex; justify-content: space-between; align-items: center; font-size: 1.2em;">
            Serviços da Barbearia
            <form method="get" style="margin-right: -700px; margin-top: 12px; font-size: 0.8em; border-radius: 8px; padding: 8px;">
                <input type="text" name="search" placeholder="Pesquisar por serviço..." style="margin-right: 0px; margin-top: 14px; font-size: 0.8em; border-radius: 8px; padding: 8px;" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" style="display: none;">Pesquisar</button>
            </form>
            <a href="./adicionarServico.php" class="add-button" title="Adicionar serviço" style="margin-right: 5px;margin-left: 55px; font-size: 1.5em; border-radius: 50%; padding: 10px;">+</a>
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
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo 'R$ ' . $row['preco']; ?></td>
                        <td><?php echo $row['paragrafo']; ?></td>
                        <td>
                            <a href='./editar_servico.php?id=<?=$row['id'];?>'>Editar</a> |
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
