<!DOCTYPE html>
<html>
<head>
    <title>Criar Conta</title>
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
</head>
<body>
    <form action="processar_registro.php" method="post">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
