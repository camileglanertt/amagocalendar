<?php
// éo header
include_once "inc/header.php";
include_once "inc/menu.php";

$profissional = $_GET['prof'];
include_once "../autoload.php";
$controleProfile = new ControleProfile();
$pessoa = $controleProfile->controleAcao("listarUnico", $profissional);

if(isset($_GET['comentario'])){
  $controleComentario = new ControleComentarios();
  $controleComentario->setVisao($_GET);
  $controleComentario->controleAcao("inserir");
}

if(isset($_POST['estrela'])){
  $controleAvaliacao = new ControleAvaliacao();
  $controleAvaliacao->setVisao($_POST);
  $controleAvaliacao->controleAcao("inserir");
}
?>
<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estrelas.css">
<link rel="stylesheet" href="css/profile2.css">
<style>
.carousel-inner{
  max-width: 514px !important;
    max-height: 514px !important;
    min-width: 514px !important;
    min-height: 514px !important
}


</style>
<section class="testimonials mybg">
  <div class="container">
    <?php
      $arquivo = basename( __FILE__ );
      echo '<input type="hidden" id="pagina" value="'. $arquivo.'">';
      echo '<input type="hidden" id="profissional" value="'. $pessoa[0]->nome.'">';
      echo '  <input type="hidden" id="profissionalId" value="'. $pessoa[0]->id. '">';
              echo '  <input type="hidden" id="duracaoAtendimento" value="'. $pessoa[0]->duracao_atendimento. '">';
              echo '  <input type="hidden" id="diasTrabalhados" value="'. $pessoa[0]->dias_trabalhados. '">';
              echo '  <input type="hidden" id="inicioExpediente" value="'. $pessoa[0]->inicio_expediente. '">';
              echo '  <input type="hidden" id="fimExpediente" value="'. $pessoa[0]->fim_expediente. '">';
      include_once "inc/profile.inc.php";
    ?>
  </div>
</section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src='../assets/js/jquery-1.10.2.js' type="text/javascript"></script>
  <script src='../assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
  <script src='packages/core/main.js'></script>
  <script src='packages/interaction/main.js'></script>
  <script src='packages/daygrid/main.js'></script>
  <script src='packages/timegrid/main.js'></script>
  <script src='packages/core/locales-all.js'></script>
  <script src='packages/core/locales/pt-br.js'></script>
  <script src='packages/rrule/main.js'></script>
  <script src='js/fullcalendar2.js'></script>