function filtro(value){
    if(value == "nome" || value == "razaosocial"){
        $('#inner').css("display", "block");
        $('#inner').html('<input class="form-control" type="text"  name="itemPesquisa" id="itemPesquisa">');
        $('#select').css("display", "none");
    }else if(value == "profissao"){
        $('#select').css("display", "block");
        $('#inner').css("display", "none");
    }
}