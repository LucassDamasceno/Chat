<?php
include("../classe/conexao.php");
include("../classe/Socketon.php");
//recebe nickname e status do INDEX
$nick = $_REQUEST["nickname"];
$status = $_REQUEST["status"];

//busca os usrs para mostrar na lista de contatos
$queryConsulta  = 'SELECT nickname FROM usuarios';
$buscaNoBD = $mysqli->query($queryConsulta) or die ($mysqli->error);

//verifica se dar ou nao permissao para criar um novo NICKNAME
$permissao = true;
foreach($buscaNoBD as $item)
{
    if($item["nickname"] == $nick)
    {
        $permissao = false;
        break;
    }
}
//cria o novo NICKNAME se houver permissao
if($permissao == true)
{
    $insereNick = "INSERT  INTO  usuarios  (nickname)  VALUES  ( '$nick');";
    $mysqli->query($insereNick) or die ($mysqli->error);
}
else
{
    echo "Nickname já está em uso. Volte e escolha outro Nickname.";
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../img/logoMSN.png" />
        <!-- style do bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- style do projeto -->
        <link rel="stylesheet" href="listaContato.css">
        <title>FakeWindows Live</title>
        <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
    </head>
<body>
<?php 
?>
<section id="top">
    <div id="containerTop">
        <div id="nomePrograma" class="col-lg-12">
            <img src="../img/logoMSN.png" width="20"/>
            FakeWindows Live
        </div>
        <div id="logomarca">
            <img src="../img/frameOnline.png"/>
        </div>
        <div id="containerInfos">
            <p class="infoHeader"><?php $nickname ?></p>
            <span class="infoHeader"><?php $status ?></span>
            <span id="mudaStatusNaHeaderContatoScreen" class="glyphicon glyphicon-triangle-bottom"></span>
            <br />
            <p id="msgStatusheader">O que não nos mata, só nos deixa mais loucos!</p>
        </div>
        <div id="statusOptionsHeader">
            <div class="statusOptionsItens"onclick="escolheStatus('Online')"><p>Online</p></div>
            <div class="statusOptionsItens"onclick="escolheStatus('Offline')"><p>Offline</p></div>
            <div class="statusOptionsItens"onclick="escolheStatus('Invisível')"><p>Invisível</p></div>
        </div>
    </div>
</section>

<section id="corpo">
    <div id="containerCorpo">
        <h5>Contatos<span>(23)</span></h5>
        <ul>
            <?php chamaUsuarios() ?>
        </ul>
    </div>
</section>

<!--<footer id="rodape"></footer>-->

<!-- JavaScript do projeto -->
<script src="listaContato.js" type="text/javascript"></script>
<!-- 
    <script src="../main.js"></script>
-->
<!-- jQuery primeiro e Bootstrap JS -->
<script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js" ></script>
</body>
</html>