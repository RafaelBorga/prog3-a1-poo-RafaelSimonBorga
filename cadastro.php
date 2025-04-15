<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="processa_cadastro.php" method="POST">
        <label>Nome:<br>
            <input type="text" name="name" required>
        </label><br><br>

        <label>Email:<br>
            <input type="email" name="email" required>
        </label><br><br>

        <label>Senha:<br>
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem cadastro? <a href="login.php">Faça login</a></p>
</body>
</html>