<?php
require_once 'classes/Sessao.php';

use classes\Sessao;

Sessao::iniciar();
Sessao::destruir();

if (isset($_COOKIE['emailOnCookie'])) {
    setcookie('emailOnCookie', '', time() - 3600, '/');
}
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/');
}

header('Location: login.php');
exit;
?>
