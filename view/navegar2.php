<?php
  include_once "inc/header.php";
  include_once "inc/menu.php";
?>
<link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">
<link rel="stylesheet" href="css/navegar2.css">
<section class="testimonials text-center mybg">
  <div class="container">
      <h2 class="mb-5"><?php echo $_POST['profissao']?> em <?php echo $_POST['cidade']?></h2>
        <div class="row"><?php
          include_once "../autoload.php";
          $controleTrabalhador = new ControleTrabalhador();
          $controleTrabalhador->setVisao($_POST);
          $pessoas =  $controleTrabalhador->controleAcao("listarUnico");
          if ($pessoas){
            foreach ($pessoas as $key=>$value){
                $codigo = $pessoas[$key]->id;
              echo " 
              <div class='col div-flt'>
                <a  class='a'href='profile2.php?prof=".$codigo."'>
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
            echo "<div class='col-md-12'><div class='alert alert-danger' role='alert'> Não há nenhum profissional disponível! </div></div></div>";
           
          }
        ?>
          </div>
          <div class='row'><div class='col-md-12'><a href='home.php' style='color:white !important' class='btn btn-primary botao'><ion-icon ios='ios-arrow-back' md='md-arrow-back' id='icon'></ion-icon></a></div>
 
  </div>
</section>
<script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
<?php
include_once "inc/footer.php";
?>