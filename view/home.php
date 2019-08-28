<?php
    include_once "inc/header.php";
    include_once "inc/menu.php";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">
<header class="masthead  text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top: 25% !important">
            <div class="col-sm-4 imagem">
                <img width='80%' id='img' src='img/logo_calendar.png'/>
            </div>
            <div class="col-sm-8 input">
                <h3>Agende agora um horário para atendimento</h3>
                <h5>Selecione o profissional e a cidade mais próxima a você.</h5>
                <br>
                <form action="navegar2.php" method="post">
                    <div class="form-group" >
                        <select class="selectpicker" data-live-search="true" data-title= "Profissão" name="profissao" required>
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
                    <div class="form-group">
                        <select class="selectpicker" data-live-search="true" data-title= "Cidade" name="cidade" required>
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
                    <button type="submit" class="btn btn-primary botao"><ion-icon ios="ios-arrow-forward" md="md-arrow-forward" id='icon'></ion-icon></button>
                </form>
            </div>
        </div>
    </div>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

<script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>