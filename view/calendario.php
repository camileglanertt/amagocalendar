<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';
  // Cabecalho
  $cabecalho_title = "Meu Calendário";
  include_once "inc/cabecalho.php";
  
  $_GET['usuario'] = $_SESSION['usuario'][0]->email;
  $_GET['senha'] = $_SESSION['usuario'][0]->senha;

  include_once "../autoload.php";
  $controleUsuario = new ControleUsuarios();
  $controleUsuario->setVisao($_GET);
  $calendario =  $controleUsuario->controleAcao("listarUnico");
if(isset($_GET['delete'])){
  
  if($_GET['delete']==1){
    
    $hoje = date('d/m/Y');
    $diadepois = date('d/m/Y', strtotime('+2 days'));
    if($_GET['date'] > $hoje){
      if($_GET['date'] > $diadepois){
        $controleAgendamento = new ControleAgendamentos();
        $controleAgendamento->setVisao($_GET);
        $controleAgendamento->controleAcao("alterar");
      }
    }
  }else{
    echo"casada";
  }
}
?> 
<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />

</head>
<body>
  <style type="text/css">
    @media print {
      /*elimina o que não é necessário imprimir*/
      form { 
        display:none; 
      }
    }
  </style>
  <input type="hidden" id="profissional" value="<?php echo $calendario[0]->nome; ?>">
  <?php
    if (isset($calendario[0]->cpf)){
      echo '  <input type="hidden" id="profissionalId" value="'. $calendario[0]->id. '">';
      echo '  <input type="hidden" id="duracaoAtendimento" value="'. $calendario[0]->duracao_atendimento. '">';
      echo '  <input type="hidden" id="diasTrabalhados" value="'. $calendario[0]->dias_trabalhados. '">';
      echo '  <input type="hidden" id="inicioExpediente" value="'. $calendario[0]->inicio_expediente. '">';
      echo '  <input type="hidden" id="fimExpediente" value="'. $calendario[0]->fim_expediente. '">';
    } 
  ?>
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
          <div class="row">
              <?php 
                if($calendario[0]){
                  if($calendario[0]->quer_calendario == 1){
                    echo "<div id='wrap'>
                            <div id='calendar'></div>
                            <div style='clear:both'></div>
                          </div>";
                  }else{
                    echo "<h1>Ative o seu calendário na aba Configurações</h1>";
                    echo "<p>O calendário oferece melhor organização e facilidade para sua relação com o cliente.</p>";
                  }
                }
              ?>
          </div>
        </div>
      </div>
      <form>
    <input type="button" value="Imprimir calendário" onClick="window.print()"/>
  </form>
  <?php
    include_once "inc/rodape.php";
  ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src='packages/core/main.js'></script>
  <script src='packages/interaction/main.js'></script>
  <script src='packages/daygrid/main.js'></script>
  <script src='packages/timegrid/main.js'></script>
  <script src='packages/core/locales-all.js'></script>
  <script src='packages/core/locales/pt-br.js'></script>
  <script src='packages/rrule/main.js'></script>
  <script src='js/fullcalendar.js'></script>
  