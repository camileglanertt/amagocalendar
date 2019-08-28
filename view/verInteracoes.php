<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';

  // Cabecalho
  $cabecalho_title = "Meu Calendário";
  include_once "inc/cabecalho.php";

  include_once "../autoload.php";

  $_GET['usuario'] = $_SESSION['usuario'][0]->email;
  $_GET['senha'] = $_SESSION['usuario'][0]->senha;

  $controleUsuario = new ControleUsuarios();
  $controleUsuario->setVisao($_GET);
  $quer =  $controleUsuario->controleAcao("listarUnico");

  $controleComentarios = new ControleComentarios();
  $comentarios =  $controleComentarios->controleAcao("listarUnico",  $_GET['usuario']);

  $controleAvaliacao = new ControleAvaliacao();
  $avaliacoes =  $controleAvaliacao->controleAcao("listarUnico",  $_GET['usuario']);

  if (isset($_GET['codigoComentario'])){
      $controleComentarios->setVisao($_GET);
      $excluiComentarios =  $controleComentarios->controleAcao("alterar");
      header ('Location: verInteracoes.php');
  }

?> 
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estrelas.css">
  <link rel="stylesheet" href="css/verInteracoes.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
              <div class="row">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a>
                    <?php
                      $profissional = $quer[0]->id;
                    $pasta ="anexos/FotoProfissional{$profissional}" ;
                    //se a pasra existir 
                    if (file_exists($pasta)) {
                        //glob é para 
                        $images=glob("$pasta/{*.*}",GLOB_BRACE);
                        $i = 0;
                        foreach ($images as $filename) {
                          echo"<img src= ".$filename.">";
                        }
                    }else{
                      echo"<img src= 'img/logo_calendar.png'>";
                    }
                    ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <h6 class="card-category"><?= isset($quer[0]->profissao) ? $quer[0]->profissao : "" ?></h6>
                    <h4 class="card-title"><?= isset($quer[0]->nome) ? $quer[0]->nome : "" ?></h4>
                    <p class="card-description">
                    <?= isset($quer[0]->biografia) ? $quer[0]->biografia : "" ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <?php
                  if($quer[0]){
                    if($quer[0]->quer_avaliacao == 1){
                      echo " <div class='w3-card-2 w3-margin' style='width:100%;'>
                      <header class='w3-container w3-light-grey w3-padding-16'>
                          <h3>Avaliações do meu trabalho</h3>
                      </header>
                      <ul class='w3-ul'>";
                      if (!empty($avaliacoes)){
                        $total = count($avaliacoes);
                        $soma=0;
                        foreach($avaliacoes as $key=>$value){
                          $soma = $soma + $avaliacoes[$key]->avaliacao;
                        }
                        $qtd = round($soma/$total);
                        echo "<form>
                        <div class='estrelas'>
                          <label for='estrela_um'><i class='fa'></i></label>
                          <input type='radio' id='estrela_um' name='estrela' disabled value='1'";
                          if ($qtd == 1){
                            echo "checked>";
                          }else{
                            echo ">";
                          }
                          
                          echo"<label for='estrela_dois'><i class='fa'></i></label>
                          <input type='radio' id='estrela_dois' name='estrela' disabled value='2'";
                          if ($qtd == 2){
                            echo "checked>";
                          }else{
                            echo ">";
                          }
                          echo"<label for='estrela_tres'><i class='fa'></i></label>
                          <input type='radio' id='estrela_tres' name='estrela' disabled value='3'";
                          if ($qtd == 3){
                            echo "checked>";
                          }else{
                            echo ">";
                          }
                          echo"<label for='estrela_quatro'><i class='fa'></i></label>
                          <input type='radio' id='estrela_quatro' name='estrela' disabled value='4'";
                          if ($qtd == 4){
                            echo "checked>";
                          }else{
                            echo ">";
                          }
                          echo"<label for='estrela_cinco'><i class='fa'></i></label>
                          <input type='radio' id='estrela_cinco' name='estrela' disabled value='5'";
                          if ($qtd == 5){
                            echo "checked>";
                          }else{
                            echo ">";
                          }
                        echo "</div>
                        </form>";
                      }else{
                        echo "<form  method='POST' action='#' enctype='multipart/form-data'>
                        <div class='estrelas'>
                        <input type='radio' id='vazio' name='estrela' value='' checked>
                        <label for='estrela_um'><i class='fa'></i></label>
                        <input type='radio' id='estrela_um' name='estrela' value='1'>
                        <label for='estrela_dois'><i class='fa'></i></label>
                        <input type='radio' id='estrela_dois' name='estrela' value='2'>
                        <label for='estrela_tres'><i class='fa'></i></label>
                        <input type='radio' id='estrela_tres' name='estrela' value='3'>
                        <label for='estrela_quatro'><i class='fa'></i></label>
                        <input type='radio' id='estrela_quatro' name='estrela' value='4'>
                        <label for='estrela_cinco'><i class='fa'></i></label>
                        <input type='radio' id='estrela_cinco' name='estrela' value='5'>
                        </div></form>";
                      }
                      echo "</ul></div>";
                    }else{
                      echo "<h1>Ative avaliações na aba Configurações</h1>";
                      echo "<p>As avaliações oferecem feedback avaliativo do seu trabalho para melhor relação com o cliente.</p>";
                    }
                  }
                ?>
              </div>
              <div class="row">
                <?php
                  if($quer[0]){
                    if($quer[0]->quer_comentario == 1){
                      echo "<div class='w3-card-2 w3-margin' style='width:100%;'>
                      <header class='w3-container w3-light-grey w3-padding-16'>
                          <h3>Comentários sobre meu trabalho</h3>
                      </header>
                      <ul class='w3-ul'>";
                      foreach($comentarios as $key=>$value){
                          $li = "<li class='w3-padding-16'>";
                          $li .= $comentarios[$key]->comentarista.": ".$comentarios[$key]->comentario;
                          $li .= "<span onclick='confirma(".$comentarios[$key]->id.")' style='cursor:pointer;' class='w3-right w3-margin-right'>x</span></li>";
                          echo $li;
                      }
                      echo "</ul> </div>";
                    }else{
                      echo "<h1>Ative comentários na aba Configurações</h1>";
                      echo "<p>Os comentários oferecem feedback descritivo do seu trabalho para melhor relação com o cliente.</p>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="js/verInteracoes.js"> </script>
  <?php
    include_once "inc/rodape.php";
  ?>