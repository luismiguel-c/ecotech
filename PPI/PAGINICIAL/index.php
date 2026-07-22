<?php
// session_start() movido para o topo: chamá-lo no meio do HTML só
// funcionava por causa do output_buffering do XAMPP
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>EcoTech</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="icon" type="text/css" href="IMG/ppiimagem1.jpg">
 <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="circle-container">
  <!-- Seus círculos com imagens aqui -->
</div>

<div id="scroll-to-top" class="scroll-button">
  <div class="arrow"></div>
</div>

<!-- menu -->
<nav>
  <div class="navbar">
    <img src="IMG/ppiimagem1.jpg" alt="Logo"> <!-- Substitua pelo caminho da sua imagem -->
    <span class="logo-text" style="margin-right:200px;">Ecotech</span>
    <br>
    <a href="index.php" class="aa">Início</a>
    <a href="/PPI/PAGSERVICO/servico.php" class="aa">Serviço</a>

  <?php
echo '<a href="/PPI/PAGAGENDAMENTO/perfil.php" class="aa" style="margin-right:200px;">Perfil</a>';
echo '<a href="/PPI/PAGAGENDAMENTO/MeusAgendamentos.php" class="aa">Meus Agendamentos</a>';
if (isset($_SESSION['nome'])) {
  echo '<div class="user-info">';
  echo '<span class="user-name">' . $_SESSION['nome'] . '</span>';
  echo '<a href="sair.php" class="logout-button">Sair</a>';
  echo '</div>';
} else {
  echo '<a href="/PPI/PAGLOGIN/teladelogin.php" class="login-button">Entrar</a>';
}
?>

    <a href="/PPI/PAGAGENDAMENTO/agendar.php" class="button aa" style="margin-left:90px;">Realizar Agendamento</a>
  </div>
</nav>
<div class="border-gradient" id="border-gradient"></div>


  <!-- Header -->
  <div class="w3-container" style="margin-top:100px" id="showcase">
    <h1 class="w3-jumbo"><b></b></h1>
    <br><br><br>
    
  <!-- Services -->
    <div style="float: right;">
   <img src="IMG/1.png" class="text-right" alt="Lixo-Eletronico">
    </div>
    <h1 class="a1 w3-text-green text-left"><b>SISTEMA DE AGENDAMENTO E COLETA DE LIXO ELETRÔNICO</b></h1>
    <h1 class="a2 w3-text-black text-left"><b>AGENDE UMA COLETA DE ONDE VOCÊ ESTIVER! </b></h1>
    <h1 class="a1 w3-text-black text-left" style="width: 600px;"><strong>ECONOMIZE SEU TEMPO</strong>, O AGENDAMENTO ONLINE <strong>SIMPLIFICA E AGILIZA</strong> O PROCESSO DE DESCARTE DE LIXO ELETRÔNICO.</h1>
   

    <h1 class="a1 w3-text-green text-left"><b>AGENDE AQUI A COLETA DO SEU LIXO ELETRONICO AGORA MESMO.</b></h1>

    <button class="button green-button a1 text-left" id="redirecionar1">Clique aqui</button>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <hr>
    <hr style="width:50px;border:5px solid green" class="w3-round">
     </p>
 <h2 class="w3-text-green center-text"><strong>Benefícios do Descarte Adequado:
</strong></h2>
<p>
<h3 class="center-text">&nbsp;&nbsp;&nbsp;O descarte adequado de lixo eletrônico é uma ação com múltiplos benefícios ao optar por agendar a coleta com o EcoTech!</h3><br>
<br><br>
<div class="text-container">
  <div class="text">Crie uma conta gratuita e forneça algumas informações básicas.</div>
  <div class="text">Ao escolher a coleta programada, você estará reduzindo a quantidade de lixo eletrônico que acaba em aterros, minimizando a emissão de gases de efeito estufa e contribuindo para a luta contra as mudanças climáticas.</div>
  <div class="text">Muitos componentes eletrônicos podem ser reutilizados ou reciclados para  a fabricação de novos produtos, reduzindo a necessidade de recursos naturais e economizando energia.</div>
  <div class="text">Nossa equipe experiente chegará no local designado para recolher seus itens, garantindo um processo seguro e eficiente.</div>
</div>
<br><br><br>
<h1 class="center-text">AQUI NO ECOTECH, A SIMPLICIDADE ESTÁ EM PRIMEIRO LUGAR. AGENDAR UMA COLETA DE LIXO ELETRÔNICO É FÁCIL E RÁPIDO. BASTA SEGUIR TRÊS ETAPAS SIMPLES:</h1>  
<h2 class="center-text a1"><strong>SELECIONE OS ITENS ELETRÔNICOS QUE DESEJA DESCARTAR</strong> E ESCOLHA UMA <strong>DATA</strong> E <strong>HORÁRIO</strong> CONVENIENTES PARA A COLETA.</strong></h2>
<br>

<div class="contact-support">
  <div class="contact-content">
    <h2 id="servico5" class="servico">Contato e Suporte</h2>
    <div class="contact-info">
      <p>
        Tem alguma dúvida ou precisa de suporte? Entre em contato conosco através dos meios abaixo:
      </p>
      <ul>
        <li>
          <strong>E-mail:</strong> contato@coletadelixoeletronico.com
        </li>
        <li>
          <strong>Telefone:</strong> (123) 456-7890
        </li>
      </ul>
      <p>
        Nossa equipe de suporte estará pronta para ajudar!
      </p>
    </div>
    <div class="contact-buttons">
      <a href="mailto:contato@coletadelixoeletronico.com" class="btn">Enviar E-mail</a>
      <a href="tel:(123) 456-7890" class="btn">Ligar Agora</a>
    </div>
  </div>
</div>
</div>

 <script type="text/javascript" src="js/materialize.min.js"></script>
<script>

function showLogoutButton() {
    var logoutButton = document.getElementById('logoutButton');
    logoutButton.style.display = 'inline';
}

function hideLogoutButton() {
    var logoutButton = document.getElementById('logoutButton');
    logoutButton.style.display = 'none';
}




document.addEventListener("DOMContentLoaded", function () {
    const userName = document.querySelector(".user-name");
    const userOptions = document.querySelector(".user-options");

    userName.addEventListener("mouseover", function () {
        userOptions.style.display = "block";
    });

    userName.addEventListener("mouseout", function () {
        userOptions.style.display = "none";
    });
});





document.getElementById("redirecionar1").addEventListener("click", function() {
  window.location.href = "/PPI/PAGAGENDAMENTO/agendar.php";
});



// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
    var botao = document.getElementById("redirecionar");

    // Adiciona um ouvinte de evento de clique ao botão
    botao.addEventListener("click", function() {
        // Redireciona para a página "agendar.php"
        window.location.href = "/PPI/PAGAGENDAMENTO/agendar.php";
    });
    function redirecionarParaAgendar() {
        window.location.href = "/PPI/PAGAGENDAMENTO/agendar.php";
    }
    function redirecionarParaLogin() {
            window.location.href = "/PPI/PAGLOGIN/teladelogin.php";
        }
    document.getElementById("scroll-to-top").addEventListener("click", function() {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
window.addEventListener("scroll", function() {
  const navbar = document.getElementById("navbar");
  const borderGradient = document.getElementById("border-gradient");
  
  if (window.scrollY > 0) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});
</script>

</body>
</html>


