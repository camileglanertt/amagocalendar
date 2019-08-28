<?php
final class Config {
    const HOST_NAME = "localhost";
    const DATABASE_NAME = "aluno_amago";
    const DATABASE_USER_NAME = "root";
    const DATABASE_PASSWORD = "";
}

$conexao = new mysqli(
        Config::HOST_NAME, 
        Config::DATABASE_USER_NAME, 
        Config::DATABASE_PASSWORD, 
        Config::DATABASE_NAME);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
};