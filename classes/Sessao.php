<?php

namespace classes;

class Sessao {
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function destruir() {
        if (session_status() != PHP_SESSION_NONE) {
            session_unset();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            session_destroy();
        }
    }

    public static function set(string $chave, $valor) {
        $_SESSION[$chave] = $valor;
    }

    public static function get(string $chave) {
        return $_SESSION[$chave] ?? null;
    }

    public static function login(string $email) {
        self::iniciar();
        $_SESSION['user'] = $email;
    }

    public static function isLogged(): bool {
        self::iniciar();
        return isset($_SESSION['user']);
    }
}
