<?php
// Conexao unica com o banco. As credenciais ficam em config.php (fora do Git).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . "/config.php";

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
    die("Erro na conexao com o banco de dados: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
