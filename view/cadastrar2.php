<?php
include_once 'inc/headerCad.php';
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <!-- css da pagina -->
    <link href="css/cadastrar.css" type="text/css" rel="stylesheet" />
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   
  <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"></script>
</head>
<body>
    <div class="container-fluid" >
        <div class="row">
        <div class="col" id="coll"></div>
            <div class="col auto">
                <div class="row justify-content-md-center">
                    <div id="muda" class="container vertical-align" >
                        <div class="row justify-content-md-center">
                            <div class="col"></div>
                            <div class="col-md-auto">
                                <h1>Crie sua conta</h1>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="col"></div>
                        <div class="col-md-auto">
                        <form action="cadastrar3.php" method="post" id="formulario" name="formulario">
                            <div class="row justify-content-md-center">
                                <div class="col"></div>
                                <div class="col-md-auto"><h4>Sua localização</h4></div>
                                <div class="col"></div>
                            </div>
                                <?php
                                echo "<input type='hidden' name='telefone' value='".$_POST['telefone']."'>";
                                echo "<input type='hidden' name='razaoSocial' value='".$_POST['razaoSocial']."'>";
                                echo "<input type='hidden' name='cnpj' value='".$_POST['cnpj']."'>";
                                echo "<input type='hidden' name='nome' value='".$_POST['nome']."'>";
                                echo "<input type='hidden' name='cpf' value='".$_POST['cpf']."'>";

                                ?>
                                <!-- sua localização -->
                                <div class="form-group">
                                    <input type="text" class="cep form-control" id="cep" placeholder="CEP" name="cep">
                                </div>
                                <div class="form-group">
                                    <select class="form-control a" id="estados" name="estado"></select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control a" id="cidades" name="cidade"></select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control a" id="endereco" placeholder="Endereço ex. Av. Osvaldo Aranha, 322 - Bairro Petropólis" name="endereco">
                                </div>
                                
                                <div class="row justify-content-md-center">
                                    <div class="col"></div>
                                    <div class="col-md-auto">
                                        
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
    <script type="text/javascript">
    $('.cep').mask('00.000-000');
    </script>
    
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <!-- js da pagina -->
    <script src="js/cidades.js"></script>
    <script src="js/cadastrar.js"></script>
    <script src="js/profissoes.js"></script>
    <script src="js/editarPerfil.js"></script>
    <script type="text/javascript">

    $("#formulario").validate({
        rules: {
            nome: {
                required: true,
                minlength: 3
            },
            usuario: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 8
            },
            cep: {
                required: true,
                minlength: 8,
                maxlength: 11
            },
            estado: {
                required: true
            },
            cidade: {
                required: true
            },
            endereco: {
                required: true,
                minlength: 15
            },
            telefone: {
                required: true,
                minlength: 8
            },
            profissao: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "Por favor, informe seu nome",
                minlength: "Informe seu nome completo"
            },
            usuario: {
                email: "Informe um email válido",
                required: "É necessário informar um email"
            },
            senha: {
                required: "Por favor, informe a senha",
                minlength: "Digite no minímo 8 caracteres"
            },
            cep: {
                required: "Por favor, informe seu CEP",
                minlength: "O CEP informado não está completo",
                maxlength: "O CEP informado não é válido"
            },
            estado: {
                required: "Por favor, informe o seu estado"
            },
            cidade: {
                required: "Por favor, informe a sua cidade"
            },
            endereco: {
                required: "Informe seu endereço completo",
                minlength: "O endereço informado é muito curto. Por favor, informe seu endereço completo"
            },
            telefone: {
                required: "Informe seu telefone",
                minlength: "O número de telefone está incompleto"
            },
            profissao: {
                required: "Para que os clientes queiram seus serviços, eles precisam saber o que você faz!"
            }
        }
    });
});
  </script>
  <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
</body>