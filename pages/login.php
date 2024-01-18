<?php

include '../includes/header.php';

?>

<main>
  <div class="login">
    <h1>Painel de Login </h1><br>
    <form method="post" action="../config/autenticar_login.php">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email">
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="seu aniversário: ddmmaaaa" 
      style="color:white; font-weight: bold;">
      <input class="btn-form" type="submit" value="Logar">
    </form>
  </div>
</main>

<?php

include '../includes/footer.php';

?>