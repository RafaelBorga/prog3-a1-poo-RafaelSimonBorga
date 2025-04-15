<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

use classes\Usuario;
use classes\Autenticador;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);

    try {
        $usuario = new Usuario($nome, $email, $senha);
        Autenticador::registrar($usuario);
    } 
    catch (Exception $e) {
        echo 'Erro no cadastro'. $e->getMessage() .'';
    }
}
    else{
    header('Location: cadastro.php');
    exit;
}
?>