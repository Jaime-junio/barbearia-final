<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/componente.css">
  <title>Hair`s Beaultiful</title>
</head>

<body>
  <header>
    <nav style="position: fixed; width: 100%;top: 0%; color: aliceblue;" class="navbar bg-blue navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="../assets/img/logo.png" style="width: 150px; border-radius: 50%; height: 130px;"></a>
        <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon btn-font"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item menu-space-1">
              <a class="nav-link" aria-current="page" href="./index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item menu-space-1">
              <a class="nav-link" href="./servicos.php">Serviços</a>
            </li>
            <li class="nav-item menu-space-1">
              <a class="nav-link" href="./sobre.php">Sobre a Franquia</a>
            </li>
            <li class="nav-item menu-space-1">
              <a class="nav-link" href="#agendamento">Agendamento</a>
            </li>
            <li class="nav-item menu-space-2">
              <button id="loginButtom" onclick="toggleLogin()">  Login</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
<div id="loginForm" style="display:none;">
  <form method="post" action="../config/action_login.php">
          <!-- Seu formulário de login aqui -->
          <label for="email">Email:</label>
          <input type="email" id="email" name="email">
          <br>
          <label for="password">Senha:</label>
          <input type="password" id="password" name="password">
          <br>
          <input type="submit" value="Logar" name="logar">


  </form>
</div>


<script>
  function toggleLogin() {
    var loginForm = document.getElementById('loginForm');
    if (loginForm.style.display === 'none' || loginForm.style.display === '') {
        loginForm.style.display = 'block';
    } else {
        loginForm.style.display = 'none';
    }
}



</script>