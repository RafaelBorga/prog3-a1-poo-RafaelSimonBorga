<?php
$emailOnCookie = $_COOKIE['emailOnCookie'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="processa_login.php" method="POST">
        <label>Email:<br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $emailOnCookie; ?>" required>
        </label><br><br>

        <label>Senha:<br>
            <input type="password" name="pass" placeholder="Senha" required>
        </label><br><br>

        <label>
            <input type="checkbox" name="emailOnCookie" <?php if ($emailOnCookie) echo 'checked'; ?>> Lembrar e-mail
        </label><br><br>

        <button type="submit">Entrar</button>
    </form>
    <p>Não possui uma conta? <a href="cadastro.php">Registre-se!</a></p>
</body>
</html>