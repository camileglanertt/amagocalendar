<?php 
$id = $_GET['id'];
if(!empty($_FILES["Arquivo"])){
    $nome_temporario = $_FILES["Arquivo"]["tmp_name"]; 
    $nome_real = $_FILES["Arquivo"]["name"]; 
    if (!file_exists("anexos/FotoProfissional{$id}/")) {
        mkdir(dirname(__FILE__)."/anexos/FotoProfissional{$id}/", 0777, true);
    }else{
        $pasta ="anexos/FotoProfissional{$id}" ;
        array_map( "unlink", glob("$pasta/{*.*}",GLOB_BRACE) );
    }
    copy($nome_temporario,"anexos/FotoProfissional{$id}/{$nome_real}");
}
header('Location:editarPerfil.php');