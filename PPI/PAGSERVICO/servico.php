<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>EcoTech</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="icon" type="text/css" href="IMG/ppiimagem.jpg">
 <link rel="stylesheet" type="text/css" href="styleservico.css">
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
      <div class="navbar">
  <img src="IMG/ppiimagem.jpg" alt="Logo"> <!-- Substitua pelo caminho da sua imagem -->
  <span class="logo-text" style="margin-right:200px;">Ecotech</span>
  <br>
  <a href="/PPI/PAGINICIAL/index.php" class="aa">Início</a>
                <div class="servicos-dropdown">
                <a href="#" class="aa" id="servicos-dropdown-toggle">Serviços</a>
                <div id="servicos-dropdown-content" class="servicos-content">
                <ul>
                    <li><a href="#servico1">Descrição</a></li>
                    <li><a href="#servico2">Passos para Agendamento</a></li>
                    <li><a href="#servico3">Tipos de dispositivos aceitos</a></li>
                    <li><a href="#servico4">Política de Dados e Privacidade</a></li>
                    <li><a href="#servico5">Instruções de Preparação</a></li>
                </ul>
            </div>
          </div>
   <?php
        if (isset($_SESSION['id'])) {
            // Se o usuário estiver logado, mostre o link para o perfil
            echo '<a href="/PPI/PAGAGENDAMENTO/perfil.php" class="aa" style="margin-right:200px;">Perfil</a>';
        }
        ?>
    <?php
    if (isset($_SESSION['nome'])) {
        echo '<div class="user-info">';
        echo '<span class="user-name">' . $_SESSION['nome'] . '</span>';
        echo '<a href="sair.php" class="logout-button">Sair</a>';
        echo '</div>';
    } else {
        echo '<a href="/PPI/PAGLOGIN/teladelogin.php" class="login-button">Entrar</a>';
    }
    ?>
<a href="/PPI/PAGAGENDAMENTO/agendar.php" class="button aa"style="margin-left:90px;"">Realizar Agendamento</a>
</div>
</div>
</nav>
<div class="border-gradient" id="border-gradient"></div>


  <!-- Header -->
  <div class="w3-container" style="margin-top:100px" id="showcase">
    <h1 class="w3-jumbo"><b></b></h1>
    <br><br><br>
    
  <!-- Services -->
  <div class="container">
         <h1 class="w3-xxxlarge w3-text-green"><b>Serviços</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
        <form action="processar_agendamento.php" method="post">
    <div class="input-row">
      <br><br><br>
       <div id="servicos-menu" class="servicos-menu">
        <div id="servico1" class="servico">
<div><img src="IMG/RECICLAR2.png" class="img-left" alt="AGENDAR"></div>
      <h2 class="a3 w3-text-green text-left"><strong>Descrição:
</strong></h2>
      <h3 class="a2 text-left">&nbsp;&nbsp;&nbsp;A coleta adequada de lixo eletrônico é fundamental para garantir que esses dispositivos sejam reciclados corretamente. A reciclagem adequada desses dispositivos permite a recuperação de metais valiosos, como ouro, prata e cobre, reduzindo a necessidade de mineração desses recursos. No Brasil, já existem políticas de descarte correto dos lixos eletrônicos, como é o caso da Política Nacional de Resíduos Sólidos (Lei 12.305/2010). Essa Lei proíbe o descarte de qualquer lixo em locais inadequados e obriga que setores públicos e as empresas lidem de forma correta com os resíduos gerados .</h3></div><br><br><br><br><br><br><br><br><br><br><br>

          <div id="servico2" class="servico">
      <h2 class="a3 w3-text-green text-left2"><strong>Passos para Agendamento e Coleta:
</strong></h2>
<div><img src="IMG/AGENDAR.png" class="img-right" alt="AGENDAR"></div>
      <h3 class="a2 text-left2">&nbsp;&nbsp;&nbsp;
<p>
<strong>1º Registro no Site:</strong> Antes de agendar uma coleta, é necessário criar uma conta em nosso site. Para isso, clique na opção "Entrar" localizada na barra de navegação no topo da página.
</p>
<p>
<strong>2º Acesso à Página de Agendamento:</strong>
Para agendar a coleta, acesse a página de agendamento através do botão "Realizar Agendamento" na barra de navegação acima da página.
</p>
<p>
<strong>3º Preenchimento de Informações:</strong>
Ao chegar na página de agendamento, preencha todas as informações solicitadas para concluir o processo. O preenchimento completo é essencial, pois essas informações são necessárias para o gerenciamento adequado da sua coleta.
</p>
<p>
<strong>4º Acompanhamento e Aprovação:</strong>
Após concluir o agendamento, você terá acesso ao histórico de suas coletas agendadas. Além disso, você poderá acompanhar a aprovação da sua coleta através do nosso sistema.</h3></div><br>
</p>
<br><br><br><br><br>
<div id="servico3" class="servico">
<div><img src="IMG/escolher.png" class="img-left" alt="AGENDAR"></div>
<h2 class="a3 w3-text-green text-left"><strong>Tipos de Dispositivos Aceitos:
</strong></h2>
      <h3 class="a2 text-left">&nbsp;&nbsp;&nbsp;
        <p>
<strong>Computadores e Laptops:</strong>
Desktops
Laptops
Workstations
</p>
<p>
<strong>Smartphones e Tablets:</strong>
Smartphones
Tablets
Dispositivos de leitura eletrônica
</p>
<p>
<strong>Dispositivos de Armazenamento:</strong>
Discos rígidos
Unidades de estado sólido (SSD)
Pendrives
Cartões de memória
</p>
<p>
<strong>Equipamentos de Áudio e Vídeo:</strong>
Televisores
Monitores
Alto-falantes
Fones de ouvido
Players de mídia
</p>
<p>
<strong>Eletrodomésticos Pequenos:</strong>
Máquinas de café
Torradeiras
Liquidificadores
Ferros de passar roupa
</p>
<p>
<strong>Eletrônicos de Entretenimento:</strong>
Consoles de jogos
Controles de videogame
Câmeras digitais
</p>
<p>
<strong>Periféricos de Computador:</strong>
Teclados
Mouses
Impressoras
Scanners
</p>
<p>
<strong>Eletrônicos de Escritório:</strong>
Telefones fixos
Calculadoras
Fax
</p>
<p>
<strong>Equipamentos de Rede:</strong>
Roteadores
Modems
Switches
</p>
<strong>Dispositivos de Fitness e Saúde:</strong>
Smartwatches
Rastreadores de fitness
Monitores de pressão arterial</h3></div><br><br><br><br><br><br><br><br>

        <div id="servico4" class="servico">
      <h2 class="a3 w3-text-green text-left2"><strong>Política de Dados e Privacidade:
</strong></h2>
<div><img src="IMG/segurança.png" class="img-right" alt="AGENDAR"></div>
      <h3 class="a2 text-left2">&nbsp;&nbsp;&nbsp;
<p>
Nós levamos a privacidade dos seus dados muito a sério. Esta política descreve como coletamos, usamos, armazenamos e protegemos as informações que você nos fornece durante o processo de agendamento e coleta de lixo eletrônico.
</p>
<p>
<strong>Coleta de Informações</strong>
Ao criar uma conta e agendar uma coleta, coletamos informações como seu nome, endereço de e-mail, número de telefone e detalhes de agendamento. Essas informações são necessárias para agendar e realizar a coleta com eficiência.
</p>
<p>
<strong>Uso das Informações</strong>
As informações coletadas são utilizadas exclusivamente para o processo de agendamento e coleta de lixo eletrônico. Elas são necessárias para confirmar agendamentos, coordenar coletas e enviar comprovantes de serviço.
</p>
<p>
<strong>Segurança dos Dados</strong>
Implementamos medidas de segurança para proteger suas informações contra acesso não autorizado, alteração ou divulgação. Utilizamos criptografia e práticas de segurança robustas para manter seus dados em segurança.
</p>
<p>
<strong>Compartilhamento de Informações</strong>
Não compartilhamos suas informações pessoais com terceiros, exceto quando necessário para a realização do serviço. Seus dados podem ser compartilhados com nossa equipe responsável pela coleta e reciclagem.
</p>
<p>
<strong>Exclusão de Dados</strong>
Após a conclusão do agendamento e coleta, retemos suas informações pelo tempo necessário para cumprir obrigações legais e garantir a qualidade do serviço. Se desejar excluir suas informações, entre em contato conosco.
</p>
<p>
<strong>Contato</strong>
Se tiver dúvidas sobre nossa política de dados e privacidade, entre em contato conosco através do e-mail contato@coletadelixoeletronico.com.
</p></h3></div>
<br><br><br><br><br><br>

<div id="servico5" class="servico">
<h2 class="a3 w3-text-green text-left"><strong>Instruções de Preparação:
</strong></h2>
<div><img src="IMG/CAIXAS.png" class="img-left" alt="AGENDAR"></div>
      <h3 class="a2 text-left">&nbsp;&nbsp;&nbsp;
        <p>
<strong>1-Desligue os Dispositivos:</strong> Certifique-se de desligar completamente todos os dispositivos eletrônicos antes da coleta.
</p>
<p>
<strong>2-Desconecte Cabos e Acessórios:</strong> Desconecte todos os cabos de energia, cabos USB, cabos HDMI e quaisquer outros acessórios conectados aos dispositivos.
</p>
<p>
<strong>3-Faça Backup de Dados (Opcional):</strong> Se aplicável, faça um backup de seus dados importantes antes de entregar o dispositivo para coleta. Lembre-se de remover qualquer cartão de memória ou pendrive.
</p>
<p>
<strong>4-Remova Senhas e Dados Pessoais:</strong> Se possível, remova senhas, PINs e dados pessoais dos dispositivos antes da coleta. Isso ajuda a proteger sua privacidade.
</p>
<p>
<strong>5-Agrupe Itens Relacionados:</strong> Se você estiver entregando vários dispositivos, agrupe itens relacionados, como cabos e adaptadores, juntamente com os dispositivos principais.
</p>
<p>
<strong>6-Prepare Dispositivos Frágeis:</strong> Se os dispositivos forem frágeis, como telas de tablets ou laptops, considere envolvê-los em materiais protetores para evitar danos durante o transporte.
</p>
<p>
<strong>7-Embalagem Original (Opcional):</strong> Se você ainda tiver a embalagem original dos dispositivos, ela pode fornecer uma camada adicional de proteção durante o transporte.
</p>
<p>
<strong>8-Identificação:</strong> Identifique os dispositivos com nomes ou etiquetas claras, especialmente se você estiver entregando vários dispositivos.
</p>
<p>
<strong>9-Local de Coleta:</strong> Coloque os dispositivos prontos para coleta em um local de fácil acesso, onde a equipe de coleta possa retirá-los facilmente.
</p>
<p>
<strong>10-Esteja Pronto para a Coleta:</strong> Certifique-se de que alguém esteja disponível no local agendado para a coleta, ou siga as instruções fornecidas para deixar os dispositivos em um local seguro e designado. </h3></div><br>
</p>
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
<script>
// Função para mostrar o menu de serviços
function showServicosPopup() {
    var servicosPopup = document.getElementById("servicos-popup");
    servicosPopup.style.display = "block";
    localStorage.setItem("servicosPopupVisible", "true");
}

// Função para ocultar o menu de serviços
function hideServicosPopup() {
    var servicosPopup = document.getElementById("servicos-popup");
    servicosPopup.style.display = "none";
    localStorage.setItem("servicosPopupVisible", "false");
}

// Adicione um evento de clique ao link "Serviços"
document.getElementById("servicos-dropdown").addEventListener("click", function (event) {
    event.preventDefault(); // Evita que o link seja seguido

    var servicosPopupVisible = localStorage.getItem("servicosPopupVisible");
    if (servicosPopupVisible === "true") {
        hideServicosPopup();
    } else {
        showServicosPopup();
    }
});

// Adicione um evento de clique aos links de serviço
document.querySelectorAll(".servicos-content a").forEach(function (link) {
    link.addEventListener("click", function () {
        hideServicosPopup();
    });
});

// Verifique o estado do menu ao carregar a página
document.addEventListener("DOMContentLoaded", function () {
    var servicosPopupVisible = localStorage.getItem("servicosPopupVisible");
    if (servicosPopupVisible === "true") {
        showServicosPopup();
    }
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


