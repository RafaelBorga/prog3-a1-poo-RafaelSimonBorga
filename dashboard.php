<?php
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';

use classes\Sessao;

Sessao::iniciar();
$usuario = Sessao::get('usuario');

if (!$usuario) {
    header('Location: login.php');
    exit;
}

$nome = $usuario->getNome();
$emailCookie = $_COOKIE['email'] ?? 'Não salvo';

echo "<h1>Bem-vindo, $nome!</h1>";
echo "<p>Email salvo no cookie: $emailCookie</p>";
echo '<a href="logout.php">Logout</a>';
?>