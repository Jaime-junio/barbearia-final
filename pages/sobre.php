<link rel="stylesheet" href="../assets/css/styles.css">
<div class="fundo-degrade">

    <?php
    
    include '../includes/header.php';
    
    ?>
    
    <main>
    <section class="historia">
        <div class="historia-content">
            <h2 style="color: red;">Nossa História</h2>
            <p>A Hari's Beautiful foi fundada com uma visão inovadora sobre barbearia. Nosso compromisso é preservar e cuidar da estética capilar masculina, proporcionando uma experiência única aos nossos clientes.</p>
            <p>Desde a nossa fundação, buscamos marcar presença no cenário da beleza masculina, trazendo não apenas cortes de cabelo excepcionais, mas tambêm um ambiente acolhedor e serviços de alta qualidade.</p>
        </div>
    </section>

    <section class="missao-valores">
        <div class="missao-valores-content">
            <h2 style="color: red;">Missão e Valores</h2>
            <p><strong>Missão:</strong> Proporcionar serviços de barbearia inovadores, preservando e realizando a estética capilar masculina, criando uma experiência excepcional para nossos clientes.</p>
            <p><strong>Valores:</strong> Comprometimento com a excelência, cuidado individualizado, inovação constante e ambiente acolhedor.</p>
        </div>
    </section>
    <h2 style="color: red; text-align: center; font-size: 30px;">Nossa Equipe</h2>
    <section class="equipe-sobre">
        <div class="equipe-sobre-content">

         <!-- Deixar dinâmico -->
         <?php 
        include_once '../config/connectNew.php';
        $connection = connectNew();

        $sql = "SELECT * FROM usuarios INNER JOIN barbeiros ON usuarios.id = barbeiros.id_usuario;";
        $result = $connection->query($sql);
        $connection->close();

        while ($row = $result->fetch_assoc()) {?>

            <div class="membro-equipe">
                <img src="../assets/img/<?= strtolower($row['nome'])?>.jpg" alt="JoÃ£o Silva - Barbeiro Chefe">
                <h3><?= $row['nome'] ?></h3>
                <p><?php echo ($row['nivel'] == 'administrador') ? 'barbeiro chefe':'barbeiro especialista'; ?></p>

                <p><?= $row['especialidade'] ?></p>
            </div>
        
        <?php } ?>
            
        </div>
    </section>
    
    <section class="fotos-ambiente">
        <div class="fotos-ambiente-content">
            <h2 style="color: red;">Veja Nossos Ambientes</h2>
            <div class="galeria-fotos">

             <!-- Deixar dinâmico -->
                <img src="../assets/img/salao1.jpg" alt="Interior da Barbearia">
                <img src="../assets/img/salao2.jpg" alt="EspaÃ§o Acolhedor">
                <img src="../assets/img/salao3.jpg" alt="Ãrea de Atendimento">
            </div>
        </div>
    </section>

    <section class="filosofia-atendimento">
        <div class="filosofia-atendimento-content">
            <h2 style="color: red;">Filosofia de Atendimento ao Cliente</h2>
            <p>Nossa filosofia é centrada em proporcionar uma experiência excepcional a cada cliente que entra na Hari's Beautiful. Valorizamos a individualidade, a atenção aos detalhes e o compromisso em superar as expectativas.</p>
            <p>Acreditamos que a satisfação do cliente vai além de um corte perfeito; envolve criar um ambiente acolhedor, ouvir as necessidades de cada pessoa e oferecer serviços personalizados que destacam sua beleza única.</p>
        </div>
    </section>
    
    <section class="atualizacoes-novidades">
        <div class="atualizacoes-novidades-content">
            <h2 style="color: red;">Atualizações e Novidades</h2>
            <p>Fique por dentro das últimas novidades e eventos especiais na Hari's Beautiful. Estamos sempre buscando maneiras de aprimorar nossos serviços e oferecer promoções exclusivas aos nossos clientes.</p>
            <p>Acompanhe nossas redes sociais para não perder nenhuma atualização!</p>
        </div>
    </section>
    <h2 style="text-align: center; color: red; font-size: 30px;">Depoimentos de Clientes</h2>
    <section class="depoimentos">
        <div class="depoimentos-content">
            
         <!-- Deixar dinâmico -->
            <div class="depoimento">
                <p>"Excelente atendimento e profissionais qualificados. Sempre saio satisfeito!"</p>
                <p style="color: red;">- Cliente Satisfeito 1</p>
            </div>
            <div class="depoimento">
                <p>"Ambiente agradável e cortes modernos. Recomendo!"</p>
                <p style="color: red;">- Cliente Satisfeito 2</p>
            </div>
        </div>
    </section>
    <div class="ponto-final"></div>
    
    </main>
    
    
    <?php
    
    include '../includes/footer.php';
    
    ?>
    
    </div>