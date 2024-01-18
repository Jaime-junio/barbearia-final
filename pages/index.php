<?php

include '../includes/header.php';

?>
<link rel="stylesheet" href="../assets/css/styles.css">
<div class="fundo-degrade">
<main>
  <section class="texto-principal">
    <h1> Bem vindo(a) á Hair's Beautiful</h1>

    <p> A melhor Franquia do Município de Nova Iguaçu,
      explore o nosso site e veja um pouco mais do nosso trabalho</p>

      <h2 style="color: red;">Nossa Galeria de trabalhos</h2>
 <div class="container" id="galeria">
  
  <div class="gallery">
    <div class="photo">
      <img src="../assets/img/imagens/corte 1.jpg" alt="galeria">
    </div>
    <div class="photo">
      <img src="../assets/img/imagens/corte 2.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 3.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 4.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 5.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 6.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 7.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 8.jpg" alt="">
    </div>
    <div class="photo">
        <img src="../assets/img/imagens/corte 9.jpg" alt="">
    </div>
  </div>
  </div>

  <h2 style="color: red;">Depoimentos</h2>
<section class="depoimentos">
    <div class="depoimentos-content">
        
        <div class="depoimento">
            <p>"Excelente atendimento e cortes impecáveis. Recomendo!"</p>
            <p class="cliente">- Joâo Silva</p>
        </div>
        <div class="depoimento">
            <p>"A melhor barbearia da região. Sempre saio satisfeito!"</p>
            <p class="cliente">- Maria Oliveira</p>
        </div>
        <!-- Adicione mais depoimentos conforme necessÃ¡rio -->
    </div>
</section>

<section class="promocoes">
  <div class="promocoes-content">
      <h2 style="color: red;">Promosões Especiais</h2>
      <p style="color: white;">Aproveite nossas ofertas exclusivas para você:</p>
      <ul>
          <li style="color: white;">Desconto de 20% no corte na primeira visita</li>
          <li style="color: white;">Promoção de barba + corte por apenas R$ 50,00</li>
          <!-- Adicione mais promoÃ§Ãµes conforme necessÃ¡rio -->
      </ul>
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o apÃ³s o fechamento da tag </section> das promoÃ§Ãµes -->
<h2 style="color: red;">Nossa Equipe</h2>
<section class="equipe">
  <div class="equipe-content">
      
      <div class="barbeiro">
          <img src="../assets/img/kleber.jpg" alt="Barbeiro 1">
          <h3>Kleber Silva</h3>
          <p>Com mais de 10 anos de experiência, especializado em cortes modernos e barbas estilizadas.</p>
      </div>
      <div class="barbeiro">
          <img src="../assets/img/pedro.jpg" alt="Barbeiro 2">
          <h3>Pedro Oliveira</h3>
          <p>Com habilidades excepcionais em cortes femininos e masculinos, proporcionando resultados Unicos.</p>
      </div>
      <!-- Adicione mais barbeiros conforme necessÃ¡rio -->
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o apÃ³s o fechamento da tag </section> da equipe -->
<h2 style="color: red;">Blog e Dicas</h2>
<section class="blog" id="blog">
  <div class="blog-content">
      
      <div class="post">
          <img src="../assets/img/corte 2.jpg" alt="TendÃªncias em Cortes">
          <h3>Tendências em Cortes de Cabelo Masculino</h3>
          <p>Descubra as Ultimas tendências em cortes de cabelo masculino para 2024 e escolha o seu estilo.</p>
          <a href="blog/tendencias-cortes.html">Leia mais</a>
      </div>
      <div class="post">
          <img style="height: 250px; width: 300px;" src="../assets/img/corte 3.jpg" alt="Cuidados com a Barba">
          <h3>Cuidados Essenciais com a Barba</h3>
          <p>Saiba como manter sua barba impecável com dicas simples e eficazes de cuidados diários.</p>
          <a href="blog/cuidados-barba.html">Leia mais</a>
      </div>
      <!-- Adicione mais posts conforme necessÃ¡rio -->
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o apÃ³s o fechamento da tag </section> do blog -->

<section class="redes-sociais" id="redes-sociais">
  <div class="redes-sociais-content">
      <h2 style="color: red;">Siga-nos nas Redes Sociais</h2>
      <p>Fique por dentro das Ultimas novidades e inspirações:</p>
      <div class="icones-redes-sociais">
          <a href="https://www.facebook.com/suabarbearia" target="_blank"><img src="facebook-icon.png" alt="Facebook"></a>
          <a href="https://www.instagram.com/suabarbearia" target="_blank"><img src="instagram-icon.png" alt="Instagram"></a>
          <!-- Adicione mais Ã­cones conforme necessÃ¡rio -->
      </div>
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o apÃ³s o fechamento da tag </section> das redes sociais -->

<section class="mapa" id="mapa">
  <div class="mapa-content">
      <h2 style="color: red;">Localização</h2>
      <p style="color: white;">Venha nos visitar!</p>
      <!-- Substitua a URL incorporada pelo seu cÃ³digo de incorporaÃ§Ã£o do Google Maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dYOUR_LATITUDE_LONGITUDE!2dYOUR_LONGITUDE!2dYOUR_LATITUDE!3d16.8522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTYuMDIuMDIuMTM0LjEzMyI!5e0!3m2!1sen!2sus!4vYOUR_MAP_API_KEY" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o apÃ³s a seÃ§Ã£o de links rÃ¡pidos ou no final da pÃ¡gina -->

<section class="faq">
  <h2 style="color: red;">Perguntas Frequentes</h2>
  <div class="faq-content">
  
      <div class="pergunta">
          <h3>1. Quais são os metodos de pagamento aceitos?</h3>
          <p>Aceitamos pagamentos em dinheiro, cartões de credito e debito.</p>
      </div>
      <div class="pergunta">
          <h3>2. É necessário marcar horário ou atendemos sem agendamento?</h3>
          <p>Recomendamos agendamento, mas tambêm atendemos clientes sem marcar, dependendo da disponibilidade.</p>
      </div>
      <!-- Adicione mais perguntas e respostas conforme necessÃ¡rio -->
  </div>
</section>
<!-- Adicione esta seÃ§Ã£o no final da sua pÃ¡gina -->

<section class="newsletter">
  <div class="newsletter-content">
      <h2 style="color: red;">Inscreva-se em nossa Newsletter</h2>
      <p>Receba as Ultimas novidades, ofertas especiais e dicas diretamente na sua caixa de entrada.</p>
      <form action="#" method="post" class="form-newsletter">
          <input type="email" name="email" placeholder="Seu e-mail" required>
          <button type="submit">Inscrever-se</button>
      </form>
  </div>
</section>

<div class="texto-do-sobre">
    <h2 class="titulo-h2" style="margin-left: 35%;">Sobre nossa Franquia</h2>
    <p> Bem-vindo ao Hair's Beautiful, o refúgio da elegância masculina em Nova Iguaçu, onde a arte do barbear é elevada
        a uma experiência única. Sob a orientação habilidosa do proprietário Eduardo, nossa barbearia é mais do que um
        salão de beleza - é um santuário para homens que buscam cuidado pessoal excepcional e um toque de sofisticação.

        Ao entrar no Hair's Beautiful, você será envolvido por uma atmosfera acolhedora e contemporânea, onde a tradição
        encontra a modernidade. Nossa equipe de barbeiros especializados está comprometida em proporcionar um serviço
        impecável, garantindo que cada cliente saia não apenas com uma barba perfeita, mas também com a confiança
        renovada.</p>

    <p>O espaço foi cuidadosamente projetado para oferecer um ambiente relaxante, onde os homens podem escapar da
        agitação diária e dedicar algum tempo exclusivo a si mesmos. Do design interior elegante aos assentos
        confortáveis, cada detalhe foi pensado para criar uma experiência única de barbearia.

        Eduardo, o talentoso proprietário e mestre barbeiro, lidera nossa equipe com paixão e habilidade. Com anos de
        experiência na indústria, ele é conhecido por sua destreza artística e compromisso com a satisfação do cliente.
        Cada corte de cabelo e barba é tratado como uma obra-prima única, adaptada às necessidades e estilo de cada
        cliente.</p>

    <p>Além dos cortes tradicionais e barbas impecáveis, no Hair's Beautiful também oferecemos uma variedade de
        tratamentos especiais, como massagens capilares revigorantes e tratamentos de hidratação para manter seu visual
        sempre impecável.

        Junte-se a nós no Hair's Beautiful e descubra a verdadeira arte do barbear. Agende sua visita hoje para
        experimentar a excelência em cuidados pessoais masculinos em Nova Iguaçu. Estamos ansiosos para recebê-lo em
        nosso santuário de estilo e elegância.</p>
</div>

</main>
</div>
<?php
include '../includes/footer.php';
?>