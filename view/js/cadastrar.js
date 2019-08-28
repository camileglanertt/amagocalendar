function mostraEmpresario(){
    $('.empresas').show();
    $('.ambos').show();
    $('.autonomos').hide();
    $('#muda').addClass('margin-top');
}

function mostraAutonomos(){
    $('.empresas').hide();
    $('.ambos').show();
    $('.autonomos').show();
    $('#muda').addClass('margin-top');
}

var password = document.getElementById("senha");
var confirm_password = document.getElementById("confirmaSenha");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity('senha');
        document.getElementById("erro").innerHTML ='Senhas não correspondem';
    } else {
        confirm_password.setCustomValidity('');
        document.getElementById("erro").innerHTML ='';
    }
}

$(document).ready(function () {
    $('.expediente').select2();
    $("#formulario").validate({
        rules: {
            cpf: {
                required: true,
                minlength: 11,
                maxlength: 18
            },
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
            cpf: {
                required: "Por favor, informe seu CPF",
                minlength: "O CPF informado está incompleto",
                maxlength: "O CPF informado não é válido"
            },
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