<?php
require __DIR__ . "/../conexao.inc.php";

$nome_completo = $_POST["nome_completo"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "INSERT INTO usuarios (nome_completo, cpf, telefone, endereco, email, senha)
        VALUES (\x27$nome_completo\x27, \x27$cpf\x27, \x27$telefone\x27, \x27$endereco\x27, \x27$email\x27, \x27$senha\x27)";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    // Bug corrigido: havia um echo antes do header(), o que impedia o redirect
    header("Location: teladelogin.php");
    exit();
}

echo "Erro ao registrar: " . $conn->error;
$conn->close();
