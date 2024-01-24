
<link rel="stylesheet" href="../assets/css/styles.css">
<div class="fundo-degrade">

<?php

include '../includes/header.php';

?>

<main>
<section class="services-section">

 <!-- Deixar dinâmico -->
  <div class="service-card">
    <img src="../assets/img/corte 1.jpg" alt="Corte de Cabelo">
    <h2>Corte de Cabelo</h2>
    <p>Nossos especialistas proporcionam cortes modernos e estilos personalizados para atender às suas preferências.</p>
  </div>

  <div class="service-card">
    <img src="../assets/img/corte 3.jpg" alt="Barba">
    <h2>Barba</h2>
    <p>Cuide da sua barba com os melhores produtos e técnicas, garantindo um visual impecável.</p>
  </div>

</section>
<section class="portfolio-section">
  <h2 style="color: red;">Portfólio</h2>

  <div class="portfolio-gallery">
   <!-- Deixar dinâmico -->
  <img src="../assets/img/corte 6.jpg" alt="Corte de Cabelo 1">
    <img src="../assets/img/corte 7.jpg" alt="Corte de Cabelo 2">
    <img src="../assets/img/corte 8.jpg" alt="Corte de Cabelo 3">
  </div>
</section>


<section class="testimonials-section">
  <h2 style="color: red;">Testemunhos</h2>

 <!-- Deixar dinâmico -->
  <div class="testimonial-card">
    <img src="../assets/img/imagens/cliente.jpg" alt="Cliente 1">
    <p class="testimonial-text">"Serviço excepcional! O corte de cabelo foi exatamente como eu queria. Recomendo totalmente!"</p>
    <p class="client-name">- João Silva</p>
  </div>

  <div class="testimonial-card">
    <img src="../assets/img/imagens/cliente2.jpg" alt="Cliente 2">
    <p class="testimonial-text">"Atendimento de alta qualidade. Sempre saio satisfeito com o cuidado e profissionalismo."</p>
    <p class="client-name">- André Oliveira</p>
  </div>
  
</section>
<section class="booking-section" id="agendamento">
  <h2 style="color: red; font-size: 30px;">Agende um Horário</h2>
  <p style="font-size: 23px;color: white;">Escolha o melhor horário para você e deixe-nos cuidar do seu visual.</p>
  
  <form class="booking-form">

   <!-- Deixar dinâmico -->
    <label style="font-size: 22px;" for="name">Nome:</label>
    <input type="text" id="name" name="name" placeholder="Seu Nome" required>

    <label style="font-size: 22px;" for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="Seu E-mail" required>

    <label style="font-size: 22px;" for="date">Data:</label>
    <input type="date" id="date" name="date" required>

    <label style="font-size: 22px;" for="time">Horário:</label>
    <input type="time" id="time" name="time" required>

    <button type="submit" class="btn-blue">Agendar</button>
  </form>
</section>
</main>


<?php

include '../includes/footer.php';

?>

</div>