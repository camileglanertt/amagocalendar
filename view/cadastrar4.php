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
                       <form action="cadastrar5.php" method="post" id="formulario" name="formulario">
                           <div class="row justify-content-md-center">
                               <div class="col"></div>
                               <div class="col-md-auto"><h4>Sua rotina profissional</h4></div>
                               <div class="col"></div>
                           </div>
                               <?php
                               $custo = '08';
                               $salt = 'Cf1f11ePArKlBJomM0F6aJ';
                               $hash = crypt($_POST['senha'], '$2a$' . $custo . '$' . $salt . '$');
                              
                               echo "<input type='hidden' name='usuario' value='".$_POST['usuario']."'>";
                               echo "<input type='hidden' name='senha' value='".$hash."'>";
                               echo "<input type='hidden' name='cep' value='".$_POST['cep']."'>";
                               echo "<input type='hidden' name='estado' value='".$_POST['estado']."'>";
                               echo "<input type='hidden' name='cidade' value='".$_POST['cidade']."'>";
                               echo "<input type='hidden' name='endereco' value='".$_POST['endereco']."'>";
                               echo "<input type='hidden' name='telefone' value='".$_POST['telefone']."'>";
                               echo "<input type='hidden' name='razaoSocial' value='".$_POST['razaoSocial']."'>";
                               echo "<input type='hidden' name='cnpj' value='".$_POST['cnpj']."'>";
                               echo "<input type='hidden' name='nome' value='".$_POST['nome']."'>";
                               echo "<input type='hidden' name='cpf' value='".$_POST['cpf']."'>";
                               ?>
 
                               <!-- seu atendimento -->
                               <div class="form-group">
                                   <select class="form-control a" id="profissao" name="profissao"></select>
                               </div>
                               <div class="form-group">
                                   <div id="outraProfissao" class="form-group" name="profissao"></div>
                               </div>
                               <div class="form-group">
                               <label for="expediente">Dias trabalhados</label>&nbsp&nbsp&nbsp
                                  <select class="form-control expediente" style="width:550px" name="expediente[]" multiple="multiple" required>
                                      <option value="1">Domingo</option>
                                      <option value="2">Segunda-feira</option>
                                      <option value="3">Terça-feira</option>
                                      <option value="4">Quarta-feira</option>
                                      <option value="5">Quinta-feira</option>
                                      <option value="6">Sexta-feira</option>
                                      <option value="7">Sábado</option>
                                  </select>

                               </div>
                               <div class="form-group">
                                   <input type="text" class="tempo form-control" placeholder="Duração média de cada atendimento" id="duracao_atendimento" name="duracao_atendimento" required>
                               </div>
                               <div class="form-group">
                                   <input type="text" class="dinheiro form-control" placeholder="Preço de cada atendimento" id="preco" name="preco">
                               </div>
                               <div class="form-group">
                                   <div class="row">
                                       <div class="col-md-5">
                                           <label for="inicio">Tempo de Expediente</label>
                                       </div>
                                       <div class="col-md-3">
                                           <input class="form-control" type="time" name="inicio" id="inicio" required pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]">
                                       </div> às
                                       <div class="col-md-3">
                                           <input class="form-control" type="time" name="fim" id="fim" required pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" >
                                       </div>
                                   </div>
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
   <script>
   $('.dinheiro').mask("#.##0,00", {reverse: true});
   $('.tempo').mask('0h 00min');
   </script>
   <script type="text/javascript">
 
$("#formulario").validate({
   rules: {
       profissao: {
           required: true
       },
       duracao_atendimento: {
           required: true
       },
       preco: {
           required: true
       },
       inicio: {
           required: true
       },
       fim: {
           required: true
       }
   },
   messages: {
       profissao: {
           required: "Para que os clientes queiram seus serviços, eles precisam saber o que você faz!"
       },
       duracao_atendimento: {
           required: "Informe uma média de duração dos seus atendimentos"
       },
       preco: {
           required: "Por favor, informe o preço médio de seus serviços"
       },
       inicio: {
           required: "Por favor, informe o seu horário inicial de atendimento"
       },
       fim: {
           required: "Por favor, informe o seu horário final de atendimento"
       }
   }
});
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
   <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
</body>
