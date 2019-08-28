$(document).ready(function () {
    $("#formulario").validate({
        rules: {
            usuario: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            usuario: {
                email: "Informe um email válido",
                required: "É necessário informar o email"
            },
            senha: {
                required: "Por favor, informe a senha",
                minlength: "Sua senha tem no minímo 8 caracteres"
            }
        }
    });
});