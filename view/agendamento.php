<?php
    //include nor arquivos das classes de acordo com a classe instanciada
    include_once '../autoload.php';

    //instancia a classe controle
    $controleAgendamentos = new ControleAgendamentos();

    //chama a funcao 
    $agendamento = $controleAgendamentos->controleAcao("listarUnico",$_GET['profissional']);
    foreach($agendamento as $key => $value){
        $agendamento[$key] = (array) $value;
    }
    
    //configura o json
    $var = "";
    echo "[";
    foreach($agendamento as $key => $value){
        $var .= json_encode($agendamento[$key]).",";
    }
    //tira a ultima virgula
    $var = rtrim($var, ',');
    echo $var;
    echo "]";
?>