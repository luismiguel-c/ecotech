<?php
// Sessão e conexão iniciadas ANTES de qualquer saída HTML
// (session_start() após output causa "headers already sent")
require __DIR__ . '/../conexao.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>EcoTech</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="icon" type="text/css" href="IMG/ppiimagem.jpg">
 <link rel="stylesheet" type="text/css" href="MeusAgendamentos.css">
 <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-excluir {
            background-color: green;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
        }

        .btn-excluir:hover {
            background-color: darkgreen;
        }
    </style>
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
  <a href="/PPI/PAGSERVICO/servico.php" class="aa" style="margin-right:200px;">Serviço</a>
  <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
        if (isset($_SESSION['nome'])) {
            echo '<a href="/PPI/PAGAGENDAMENTO/MeusAgendamentos.php" class="aa">Meus Agendamentos</a>';
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
    
  <!-- Services -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $idAgendamento = intval($_POST['excluir']);
    $usuario_id = intval($_SESSION['id']);

    // Bug corrigido: agora só exclui agendamentos do próprio usuário logado
    $sqlExclusao = "DELETE FROM agendamentos WHERE id = $idAgendamento AND usuario_id = $usuario_id";

    if ($conn->query($sqlExclusao) === TRUE) {
        echo "<p>Agendamento excluído com sucesso!</p>";
        // Removida a "renumeração de IDs" da versão antiga: ela usava uma
        // coluna inexistente (idagendamento) e, em bancos relacionais, IDs
        // não devem ser renumerados — são identificadores, não posição.
    } else {
        echo "<p>Erro ao excluir o agendamento: " . $conn->error . "</p>";
    }
}

// Bugs corrigidos na listagem:
// 1) A query antiga era SELECT * de agendamentos mas a tabela exibia colunas
//    de usuários (nome, cpf, endereço...) que não existem lá -> agora há JOIN.
// 2) Listava agendamentos de TODOS os usuários -> agora filtra pelo logado.
$usuario_id = intval($_SESSION['id']);
$sql = "SELECT a.id, u.nome_completo, a.tipo_lixo, a.quantidade, a.tamanho,
               a.data, a.instrucoes
        FROM agendamentos a
        INNER JOIN usuarios u ON u.id = a.usuario_id
        WHERE a.usuario_id = $usuario_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<form method='post'>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Tipo de Lixo</th><th>Quantidade</th><th>Tamanho</th><th>Data</th><th>Instruções</th><th>Ação</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome_completo"] . "</td>";
        echo "<td>" . $row["tipo_lixo"] . "</td>";
        echo "<td>" . $row["quantidade"] . "</td>";
        echo "<td>" . $row["tamanho"] . "</td>";
        echo "<td>" . ($row["data"] ?? '-') . "</td>";
        echo "<td>" . $row["instrucoes"] . "</td>";
        echo "<td><button class='btn-excluir' type='submit' name='excluir' value='" . $row["id"] . "'>Excluir</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "Nenhum agendamento encontrado.";
}

$conn->close();
?>

<script>
// Script simplificado: a versão anterior referenciava elementos inexistentes
// (#mySidebar, #redirecionar, #navbar), quebrando a execução.
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

</body>
</html>


