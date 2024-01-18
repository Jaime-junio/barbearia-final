<?php
include '../config/connectNew.php';

$connection = connectNew();


$sql = "SELECT nome FROM barbeiros where disponibilidade = 1";
$result = $connection->query($sql);
$connection->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/componente.css">
  <title>Reis Do Corte</title>
</head>

<body>
  <header>
    <nav style="position: fixed; width: 100%;top: 0%; color: aliceblue;" class="navbar bg-blue navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="../assets/img/logo.png" style="width: 150px; border-radius: 50%; height: 130px;"></a>
        <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon btn-font"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="./index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./servicos.php">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./sobre.php">Sobre a Franquia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Agendamentos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profissionais
              </a>
              <ul class="dropdown-menu">'
                <?php  // Loop para criar um link para cada barbeiro
                  while ($row = $result->fetch_assoc()) {
                    $profissional = $row["nome"];
                    echo '<li class="nav-item">
                          <a class="nav-link" href="./profissional.php?profissional=' . $profissional . '">Profissional ' . $profissional . '</a>
                         </li>';
                }?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
