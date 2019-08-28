<?php
 //Verifica se usuario esta logado
 include_once 'inc/cookie.inc.php';
 // Cabecalho
 $cabecalho_title = "Editar Meu Perfil";
 include_once "inc/cabecalho.php";
  include_once "../autoload.php";
  $_GET['usuario'] = $_SESSION['usuario'][0]->email;
 $_GET['senha'] = $_SESSION['usuario'][0]->senha;
 $controleUsuario = new ControleUsuarios();
 $controleUsuario->setVisao($_GET);
 $pessoa =  $controleUsuario->controleAcao("listarUnico");
  if($_POST){
   $controleUsuario = new ControleUsuarios();
   //Passa o POST desta View para o Controle
   $controleUsuario->setVisao($_POST);
   //insere novo atendimento
   $resultado =  $controleUsuario->controleAcao("alterar");
 }
 ?>
<link rel="stylesheet" href="css/editarPerfil.css">
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"></script>
</head>
<body>
 <div class="wrapper">
   <div class="sidebar" data-background-color="black" >
     <?php
       include_once "inc/side-bar.php"
       ?>
     <div class="main-panel">
       <?php
         include_once 'inc/navbar.php';
         if($_POST){
           if ($resultado) {
             echo "<div style='margin:8% 5%;' class='alert alert-success' role='alert'> Perfil alterado com sucesso!</div>";
           } else {
             echo "<div style='margin:8% 5%;' class='alert alert-danger' role='alert'> Houve um erro na alteração. </div>";
           }
         }
         ?>
       <div class="content">
         <div class="container-fluid">
           <div class="row">
             <div class="col-md-8">
               <div class="card">
                 <div class="card-body">
                   <form action='editarPerfil.php' method="POST" id="formulario" name="formulario">
                     <div class="row">
                       <?php
                         if(isset($pessoa[0]->razaosocial) && $pessoa[0]->razaosocial != "" ){
                           echo "
                         <div class='col-md-6'>
                           <div class='form-group'>
                             <label class='bmd-label-floating'>Razão Social</label>
                             <input type='text' class='form-control' name='razao' value=".  $pessoa[0]->razaosocial .">
                           </div>
                         </div>
                         <div class='col-md-6'>
                           <div class='form-group'>
                             <label class='bmd-label-floating'>Fantasia</label>
                             <input type='text' class='form-control' name='nome' value=". $pessoa[0]->nome.">
                           </div>
                         </div>
                           ";
                         }else{
                           echo "<div class='col-md-12'>
                           <div class='form-group'>
                             <label class='bmd-label-floating'>Nome</label>
                             <input type='text' class='form-control' name='nome' value=". $pessoa[0]->nome.">
                           </div>
                         </div>";
                         }
                         ?>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label class="bmd-label-floating">Endereço</label>
                           <input type="text" class="form-control" name='endereco'value="<?= isset($pessoa[0]->endereco) ? $pessoa[0]->endereco : "" ?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Cidade</label>
                           <input type="text" class="form-control" name='cidade' value="<?= isset($pessoa[0]->cidade) ? $pessoa[0]->cidade : "" ?>">
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">CEP</label>
                           <input type="text" class="form-control" id="cep" name="cep"  value="<?= isset($pessoa[0]->cep) ? $pessoa[0]->cep : "" ?>">
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <?php
                             if (isset($pessoa[0]->cpf)){
                               echo "<label class='bmd-label-floating'>CPF</label><input type='text' class='form-control' name='cpf' id='cpf'  value='". $pessoa[0]->cpf ." '>";
                             } else if (isset($pessoa[0]->cnpj)){
                               echo "<label class='bmd-label-floating'>CNPJ</label><input type='text' class='form-control' name='cnpj' id='cnpj'  value='".$pessoa[0]->cnpj." '>";
                             }
                             ?>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Profissão</label>
                           <input type="text" class="form-control" name='profissao' value="<?= isset($pessoa[0]->profissao) ? $pessoa[0]->profissao : "" ?>">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Preço</label>
                           <input type="text" class="form-control" name='preco' value="<?= isset($pessoa[0]->preco) ? $pessoa[0]->preco : "" ?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Site</label>
                           <input type="text" class="form-control" name='site' value="<?= isset($pessoa[0]->site) ? $pessoa[0]->site : "" ?>">
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Telefone</label>
                           <input type="text" class="telefone form-control" name="telefone" id="telefone"  value="<?= isset($pessoa[0]->telefone) ? $pessoa[0]->telefone : "" ?>"/>
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Fotos</label>
                           <a href='' class='btn btn-dark' data-toggle='modal' data-target='#modalFotos'>Adicionar fotos</a>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label>Biografia</label>
                           <div class="form-group">
                             <textarea name= "biografia"class="form-control" rows="5"> <?= isset($pessoa[0]->biografia) ? $pessoa[0]->biografia : "" ?></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                     <button type="submit" class="btn btn-danger pull-right">Alterar</button>
                     <div class="clearfix"></div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-profile">
                 <div class="card-avatar">
                   <a>
                   <?php
                     $profissional = $pessoa[0]->id;
                     $pasta ="anexos/FotoProfissional{$profissional}" ;
                     //se a pasra existir
                     if (file_exists($pasta)) {
                       //glob é para
                       $images=glob("$pasta/{*.*}",GLOB_BRACE);
                       $i = 0;
                       foreach ($images as $filename) {
                         echo"<img src= ".$filename." width=1000>";
                       }
                     }else{
                     echo"<img src= 'img/logo_calendar.png'>";
                     }
                     ?>
                   </a>
                 </div>
                 <div class="card-body">
                   <a href='' class='btn btn-danger' data-toggle='modal' data-target='#modalAlterarFotoPerfil'>Alterar Foto de Perfil</a>
                   <h6 class="card-category"><?= isset($pessoa[0]->profissao) ? $pessoa[0]->profissao : "" ?></h6>
                   <h4 class="card-title"><?= isset($pessoa[0]->nome) ? $pessoa[0]->nome : "" ?></h4>
                   <p class="card-description">
                     <?= isset($pessoa[0]->biografia) ? $pessoa[0]->biografia : "" ?>
                   </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="modal fade" id="modalAlterarFotoPerfil" tabindex="-1" role="dialog" aria-labelledby="modalAlterarFotoPerfilLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h3 class="modal-title" id="modalAlterarFotoPerfilLabel">Alterar Foto de Perfil</h3>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="" enctype="multipart/form-data" id= "formFotoPerfil" method="post">
         <div class="modal-body">
           <?php
             $pessoaId = $pessoa[0]->id;
             echo ' <input type="file" id="Arquivo" name="Arquivo" accept="image/*"/>';
             ?>
         </div>
         <div class="modal-footer">
           <button  onclick= "alterarImagem('<?php echo $pessoaId?>') "class="btn btn-danger">Salvar</button>
         </div>
       </form>
     </div>
   </div>
 </div>
 <div class="modal fade" id="modalFotos" tabindex="-1" role="dialog" aria-labelledby="modalFotosLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h3 class="modal-title" id="modalFotosLabel">Adicionar fotos ao perfil</h3>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="" enctype="multipart/form-data" id= "formFotos" method="post">
         <div class="modal-body">
           <?php
             $pessoaId = $pessoa[0]->id;
             echo ' <input  type="file" id="Arquivo" name="Arquivo" />';
             ?>
         </div>
         <?php
           $pasta ="anexos/Profissional{$pessoaId}" ;
           //se a pasra existir
           if (file_exists($pasta)) {
             //glob é para
             $images=glob("$pasta/{*.*}",GLOB_BRACE);
             $i = 0;
            
             echo"<div id='lista-arquivos' class='col-md-4'>";
             echo"<table class='uk-table uk-table-hover uk-table-striped'>";
             foreach ($images as $filename) {
               $i++;
               echo"<tr>";
               echo"<td>";
               $file = explode("/",$filename);
               echo "<a onclick='mostraArquivo($i)' class='icone'>".$file[2]."</a><span style='cursor:pointer'onclick=\"excluiArquivo('".$filename."')\" > X </span>";
               echo"</td>";
               echo"<td>";
              
               echo "<input type='hidden' id='$i' name='nomeArquivo' value='$filename'>";
               echo"</td>";
               echo"</tr>";
             }
             echo"</table>";
             echo"</div>";
           }
           ?>
         <div id='arquivos'></div>
         <div class="modal-footer">
           <button  onclick= "adicionarFotos('<?php echo $pessoaId ?>') "class="btn btn-danger">Salvar</button>
         </div>
       </form>
     </div>
   </div>
 </div>
 <script type="text/javascript">
   $('.telefone').mask('(00) 0 0000-0000');
   $("#cpf").mask("000.000.000-00");
   $("#cnpj").mask("00.000.000/0000-00");
   </script>
 <?php
   include_once "inc/rodape.php";
   ?>
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
 <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
 <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
 <script src="js/editarPerfil.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
     $("#cep").mask("99.999-999");
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
