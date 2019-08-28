<?php
   include_once "../autoload.php";
   // session_start inicia a sessão
session_start();

//pega as variáveis do formulário do login
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';


if(isset($_POST['telefone'])){
    $controleUsuario = new ControleUsuarios();
    //Passa o POST desta View para o Controle
    $controleUsuario->setVisao($_POST);
    //insere novo atendimento
    $resultado =  $controleUsuario->controleAcao("inserir");
}else{
    $custo = '08';
    $salt = 'Cf1f11ePArKlBJomM0F6aJ'; 
    $_POST['senha'] = crypt($senha, '$2a$' . $custo . '$' . $salt . '$'); 
}


//Cria o Controle desta View (página)
$controleUsuarios = new ControleUsuarios();
//Passa o POST desta View para o Controle
$controleUsuarios->setVisao($_POST);
//chama o funcao
$usuario =  $controleUsuarios->controleAcao("listarUnico");

//se nao tem o usuario
if (empty($usuario[0]->email)) {
    //apaga o registro da sessao
    unset($_SESSION['usuario']);
    //cria o cookie logado
    setcookie("logado");
    //cria o cookie usuario
    setcookie("usuario");
    //redireciona para o login com a operacao `o` igual a erro `e` para mostrar mensagem de erro
    echo"<script language='javascript' type='text/javascript'>window.location.href='../view/login.php?o=e';</script>";;;;
} else {
    //se tem usuario
    //inicia a sessao com o nome do usuario e senha

    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    //se o usuario clicar em lembrar
    if ($_POST['lembrar'] == "on") {
        //cria um cookie logado com o valor `on`
        setcookie("logado", "on");
        //cria um cookie com o valor nome do usuario
        setcookie("usuario", $usuario);
    }
    //redireciona para a home
     header("Location: ../view/calendario.php");
}