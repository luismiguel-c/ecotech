<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
</head>
<body>
    <form action="processar_login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Entrar">

        <p style="text-align:center; margin-top:16px;">
            Não tem uma conta? <a href="criarconta.php">Criar conta</a>
        </p>
    </form>
    
</body>
</html>
