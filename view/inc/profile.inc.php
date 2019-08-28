    <?php
    if (isset($pessoa[0]->cnpj)){
      $profissional = $pessoa[0]->cnpj;
    }else if (isset($pessoa[0]->cpf)){
      $profissional = $pessoa[0]->cpf;
    }
    ?>
  <style>
  .card-profile .card-avatar{
    max-width: 130px !important;
    max-height: 130px !important;
    min-width: 130px !important;
    min-height: 130px !important
}



</style>
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
                <h6 class="card-category text-center"><?php echo $pessoa[0]->profissao;  ?></h6>
                <h4 class="card-title text-center"><?php echo $pessoa[0]->nome; ?></h4>
                <h3 class="card-title text-center"><?= isset($pessoa[0]->razaosocial) ? $pessoa[0]->razaosocial : "" ?></h3>
                <p class="card-description text-center">
                <?php echo $pessoa[0]->biografia; 
                
                $controleAvaliacao = new ControleAvaliacao();
                $avaliacoes =  $controleAvaliacao->controleAcao("listarUnico", $pessoa[0]->email);
                if (!empty($avaliacoes)){
                  $total = count($avaliacoes);
                  $soma=0;
                  foreach($avaliacoes as $key=>$value){
                    $soma = $soma + $avaliacoes[$key]->avaliacao;
                  }
                  $qtd = round($soma/$total);
                  echo "<form>
                    <div class='estrelas  text-center'>
                        <label for='um'><i class='fa'></i></label>
                        <input type='radio' id='um' disabled value='1'";
                        if ($qtd == 1){
                          echo "checked>";
                        }else{
                          echo ">";
                        }
                        
                        echo"<label for='dois'><i class='fa'></i></label>
                        <input type='radio' id='dois' disabled value='2'";
                        if ($qtd == 2){
                          echo "checked>";
                        }else{
                          echo ">";
                        }
                        echo"<label for='tres'><i class='fa'></i></label>
                        <input type='radio' id='tres' disabled value='3'";
                        if ($qtd == 3){
                          echo "checked>";
                        }else{
                          echo ">";
                        }
                        echo"<label for='quatro'><i class='fa'></i></label>
                        <input type='radio' id='quatro' disabled value='4'";
                        if ($qtd == 4){
                          echo "checked>";
                        }else{
                          echo ">";
                        }
                        echo"<label for='cinco'><i class='fa'></i></label>
                        <input type='radio' id='cinco' disabled value='5'";
                        if ($qtd == 5){
                          echo "checked>";
                        }else{
                          echo ">";
                        }
                    echo "</div></form>";
                  }else{
                    echo "<form  method='POST' action='#' enctype='multipart/form-data'>
                    <div class='estrelas'>
                    <input type='radio' id='vazio' name='estrela' value='' checked>
                        <label for='estrela_um'><i class='fa'></i></label>
                        
                        <label for='estrela_dois'><i class='fa'></i></label>
                        
                        <label for='estrela_tres'><i class='fa'></i></label>
                        
                        <label for='estrela_quatro'><i class='fa'></i></label>
                        
                        <label for='estrela_cinco'><i class='fa'></i></label>
                        
                        </div></form>"; 
                  }
                ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card"> 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                      <a href="tel:<?php echo $pessoa[0]->telefone?>"><button type="button" class="btn btn-danger"><?php echo $pessoa[0]->telefone?></button></a>

                      <?php
                      if ($arquivo != 'user.php'){
                        echo'<a href=""  class="btn btn-dark" data-toggle="modal" data-target="#modalCalendario">Agendar atendimento</a>';
                      }
                        ?>
                      </div>
                      <div class="form-group col-md-12">
                        <h1><?php echo "R$".$pessoa[0]->preco?></h1><h5> por atendimento.</h5>
                      </div>
                      <div class="form-group col-md-12">
                        <h4><?= isset($pessoa[0]->email) ? $pessoa[0]->email : "" ?></h4>
                      </div>
                      <div class="form-group col-md-12">
                        <h2><?= isset($pessoa[0]->endereco) ? $pessoa[0]->endereco : "" ?> - <?= isset($pessoa[0]->cidade) ? $pessoa[0]->cidade.", ".$pessoa[0]->estado : "" ?></h2>
                      </div> 
                      <div class="form-group col-md-12">
                        <h4><?= isset($pessoa[0]->cep) ? $pessoa[0]->cep : "" ?></h4> 
                      </div> 
                      <div class="form-group col-md-12">
                        <h4><?= isset($pessoa[0]->cnpj) ? $pessoa[0]->cnpj : "" ?></h4>
                        <h4><?= isset($pessoa[0]->cpf) ? $pessoa[0]->cpf : "" ?></h4>
                      </div>  
                      <div class="form-group col-md-12">
                        <h4><?= isset($pessoa[0]->site) ? "<a href='".$pessoa[0]->site."'>".$pessoa[0]->site."</a>" : "" ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <?php 
                        $pasta ="anexos/Profissional{$profissional}" ;
                        if (file_exists($pasta)) {
                            $images= glob("$pasta/{*.*}",GLOB_BRACE);
                            $i = 0;
                            foreach ($images as $filename) {
                              $i++;
                              $li =  "<li data-target='#carouselExampleIndicators' data-slide-to=".$i;
                              if ($i == 1){
                                $li .= "class='active'";
                              }
                              $li .= "></li>";
                              echo $li;
                            }
                          }
                        ?>
                      </ol>
                      <div class="carousel-inner">
                        <?php
                          $pasta ="anexos/Profissional{$profissional}" ;
                          if (file_exists($pasta)) {
                              $images= glob("$pasta/{*.*}",GLOB_BRACE);
                              $i = 0;
                              foreach ($images as $filename) {
                                $i++;
                                echo"<div class='carousel-item";
                                if ($i == 1){
                                  echo " active";
                                }
                                echo "'>";
                                echo "<img class='d-block w-100' src=".$filename.">";
                                echo"</div>";
                              }
                          }else{
                            if ($arquivo == 'user.php'){
                              echo "<h3>Adicione fotos do seu negócio na aba Editar Perfil</h3>";
                              echo "<p>As fotos do negócio oferecem mais confiabilidade do negócio para o cliente.</p>";
                
                            }
                          }
                        ?>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
             
          <div class="col-md-12">
            <div class="card"> 
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <?php
                      if ($arquivo != 'user.php'){
                        echo "<a href='' class='btn btn-info' data-toggle='modal' data-target='#modalAdicionarComentario'>Comentar</a>
                        <a href='' class='btn btn-info' data-toggle='modal' data-target='#modalAdicionarAvaliacao'>Avaliar</a>";
                      }
                      ?>
                    </div>
                  </div>
                  <?php
                    $controleComentarios = new ControleComentarios();
                    $comentarios =  $controleComentarios->controleAcao("listarUnico",  $pessoa[0]->email);
                    foreach($comentarios as $key=>$value){
                      echo "<div class='card'> <div class='card-body'>";
                      echo "<span style='font-weight:bolder; color:red'>".$comentarios[$key]->comentarista.":</span><br> ".$comentarios[$key]->comentario;
                      echo " </div> </div>";
                    }
                  ?>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalCalendario"  role="dialog" aria-labelledby="modalCalendarioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCalendarioLabel">Agende seu horário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='wrap'>
                    <div id='calendar'></div>
                    <div style='clear:both'></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalAdicionarComentario" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarComentarioLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modalAdicionarComentarioLabel">Adicionar Comentário</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
           echo "<form action=".$arquivo." method='get'>";
          ?>
          <div class="modal-body">
            
              <input type="hidden" name="prof" value="<?php echo $profissional?>">
              <div class="form-group">
                <label class="bmd-label-floating" for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome">
              </div>
              <div class="form-group">
                <label class="bmd-label-floating" for="comentario">Comentário</label>
                <textarea class="form-control" name="comentario" id="comentario"> </textarea>
              </div>
           
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
        </form>
      </div>
  </div>

  <div class="modal fade" id="modalAdicionarAvaliacao" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarAvaliacaoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modalAdicionarAvaliacaoLabel">Adicionar Avaliação</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="#" enctype="multipart/form-data">
          <div class="modal-body">
              <input type="hidden" name="prof" value="<?php echo $profissional?>">
              <div class="estrelas">
                  <input type="radio" id="vazio" name="estrela" value="" checked>
                  
                  <label for="estrela_um"><i class="fa"></i></label>
                  <input type="radio" id="estrela_um" name="estrela" value="1">
                  
                  <label for="estrela_dois"><i class="fa"></i></label>
                  <input type="radio" id="estrela_dois" name="estrela" value="2">
                  
                  <label for="estrela_tres"><i class="fa"></i></label>
                  <input type="radio" id="estrela_tres" name="estrela" value="3">
                  
                  <label for="estrela_quatro"><i class="fa"></i></label>
                  <input type="radio" id="estrela_quatro" name="estrela" value="4">
                  
                  <label for="estrela_cinco"><i class="fa"></i></label>
                  <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
                  
              </div>
            
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
          </form>
        </div>
      </div>
  </div>