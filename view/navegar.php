<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';

  // Cabecalho
  $cabecalho_title = "Meu Calendário";
  include_once "inc/cabecalho.php";

  include_once "../autoload.php";

  if($_POST){
    $controleTrabalhador = new ControleTrabalhador();
    $controleTrabalhador->setVisao($_POST);
    $pessoas = $controleTrabalhador->controleAcao("listarTodos");
  }
?> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="css/navegar.css">
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
            <form action="navegar.php" method="POST">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating" for="tipoPesquisa">Categoria de pesquisa</label>
                    <select onchange="filtro(this.value)" class="form-control" name="tipoPesquisa" id="tipoPesquisa">
                      <option value="profissao" selected >Profissão</option>
                      <option value="nome">Nome do Profissional</option>
                    </select>
                  </div>
                </div> 
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating" for="itemPesquisa">Filtro</label>
                    <div id="select">                        
                      <select class="selectpicker form-control" data-live-search="true" data-title= "Profissão" name="itemPesquisa">
                        <?php
                        include_once '../autoload.php';
                        $controleProfissao = new ControleProfissao();
                        $profissao =  $controleProfissao->controleAcao("listarUnico");
                        foreach ($profissao as $key=>$value){
                          $profissao[$key] = (array) $value;
                          echo "<option>".$profissao[$key]['profissao']."</option>";
                        }
                        ?>
                      </select>
                      </div>
                      <div id="inner"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">      
                    <label class="bmd-label-floating" for="cidade">Cidade</label>
                    <select class="selectpicker form-control" data-live-search="true" data-title= "Cidade" name="cidade">
                            <?php
                            $controleCidade = new ControleCidade();
                            $cidade =  $controleCidade->controleAcao("listarUnico");
                            foreach ($cidade as $key=>$value){
                                $cidade[$key] = (array) $value;
                                echo "<option>".$cidade[$key]['cidade']."</option>";
                            }
                            ?>
                        </select>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group"> 
                  <label class="bmd-label-floating" >.</label>
                    <button type="submit" class="btn btn-danger pull-right  form-control"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                
              </div>
            </form>
          </div>
          <div class="alert alert-danger">
          <h5>Os profissionais automaticamente serão ordenados pela faixa de preço</h5>
          </div>
            <div class="row">
              <?php
                if($_POST){
                  if (!empty($pessoas)){
                    foreach ($pessoas as $key=>$value){
                        $codigo = $pessoas[$key]->id;
                      echo " 
                      <div class='col'>
                        <a href='profile.php?prof=".$codigo."'>
                          <div class='card card-profile'>
                              <div class='card-avatar'>";
                                
                              $pasta ="anexos/FotoProfissional{$codigo}" ;
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
                              echo "</div>
                              <div class='card-body'>
                                  <h6 class='card-category'>{$pessoas[$key]->profissao}</h6>
                                  
                          <h5 class='card-title'>{$pessoas[$key]->nome} </h5>
                                  <h4 class='card-title'>{$pessoas[$key]->razaosocial}</h4>
                                  <p class='card-description'>
                                  {$pessoas[$key]->cidade}, {$pessoas[$key]->estado}<br>
                                  {$pessoas[$key]->site}<br>
                                  {$pessoas[$key]->preco}
                                  </p>
                              </div>
                          </div>
                        </a>
                      </div>";
                    }
                  }else{
                    echo '<div class="form-group"> <div class="alert alert-danger" role="alert">'."Nenhum(a) ".$_POST['itemPesquisa']." foi encontrado(a) em ".$_POST['cidade'].".</div></div>";
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
  <script src="js/navegar.js"></script>
  <?php
    include_once "inc/rodape.php";
  ?>