<?php

namespace classes;
require_once "Usuario.php";
require_once "Sessao.php";

use classes\Session;
use classes\Usuario;
class Autenticador {
    public static function usuarios(){
        Session::sessionStart();
        return $_SESSAO['usuarios'] ?? [];
    }

    public static function registrar(Usuario $usuario): void {
        Session::sessionStart();
        $_SESSAO['usuarios'][] = $usuario;
    }

    public static function autenticar($email, $senha): ?Usuario {
        foreach (self::$usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                if ($usuario->PassHashVerification($senha)) 
                    Session::login($usuario);
                return true;
            }
        }
        return false;
    }
}
?>