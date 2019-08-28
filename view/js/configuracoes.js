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

$('.expediente').select2();