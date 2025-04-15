<?php

namespace classes;
class Usuario {
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = htmlspecialchars(strip_tags($nome));
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function autenticar(string $senha): bool {
        return password_verify($senha, $this->senha);
    }
}
