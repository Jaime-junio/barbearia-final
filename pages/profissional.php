<?php

include '../includes/header.php';
include '../config/connect.php';

if (isset($_GET['profissional'])) {
    $profissionalSelecionado = $_GET['profissional'];

    dadosBarbeiro($profissionalSelecionado);
}

?>

<main>
    <div class="container">

        <div class="barbeiro-info">
            <img src="../assets/img/<?=$foto?>" alt="Barbeiro" class="barbeiro-img" width="250">
            <p><strong>Nome:</strong> <span><?=$profissionalSelecionado?></span></p>
            <p><strong>E-mail:</strong> <span><?=$email?></span> </p>
            <p><strong>Telefone:</strong> <span><?=$telefone?></span></p>
            <p><strong>Especialidade:</strong> <span><?=$especialidade?></span></p>
        </div>

        <div class="formulario">
            <form class="form" action="../config/actionbarbeiros.php" method="POST">
                <h1>Agende seu horario</h1> <br>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required>

                <label for="nascimento">Data de Nascimento:</label>
                <input type="date" id="nascimento" name="nascimento" required>

                <?php $ano = date('Y') + 1; ?>
                <label for="data">Agendamento do Corte:</label>
                <input type="date" id="data" name="data" min="<?= date('Y-m-d')?>" max="<?=date("$ano-m-d") ?>" required>

                <label for="horario">Horário:</label>
                <select id="horario" name="horario" required>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                </select>

                <input type="hidden" value='<?=$profissionalSelecionado?>' name="barbeiro">
                <input class="btn-form" type="submit" value="Enviar" name="agendar">
            </form>
        </div>

    </div>
</main>


<?php
include '../includes/footer.php';
?>