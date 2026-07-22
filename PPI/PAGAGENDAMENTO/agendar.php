<?php
require __DIR__ . '/../conexao.inc.php'; // conexão única (já inicia a sessão)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id'])) {
        $usuario_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT id FROM agendamentos WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo "Você já possui um agendamento ativo.";
        } else {
            $tipo_lixo = $_POST["tipo_lixo"];
            $quantidade = $_POST["quantidade"];
            $tamanho = $_POST["tamanho"];
            $instrucoes = $_POST["instrucoes"];
            $concordo_checkbox = isset($_POST["concordo_checkbox"]) ? 1 : 0;

            $stmt = $conn->prepare("INSERT INTO agendamentos (tipo_lixo, quantidade, tamanho, instrucoes, concordo_checkbox, usuario_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissii", $tipo_lixo, $quantidade, $tamanho, $instrucoes, $concordo_checkbox, $usuario_id);

            if ($stmt->execute()) {
                header("Location: confirmacao.php");
                exit();
            } else {
                echo "Erro ao agendar: " . $conn->error;
            }
        }
    } else {
        echo "Você precisa estar logado para agendar um agendamento.";
    }
}
?>
<html lang="pt-br">
<head>
    <title>EcoTech - Agendamento</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" type="text/css" href="IMG/ppiimagem.jpg">
    <link rel="stylesheet" type="text/css" href="styleagendar.css">
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
  <a href="/PPI/PAGSERVICO/servico.php" class="aa" style="margin-right:200px";>Serviço</a>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['nome'])) {
         echo '<a href="/PPI/PAGAGENDAMENTO/MeusAgendamentos.php" class="aa">Meus Agendamentos</a>';
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

 <form method="POST" action="agendar.php">
    <div class="container">
        <h1 class="w3-xxxlarge w3-text-green"><b>Agendamento</b></h1>
        <hr style="width:50px;border:5px solid green" class="w3-round">
        <div class="input-row">
            <div class="input-group">

<div class="input-container">
   <div class="input-row">
    <div class="input-group">
        <label for="tipo_lixo" class="label">Tipo de Lixo Eletrônico:</label>
        <input type="text" id="tipo_lixo" name="tipo_lixo" class="input-field" placeholder="Digite o tipo de lixo eletrônico">
    </div>

    <div class="input-group">
        <label for="quantidade" class="label">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" class="input-field" inputmode="numeric" min="0" max="999" placeholder="Digite a quantidade">
    </div>
</div>

<div class="input-row">
    <div class="input-group">
        <label for="tamanho" class="label">Tamanho:</label>
        <select id="tamanho" name="tamanho" class="input-field">
            <option value="pequeno">Pequeno</option>
            <option value="medio">Médio</option>
            <option value="grande">Grande</option>
        </select>
    </div>

    <div class="input-group">
        <label for="instrucoes" class="label">Instruções Especiais:</label>
        <textarea id="instrucoes" name="instrucoes" class="input-field" placeholder="Digite as informações especiais"></textarea>
    </div>
</div>


<div class="input-group">
    <label class="checkbox-label">
        <input type="checkbox" name="concordo_checkbox"> Concordo com os Termos e Condições
    </label>
</div>

<button class="button" type="submit">Realizar Agendamento</button>
</div>


    

<!-- End page content -->



<script>
// Script simplificado: a versão anterior referenciava elementos que não
// existem nesta página (#agendar, #confirmar, #telefone, #cpf, #green-button,
// #redirecionar, #navbar), o que quebrava a execução no primeiro erro.
document.getElementById("scroll-to-top").addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 0) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
</script>
</form>
</body>
</html>