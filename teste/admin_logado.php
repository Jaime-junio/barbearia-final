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

