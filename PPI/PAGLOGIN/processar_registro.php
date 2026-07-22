<?php
require __DIR__ . "/../conexao.inc.php";

$nome_completo = $_POST["nome_completo"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $conn->prepare("INSERT INTO usuarios (nome_completo, cpf, telefone, endereco, email, senha) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nome_completo, $cpf, $telefone, $endereco, $email, $senha);

if ($stmt->execute()) {
    $conn->close();
    header("Location: teladelogin.php");
    exit();
}

echo "Erro ao registrar: " . $conn->error;
$conn->close();