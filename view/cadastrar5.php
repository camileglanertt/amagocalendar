<?php
 include_once 'inc/headerCad.php';
 ?>
<!-- css da pagina -->
<link href="css/cadastrar2.css" type="text/css" rel="stylesheet" />
</head>
<body>
 <div class="container-fluid">
 <div class="row">
   <div class="col" style="background-image: url('img/folha.jpg'); height:1000px; background-repeat: no-repeat; background-size: cover;"></div>
   <div class="col">
     <div class="row justify-content-md-center">
       <div class="container">
         <div class="row justify-content-md-center">
           <div class="col"></div>
           <div class="col-md-auto">
             <h1>Recursos no seu perfil</h1>
           </div>
           <div class="col"></div>
         </div>
         <div class="col"></div>
         <div class="col-md-auto">
           <form action="../controller/seguranca.php" method="post">
             <div class="form-check">
               <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                   <?php
                     $duracao_expediente= gmdate('H:i', strtotime( $_POST['fim'] ) - strtotime( $_POST['inicio']));
                     $preco = $_POST['preco'];
                         if (!isset($preco)){
                           $preco = "Não informado";
                         }
                         
                     $expediente = '';
                     foreach($_POST['expediente'] as $key=>$value){
                         $expediente .= $_POST['expediente'][$key];
                     }
                         echo "<input type='hidden' name='usuario' value='".$_POST['usuario']."'>";
                         echo "<input type='hidden' name='senha' value='".$_POST['senha']."'>";
                         echo "<input type='hidden' name='cep' value='".$_POST['cep']."'>";
                         echo "<input type='hidden' name='estado' value='".$_POST['estado']."'>";
                         echo "<input type='hidden' name='cidade' value='".$_POST['cidade']."'>";
                         echo "<input type='hidden' name='endereco' value='".$_POST['endereco']."'>";
                         echo "<input type='hidden' name='telefone' value='".$_POST['telefone']."'>";
                         if($_POST['profissao'] == "Outro"){
                          echo "<input type='hidden' name='profissao' value='".$_POST['outra_profissao']."'>";
                         } else {
                          echo "<input type='hidden' name='profissao' value='".$_POST['profissao']."'>";
                         }
                         echo "<input type='hidden' name='razaoSocial' value='".$_POST['razaoSocial']."'>";
                         echo "<input type='hidden' name='cnpj' value='".$_POST['cnpj']."'>";
                         echo "<input type='hidden' name='nome' value='".$_POST['nome']."'>";
                         echo "<input type='hidden' name='cpf' value='".$_POST['cpf']."'>";
                         echo "<input type='hidden' name='duracao_atendimento' value='".$_POST['duracao_atendimento']."'>";
                         echo "<input type='hidden' name='preco' value='".$preco."'>";
                         echo "<input type='hidden' name='duracao_expediente' value='".$duracao_expediente."'>";
                         echo "<input type='hidden' name='expediente' value='".$expediente."'>";
                         echo "<input type='hidden' name='inicio' value='".$_POST['inicio']."'>";
                         echo "<input type='hidden' name='fim' value='".$_POST['fim']."'>";
                     ?>
                   <input class="form-check-input" type="checkbox" value="1" id="calendario"  name="quer_calendario">
                   <label class="form-check-label" for="calendario">Calendário</label>
                 </div>
                 <div class="col"></div>
               </div>
               <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                   <input class="form-check-input" type="checkbox" value="1" id="avaliacao" name="quer_avaliacao">
                   <label class="form-check-label" for="avaliacao">Avaliações</label>
                 </div>
                 <div class="col"></div>
               </div>
               <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                   <input class="form-check-input" type="checkbox" value="1" id="comentarios" name="quer_comentario">
                   <label class="form-check-label" for="comentarios">Comentários</label>
                 </div>
                 <div class="col"></div>
               </div>
               <br clear='all'/>
              
             </div>
             <div class="form-group">
               <div class="alert alert-danger text-center" role="alert">
                     A equipe Âmago não se responsabiliza por comentários de má índole e/ou má reputação de avaliações. <br>
                     Lembre-se que críticas construtivas devem ser consideradas para melhor atender seu próximo cliente.
               </div>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" placeholder="Site" name="site">
             </div>
             <div class="form-group">
               <textarea name= "biografia"class="form-control" rows="5" Placeholder="Biografia"></textarea>
             </div>
             <div class="row justify-content-md-center">
               <div class="col"></div>
               <div class="col-md-auto">
                 
                 <button type="submit" class="btn btn-primary botao">
                   <ion-icon ios="ios-arrow-forward" md="md-arrow-forward" id='icon'></ion-icon>
                 </button>
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
</body>
<script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>
