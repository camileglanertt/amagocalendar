<?php
    include_once 'inc/headerCad.php';
?>
    <!-- css da pagina -->
    <link href="css/login.css" type="text/css" rel="stylesheet" />
    <link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col" id="coll"></div>
                <div class="col">
                    <div class="row justify-content-md-right">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col-md-auto"> <h1><a id='criar' href='cadastrar.php'>Crie sua conta</a></h1></div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col"></div>
                                <div class="col-md-auto"> 
                                    <h1>Faça Login</h1>
                                </div>
                                <div class="col"></div>
                            </div>
                                <div class="col"></div>
                                    <div class="col-md-auto"> 
                                        <form id="formulario" action="../controller/seguranca.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control a" id="usuario" name='usuario' placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control a" id="senha" name='senha'placeholder="Senha">
                                            </div>
                                            <div class="form-check">
                                                <div class="row justify-content-md-center">
                                                    <div class="col"></div>
                                                    <div class="col-md-auto"> 
                                                        <input class="form-check-input" type="checkbox" value="" id="lembrar">
                                                        <label class="form-check-label" for="lembrar">Lembre-me</label>
                                                        <a id='esqueci'href='esqueceuSenha.php'>Esqueceu a senha?</a></h1>
                                                    </div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>
                                            <?php
                                                if ($_GET) {
                                                    if (isset($_GET["o"])) {
                                                        if ($_GET["o"] == "e") {
                                                            echo '<div class="alert alert-danger" role="alert">
                                                                    Usuario ou senha incorretos!
                                                            </div>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            <div class="row justify-content-md-center">
                                                <div class="col"></div>
                                                <div class="col-md-auto"> 
                                                    <a href='home.php' class="btn btn-primary botao2"><ion-icon ios="md-arrow-back" md="md-arrow-back" id='icon'></ion-icon></a>
                                                    <button type="submit" class="btn btn-primary botao"><ion-icon ios="ios-arrow-forward" md="md-arrow-forward" id='icon'></ion-icon></button>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>
    <script src="js/login.js"></script>
    <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
</body>