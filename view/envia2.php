<?php 
$id = $_GET['id'];

if(!empty($_FILES["Arquivo"])){
    $nome_temporario = $_FILES["Arquivo"]["tmp_name"]; 
    $nome_real = $_FILES["Arquivo"]["name"]; 
    if (!file_exists("anexos/Profissional{$id}/")) {
        mkdir(dirname(__FILE__)."/anexos/Profissional{$id}/", 0777, true);
    }
    copy($nome_temporario,"anexos/Profissional{$id}/{$nome_real}");
}
header('Location:editarPerfil.php');