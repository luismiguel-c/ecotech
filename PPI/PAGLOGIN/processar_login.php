<?php
require __DIR__ . "/../conexao.inc.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT id, nome_completo FROM usuarios WHERE email = \x27$email\x27 AND senha = \x27$senha\x27";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["id"];
    $_SESSION["nome"] = $row["nome_completo"];
    $conn->close();
    header("Location: /PPI/PAGINICIAL/index.php");
    exit(); // impede que o script continue apos o redirect
}

$conn->close();
echo "Email ou senha incorretos.";
