<?php

$custo = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ'; 
$s = crypt('senha123', '$2a$' . $custo . '$' . $salt . '$'); 
echo $s;

?>