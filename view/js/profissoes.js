$(document).ready(function () {
    $.getJSON('json/profissoes.json', function (data) {		
        var option = '<option disabled selected value="">Profissão</option>';			
            $.each(data.profissoes, function (key, val) {
                option += '<option value="' + val + '">' + val + '</option>';
            });
            $("#profissao").html(option);		
    });

    $("#profissao").change(function(){
        
        if(this.value=="Outro"){
            $("#outraProfissao").html("<input type='text' class='form-control a' id='outra_profissao' name='outra_profissao' placeholder='Outra profissão'>");
        }
    });
});