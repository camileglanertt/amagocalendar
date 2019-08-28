<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';
  // Cabecalho
  $cabecalho_title = "Configurações";
  include_once "inc/cabecalho.php";
  
  include_once "../autoload.php";
  $_GET['usuario'] = $_SESSION['usuario'][0]->email;
  $_GET['senha'] = $_SESSION['usuario'][0]->senha;
  
  $controleUsuario = new ControleUsuarios();
  $controleUsuario->setVisao($_GET);
  $pessoa =  $controleUsuario->controleAcao("listarUnico");

  if(isset($_POST['preco'])){
    $_POST['usuario'] = $_SESSION['usuario'][0]->email;
    $duracao_expediente= gmdate('H:i', strtotime( $_POST['fim'] ) - strtotime( $_POST['inicio']));
                                        
    $expediente = '';
    foreach($_POST['expediente'] as $key=>$value){
        $expediente .= $_POST['expediente'][$key];
    }
  
    $_POST['duracao_expediente']=$duracao_expediente;
    $_POST['expediente']=$expediente;
    $controleProfile = new ControleProfile();
    $controleProfile->setVisao($_POST);
    $resultado =  $controleProfile->controleAcao("alterar");
    header ('Location: configuracoes.php');
  }
  
  if(isset($_POST['senha'])){
    $_POST['usuario'] = $_SESSION['usuario'][0]->email;
    $custo = '08';
    $salt = 'Cf1f11ePArKlBJomM0F6aJ';
    $_POST['senha'] = crypt($_POST['senha'], '$2a$' . $custo . '$' . $salt . '$');
    $controleProfissao = new ControleProfissao();
    $controleProfissao->setVisao($_POST);
    $r = $controleProfissao->controleAcao("alterar");
    $_SESSION['usuario'][0]->senha = $_POST['senha'];
    header ('Location: configuracoes.php');
  }
  
  if(isset($_POST['recursos'])){
  
    if (!isset($_POST['calendario'])){
      $_POST['calendario'] = "0";
    }else{ 
      $_POST['calendario'] = "1";
    }
    if (!isset($_POST['avaliacao'])){
      $_POST['avaliacao'] = "0";
    }else{
      $_POST['avaliacao'] = "1";
    }
    if (!isset($_POST['comentarios'])){
      $_POST['comentarios'] = "0";
    }else{
      $_POST['comentarios'] = "1";
    }
    $_POST['usuario'] = $_SESSION['usuario'][0]->email;
    $controleTrabalhador = new ControleTrabalhador();
    $controleTrabalhador->setVisao($_POST);
    $r = $controleTrabalhador->controleAcao("alterar");
    header ('Location: configuracoes.php');
  }
  ?><link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> 
  <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"></script>
  <link href="css/configuracao.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div class="wrapper ">
    <div class="sidebar" data-background-color="black" >
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
              <div class="col-md-12">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <?php
                      $profissional = $pessoa[0]->id;
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
                  </div>
                  <div class="card-body">
                    <h6 class="card-category"><?php echo $pessoa[0]->profissao; ?></h6>
                    <h4 class="card-title"><?php echo $pessoa[0]->nome; ?></h4>
                    <p class="card-description">
                      <?php echo $pessoa[0]->biografia ;?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <div class="card">
                  <div class="card-header card-header-dark" style="background-color:black">
                    <h4 class="card-title">Configurações da conta</h4>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col"></div>
                      <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalRecursos">
                        Recursos
                        </button>
                      </div>
                      <div class="col"></div>
                    </div>
                    <div class="row">
                      <div class="col"></div>
                      <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAtendimentos">
                        Atendimentos
                        </button>
                      </div>
                      <div class="col"></div>
                    </div>
                    <div class="row">
                      <div class="col"></div>
                      <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalSenha">
                        Senha
                        </button>
                      </div>
                      <div class="col"></div>
                    </div>
                    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="modalSenhaLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalSenhaLabel">Alterar Senha</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <form action="configuracoes.php" method="post">
                                <label class="bmd-label-floating">Senha</label>
                                <input type="password" id="senha" class="form-control" name='senha' >
                                <label class="bmd-label-floating">Confirmação da Senha</label>
                                <input type="password" id="confirmaSenha"onkeyup="validatePassword()" class="form-control" name='confirmaSenha'>
                                <div id="erro"></div>
                            </div>
                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modalRecursos" tabindex="-1" role="dialog" aria-labelledby="modalRecursosLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalRecursosLabel">Alterar Recursos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="configuracoes.php" method="post">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col"></div>
                                <div class="col-md-12"> 
                                <input type="hidden" name="recursos" value=1>
                                  <input class="form-check-input" type="checkbox" name="calendario" value="1" id="calendario" <?php echo ($pessoa[0]->quer_calendario == 1) ? "checked='checked'" : "" ?>>
                                  <label class="form-check-label" for="calendario">Calendário</label>
                                </div>
                                <div class="col"></div>
                              </div>
                              <div class="row">
                                <div class="col"></div>
                                <div class="col-md-12"> 
                                  <input class="form-check-input" type="checkbox" name="avaliacao" value="1" id="avaliacao" <?php echo ($pessoa[0]->quer_avaliacao == 1) ? "checked='checked'" : "" ?>>
                                  <label class="form-check-label" for="avaliacao">Avaliações Positivas e Negativas</label>
                                </div>
                                <div class="col"></div>
                              </div>
                              <div class="row">
                                <div class="col"></div>
                                <div class="col-md-12"> 
                                  <input class="form-check-input" type="checkbox" name="comentarios" value="1" id="comentarios" <?php echo ($pessoa[0]->quer_comentario == 1) ? "checked='checked'" : "" ?>>
                                  <label class="form-check-label" for="comentarios">Comentários</label>
                                </div>
                                <div class="col"></div>
                              </div>
                              <div class="row">
                                <div class="col"></div>
                                <div class="col-md-12">
                                  <p class="p">A equipe Âmago não se responsabiliza por comentários de má índole e/ou má reputação de avaliações. </p>
                                  <p class="p">Lembre-se que críticas construtivas devem ser consideradas para melhor atender seu próximo cliente. </p>
                                </div>
                                <div class="col"></div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modalAtendimentos" tabindex="-1" role="dialog" aria-labelledby="modalAtendimentosLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalAtendimentosLabel">Alterar Configurações do Atendimento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="configuracoes.php" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="bmd-label-floating">Duração média de cada atendimento</label>
                                <input type="text" class="tempo form-control" id="duracao_atendimento" name="duracao_atendimento" value="<?= isset($pessoa[0]->duracao_atendimento) ? $pessoa[0]->duracao_atendimento : "" ?>">
                                <label class="bmd-label-floating">Preço de cada atendimento</label>
                                <input type="text" class="dinheiro form-control"  id="preco" name="preco"  value="<?= isset($pessoa[0]->preco) ? $pessoa[0]->preco : "" ?>">
                                <label class="bmd-label-floating">Expediente</label>
                                <select class="form-control expediente" style="width:550px" name="expediente[]" multiple="multiple" required>
                                <?php
                                  $expediente = $pessoa[0]->dias_trabalhados;
                                  $arrayExpediente = str_split($expediente);

                                  
                                    $lista = "<option value='1'";
                                     if(in_array("1", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.= " >Domingo</option>"; 
                                    $lista .= "<option value='2'";
                                    if(in_array("2", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.= " >Segunda-feira</option>"; 
                                    $lista .= "<option value='3'";
                                    if(in_array("3", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.=  " >Terça-feira</option>"; 
                                    $lista .= "<option value='4'";
                                    if(in_array("4", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.=  " >Quarta-feira</option>"; 
                                    $lista .= "<option value='5'";
                                    if(in_array("5", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.=  " >Quinta-feira</option>"; 
                                    $lista .= "<option value='6'";
                                    if(in_array("6", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.= " >Sexta-feira</option>"; 
                                    $lista .= "<option value='7'";
                                    if(in_array("7", $arrayExpediente)) {
                                      $lista.= "selected";
                                    }
                                    $lista.=  " >Sábado</option>"; 
                                  
                                  echo $lista;
                                  ?>
                                </select>
                                <div class="row">
                                  <?php
                                    $inicio = $pessoa[0]->inicio_expediente;
                                    $fim = $pessoa[0]->fim_expediente;
                                    ?>
                                  <div class="col-md-5">
                                    <label for="inicio">Tempo de Expediente</label>
                                  </div>
                                  <div class="col-md-3">
                                    <input class="form-control" type="time" name="inicio" id="inicio" value="<?= isset($inicio) ? $inicio : "" ?>">
                                  </div>
                                  às
                                  <div class="col-md-3">
                                    <input class="form-control" type="time" name="fim" id="fim" value="<?= isset($fim) ? $fim : "" ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  $('.dinheiro').mask("#.##0,00", {reverse: true});
  $('.tempo').mask('0h 00min');
  </script>
  <script type="text/javascript">
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
 <script  src="js/configuracoes.js"></script>
