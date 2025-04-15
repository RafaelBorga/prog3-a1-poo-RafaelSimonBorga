<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

use classes\Autenticador;
use classes\Sessao;

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);
    $lembrar = isset($_POST['lembrar']);

    $usuario = Autenticador::autenticar($email, $senha);

    if ($usuario) {
        Sessao::set('usuario', $usuario);

        if ($lembrar) {
            setcookie('email', $email, time() + 86400); // 1 dia
        }

        header('Location: dashboard.php');
        exit;
    } else {
        echo "Credenciais inválidas.";
        header("Location: login.php");
    }
}
?>