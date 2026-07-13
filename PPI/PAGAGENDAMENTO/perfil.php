<?php
session_start();

if (!isset($_SESSION['id'])) {
    // Redirecione o usuário para a página de login se não estiver autenticado
    header("Location: /PPI/PAGLOGIN/teladelogin.php");
    exit();
}

require __DIR__ . '/../conexao.inc.php'; // conexão única, credenciais fora do Git

$user_id = $_SESSION['id'];

// Consulta para obter informações do usuário e agendamento a partir do banco de dados
$sql = "SELECT u.nome_completo, u.cpf, u.telefone, u.endereco, u.email, a.tipo_lixo, a.quantidade, a.tamanho, a.instrucoes
        FROM usuarios u
        LEFT JOIN agendamentos a ON u.id = a.usuario_id
        WHERE u.id = $user_id";

$result = $conn->query($sql);

$nome_completo = $cpf = $telefone = $endereco = $email = "";
$tipo_lixo = $quantidade = $tamanho = $instrucoes = "";

if ($result) {
    if ($result->num_rows > 0) {
        // Recupere os dados do usuário e do agendamento
        $row = $result->fetch_assoc();
        $nome_completo = $row['nome_completo'];
        $cpf = $row['cpf'];
        $telefone = $row['telefone'];
        $endereco = $row['endereco'];
        $email = $row['email'];
        $tipo_lixo = $row['tipo_lixo'];
        $quantidade = $row['quantidade'];
        $tamanho = $row['tamanho'];
        $instrucoes = $row['instrucoes'];
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "Erro na consulta SQL: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="perfilstyle.css">
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="navbar">
            <span class="logo-text" style="margin-right:200px;">Ecotech</span>
            <br>
            <a href="/PPI/PAGINICIAL/index.php" class="aa">Início</a>
            <a href="/PPI/PAGSERVICO/servico.php" class="aa">Serviço</a>
            <a href="/PPI/PAGAGENDAMENTO/perfil.php" class="aa" style="margin-right:200px;">Perfil</a>

            <?php
            echo '<div class="user-info">';
            echo '<span class="user-name">' . $_SESSION['nome'] . '</span>';
            echo '<a href="sair.php" class="logout-button">Sair</a>';
            echo '</div>';
            ?>

            <a href="/PPI/PAGAGENDAMENTO/agendar.php" class="button aa" style="margin-left:90px;">Realizar Agendamento</a>
        </div>
    </nav>
    <div class="border-gradient" id="border-gradient"></div>

    <!-- Conteúdo do Perfil -->
    <div class="w3-container" style="margin-top:100px" id="showcase">
        <h1 class="w3-jumbo"><b></b></h1>
        <br><br><br>
        <h1>Seu Perfil</h1>

        <!-- Informações do Usuário -->
        <div id="user-info">
            <h2><?php echo $nome_completo; ?></h2>
            <p>CPF: <?php echo $cpf; ?></p>
            <p>Telefone: <?php echo $telefone; ?></p>
            <p>Endereço: <?php echo $endereco; ?></p>
            <p>Email: <?php echo $email; ?></p>
        </div>

        <!-- Informações de Agendamento -->
        <div id="agendamento-info">
            <h2>Agendamento</h2>
            <p>Tipo de Lixo Eletrônico: <?php echo $tipo_lixo; ?></p>
            <p>Quantidade: <?php echo $quantidade; ?></p>
            <p>Tamanho: <?php echo $tamanho; ?></p>
            <p>Instruções: <?php echo $instrucoes; ?></p>
        </div>
    </div>
    <!-- Adicione mais informações do perfil conforme necessário -->

    <!-- Script JavaScript para Editar Informações -->
    <script>
        const editIcon = document.getElementById("edit-icon");
        editIcon.addEventListener("click", () => {
        });

        // ... Seu código JavaScript adicional

    </script>
  </div>
</body>
</html>
