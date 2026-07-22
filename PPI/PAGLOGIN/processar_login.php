<?php
require __DIR__ . "/../conexao.inc.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $conn->prepare("SELECT id, nome_completo FROM usuarios WHERE email = ? AND senha = ?");
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

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
