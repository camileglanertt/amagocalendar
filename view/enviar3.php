<?php 
$id = $_GET['id'];
array_map( "unlink", glob("$id",GLOB_BRACE) );

header('Location:editarPerfil.php');