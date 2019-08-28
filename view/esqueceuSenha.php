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
             <h1>Recupere sua senha</h1>
           </div>
           <div class="col"></div>
         </div>
         <div class="col"></div>
         <div class="col-md-auto">
           <form action="inc/sendmail2.inc.php" method="GET">
             <div class="form-check">
             <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                 <div class="form-group">
                 <input type="text" class="form-control a" id="nome" placeholder="Nome completo" name="nome">
                   </div>
                 </div>
                 <div class="col"></div>
               </div>
               <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                 <div class="form-group" >
                 <input type="text" class="form-control a" id="cpf_cnpj" placeholder="CPF/CNPJ" name="cpf/cnpj">
                   </div>
                 </div>
                 <div class="col"></div>
               </div>
               <div class="row justify-content-md-center">
                 <div class="col"></div>
                 <div class="col-md-auto">
                 <div class="form-group" >
                 <input type="text" class="form-control a" id="email" placeholder="Email" name="email">
                   </div>
                 </div>
                 <div class="col"></div>
               </div>
             <div class="row justify-content-md-center">
               <div class="col"></div>
               <div class="col-md-auto">
                 <a href='login.php' class="btn btn-primary botao2">
                   <ion-icon ios="md-arrow-back" md="md-arrow-back" id='icon'></ion-icon>
                 </a>
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
