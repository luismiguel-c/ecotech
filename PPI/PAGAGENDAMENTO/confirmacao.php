<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Agendamento</title>
    <link rel="stylesheet" type="text/css" href="confirmacaostyle.css">
</head>
<body>
    <nav>

    <div class="navbar">
      <div class="navbar">
  <img src="IMG/ppiimagem.jpg" alt="Logo"> <!-- Substitua pelo caminho da sua imagem -->
  <span class="logo-text" style="margin-right:200px;">Ecotech</span>
  <br>
  <a href="/PPI/PAGINICIAL/index.php" class="aa">Início</a>
  <a href="/PPI/PAGSERVICO/servico.php" class="aa">Serviço</a>
  <a href="perfil.php" class="aa" style="margin-right:200px;">Perfil</a>
  <a href="/PPI/PAGAGENDAMENTO/MeusAgendamentos.php" class="aa">Meus Agendamentos</a>
  <?php
        if (isset($_SESSION['nome'])) {
            echo '<span class="user-name">' . $_SESSION['nome'] . '</span>';
            echo '<a href="sair.php" class="logout-button">Sair</a>';
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
    <div class="confirmacao-container">
        <h1 class="a1">Agendamento Concluído</h1>
        <p>O seu agendamento foi concluído com sucesso. Obrigado!</p>
    </div>
</body>
</html>