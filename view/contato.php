<!DOCTYPE html>
<html>
<head>
    <title>Contato</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/contato.css">
    <link href="css/home.css" type="text/css" rel="stylesheet" />
    <link href="css/estilo.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div style="background: linear-gradient(to right, rgba(255, 255, 255, 0.7686274509803922), rgba(255, 255, 255, 0.7686274509803922)), url(img/logo.jpg) no-repeat center center fixed;">
    <div class="container-contact100">
        <div class="wrap-contact100">
            <div class="contact100-form-title" style="background-image: url(img/contato.jpg);">
                <label class="contact100-form-title-1">
                    Fale conosco
                </label>

                <label class="contact100-form-title-2">
                    Estamos aqui para te ajudar!
                </label>
            </div>

            <form class="contact100-form validate-form">
                <div class="wrap-input100 validate-input" data-validate="Precisamos saber seu nome para contatá-lo">
                    <label class="label-input100">Nome:</label>
                    <input class="input100" type="text" name="name">
                    <label class="focus-input100"></label>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Informe um email válido para podermos auxilia-lo">
                    <label class="label-input100">Email:</label>
                    <input class="input100" type="email" name="email">
                    <label class="focus-input100"></label>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Por favor informe o número do seu telefone">
                    <label class="label-input100">Telefone:</label>
                    <input type="tel" class="input100" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
                    <label class="focus-input100"></label>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Insira a sua mensagem com o motivo de contato">
                    <label class="label-input100">Mensagem:</label>
                    <textarea class="input100" name="message"></textarea>
                    <label class="focus-input100"></label>
                </div>

                <div class="container-contact100-form-btn">     
                    <button class="contact100-form-btn">
                    <a href='calendario.php' style="color: white; text-decoration: none">
                        <label>
                        <i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
                            &nbsp; Cancelar
                        </label>
                    </a>
                </button>&nbsp;&nbsp;&nbsp;
                <button class="contact100-form-btn">
                        <label>
                            Enviar
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </label>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="js/map-custom.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src='../js/editarPerfil.js' type="text/javascript"></script>
    <script src="js/contato.js" type="text/javascript"> </script>
</body>
</html>



