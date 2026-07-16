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
        <input type="text" name="cpf" id="cpf" required><br>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Cadastrar">
    </form>
    <script>

    const cpf = document.getElementById('cpf');
    if (cpf) {
        cpf.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            this.value = v;
        });
    }

    const tel = document.getElementById('telefone');
    if (tel) {
        tel.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{2})(\d)/, '($1) $2');
            v = v.replace(/(\d{5})(\d)/, '$1-$2');
            this.value = v;
        });
    }
        </script>
</body>
</html>
