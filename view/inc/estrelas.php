

<form method="POST" action="#" enctype="multipart/form-data">
    <div class="estrelas">
        <input type="radio" id="vazio" name="estrela" value="" checked>
        
        <label for="estrela_um"><i class="fa"></i></label>
        <input type="radio" id="estrela_um" name="estrela" value="1">
        
        <label for="estrela_dois"><i class="fa"></i></label>
        <input type="radio" id="estrela_dois" name="estrela" value="2">
        
        <label for="estrela_tres"><i class="fa"></i></label>
        <input type="radio" id="estrela_tres" name="estrela" value="3">
        
        <label for="estrela_quatro"><i class="fa"></i></label>
        <input type="radio" id="estrela_quatro" name="estrela" value="4">
        
        <label for="estrela_cinco"><i class="fa"></i></label>
        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
        
        <input type="submit" value="Cadastrar">
        
    </div>
</form>
<!-- inc, css
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	
	//Salvar no banco de dados
	$result_avaliacos = "INSERT INTO avaliacao (avaliacao) VALUES ('$estrela')";
	$resultado_avaliacos = mysqli_query($conn, $result_avaliacos);
	
	
}else{
	 "Necessário selecionar pelo menos 1 estrela";
	
}
-->