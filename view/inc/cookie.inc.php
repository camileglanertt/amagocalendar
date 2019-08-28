<?php
//inicia a sessao
session_start();

// Verifica se existe os dados da sessão de login 
if (isset($_COOKIE["logado"])) {
    //se usuario clicou em lembrar 
    if ($_COOKIE["logado"] == 'on') {
        //sessao recebe o nome de usuario
        $_SESSION["usuario"] = $_COOKIE["usuario"];
    }
}

//se nao existe registros na sessao
if (!isset($_SESSION["usuario"])) {
    //  Redireciona para a página de login 
    header("Location: ../view/login.php");
    exit;
}

$usuario = $_SESSION['usuario'];