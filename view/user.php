<?php 
  //Verifica se usuario esta logado
  include_once 'inc/cookie.inc.php';

  // Cabecalho
  $cabecalho_title = "Meu Perfil";
  include_once "inc/cabecalho.php";

  include_once "../autoload.php";

  $_POST['usuario'] = $_SESSION['usuario'][0]->email;
  $_POST['senha'] = $_SESSION['usuario'][0]->senha;
  $controleUsuario = new ControleUsuarios();
  $controleUsuario->setVisao($_POST);
  $pessoa =  $controleUsuario->controleAcao("listarUnico");
?> 
</head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estrelas.css">
<link rel="stylesheet" href="css/user.css">
<body >
  <div class="wrapper ">
    <div class="sidebar" data-background-color="black" >
      <?php 
        include_once "inc/side-bar.php"
      ?>
      <div class="main-panel">
        <?php
          include_once 'inc/navbar.php';
          $arquivo = basename( __FILE__ );
          include_once "inc/profile.inc.php";
          
        ?>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src='../assets/js/jquery-1.10.2.js' type="text/javascript"></script>
  <script src='../assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
<?php
include_once "inc/rodape.php";
?>