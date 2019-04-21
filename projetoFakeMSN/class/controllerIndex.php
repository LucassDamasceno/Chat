<?php 

//Dados do formulário
$email  = $_REQUEST['email'];
$senha  = $_REQUEST['senha'];
$status  = $_REQUEST['status'];
$lembra  = isset($_REQUEST['lembra']);
$lembraSenha  = isset($_REQUEST['lembraSenha']);


//credenciando [provisorio]
if($email == "teste@tst.com" && $senha === "123456")
{
    echo "Com permissão!";
    header('Location: client/telaChat.html'); 
}
else
{
    echo "Não tem permissão!";
}
?>