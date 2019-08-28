<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';

  // Cabecalho
  $cabecalho_title = "Meu Calendário";
  include_once "inc/cabecalho.php";

  include_once "../autoload.php";
  $controleProfile = new ControleProfile();
  $pessoa = $controleProfile->controleAcao("listarUnico", $_GET['prof']);

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
<link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
<style>
.carousel-inner{
  max-width: 751.5px !important;
    max-height: 751.5px !important;
    min-width: 751.5px !important;
    min-height: 751.5px !important
}

</style>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar"  data-background-color="black" >
      <?php 
        include_once "inc/side-bar.php"
      ?>
      <div class="main-panel">
        <?php
          include_once 'inc/navbar.php';
        ?>
        <div class="content">
          <div class="container-fluid">
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
         
        </div>
      </div>
    </div>
  </div>
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
  <?php
    include_once "inc/rodape.php";
  ?>