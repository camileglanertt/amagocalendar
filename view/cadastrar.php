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
                        <form action="cadastrar2.php" method="post" id="formulario" name="formulario">
                            <div class="row justify-content-md-center">
                                <div class="col"></div>
                                <div class="col-md-auto"><h4>Eu sou...</h4></div>
                                <div class="col"></div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col"></div>
                                <div class="col-md-auto">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" onclick="mostraAutonomos()"> pessoa física</label>
                                        <label><input type="radio" name="optradio" onclick="mostraEmpresario()"> pessoa jurídica</label>
                                    </div>
                                </div>
                                <div class="col"></div>
                                </div>
                                <!-- seus dados -->
                                <div class="empresas">
                                    <div class="form-group">
                                        <input type="text" class="form-control a" id="razaoSocial" placeholder="Razão Social" name="razaoSocial" minlenght="5">
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="text" class="form-control a"  placeholder="Nome Fantasia" name="nome"> -->
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control a" id="cnpj" placeholder="CNPJ" name="cnpj">
                                    </div>
                                </div>
                                <div class="autonomos">
                                    <div class="form-group">
                                        <input type="text" class="form-control a" placeholder="Nome" name="nome">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control a" id="cpf" placeholder="CPF" name="cpf" maxlength="14">
                                    </div>
                                </div>
                                
                                <div class="ambos">
                                    <div class="form-group">
                                        <input type="text" name="telefone" class="telefone form-control" placeholder="Telefone" />
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col"></div>
                                    <div class="col-md-auto">
                                        <a href='login.php' class="btn btn-primary botao2"><ion-icon ios="md-arrow-back" md="md-arrow-back" id='icon'></ion-icon></a>
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
    $('.telefone').mask('(00) 0 0000-0000');
    $("#cpf").mask("000.000.000-00");
    $("#cnpj").mask("00.000.000/0000-00");
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
    $('.telefone').mask('(00) 0 0000-0000');
    
    
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
                minlength: 11
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