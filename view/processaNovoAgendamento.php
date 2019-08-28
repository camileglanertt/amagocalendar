<?php
include_once '../autoload.php';
if(isset($_GET['profissional'])){
    $array = explode("-",$_GET['start']);
    switch($array[2]){
      case 'Jan': $array[2] = '01' ; break;
      case 'Feb': $array[2] = '02' ; break;
      case 'Mar': $array[2] = '03' ; break;
      case 'Apr': $array[2] = '04' ; break;
      case 'May': $array[2] = '05' ; break;
      case 'Jun': $array[2] = '06' ; break;
      case 'Jul': $array[2] = '07' ; break;
      case 'Aug': $array[2] = '08' ; break;
      case 'Sep': $array[2] = '09' ; break;
      case 'Oct': $array[2] = '10' ; break;
      case 'Nov': $array[2] = '11' ; break;
      case 'Dec': $array[2] = '12' ; break;
    }
    $_GET['start'] = $array[0]."-". $array[1]."-".$array[2];
    if(isset($array[4])){
      $_GET['start'] .= " ".$array[4];
    }

    $end = explode("T",$_GET['end']);
    $array22 = explode("-", $end[1]);
    $array222 = explode (":", $array22[0]);
    $array2  = explode("-", $end[0]);
    switch($array2[2]){
      case 'Jan': $array2[2] = '01' ; break;
      case 'Feb': $array2[2] = '02' ; break;
      case 'Mar': $array2[2] = '03' ; break;
      case 'Apr': $array2[2] = '04' ; break;
      case 'May': $array2[2] = '05' ; break;
      case 'Jun': $array2[2] = '06' ; break;
      case 'Jul': $array2[2] = '07' ; break;
      case 'Aug': $array2[2] = '08' ; break;
      case 'Sep': $array2[2] = '09' ; break;
      case 'Oct': $array2[2] = '10' ; break;
      case 'Nov': $array2[2] = '11' ; break;
      case 'Dec': $array2[2] = '12' ; break;
    }
    $_GET['end'] = $array2[0]."-". $array2[1]."-".$array2[2];
$horario = explode(" ", $_GET['duracaoAtendimento'] );
$hora = substr($horario[0], 0, -1);   
$minuto = substr($horario[1],0, -3);  
$horaTotal = $hora + $array222[0];
$minutosTotal = $minuto+ $array222[1];
//  e se a soma dos minutos der maior que 60?
if($minutosTotal >= 60){
$horaTotal++;
$minutosTotal = $minutosTotal - 60;
}
$_GET['end'] .= " ".$horaTotal.":".$minutosTotal.":00";
echo $_GET['end'];
    
    $controleAgendamentos = new ControleAgendamentos();
    $controleAgendamentos->setVisao($_GET);
    $calendario =  $controleAgendamentos->controleAcao("inserir");
    
     header("Location:".$_GET['pagina'].".php");
  }
?>