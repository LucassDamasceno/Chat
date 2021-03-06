<?php
    include("../classe/conexao.php");
    //recebe nickname e status do INDEX
    $nick = $_REQUEST["nickname"];
    $status = $_REQUEST["status"];

    //busca os usrs para mostrar na lista de contatos
    $queryConsulta  = 'SELECT nickname FROM usuarios';  
    $buscaNoBD = $mysqli->query($queryConsulta) or die ($mysqli->error);
    $quantContatos= $buscaNoBD->num_rows;

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
        // echo "Nickname já está em uso. Volte e escolha outro Nickname.";
        // header("Location: ../index.php");
    }

    function listaUsuarios(){
        global $mysqli;
        global $nick;
        global $myId;

        $queryConsulta  = 'SELECT id ,nickname FROM usuarios';
        $consulta = $mysqli->query($queryConsulta) or die ($mysqli->error);


        foreach($consulta as $usr){
            if($nick == $usr["nickname"]){
                $myId = $usr["id"];
                break;
            }
        }

        foreach($consulta as $usr)
        {
            //para não mostrar meu contato na minha propria lista de contatos
 
            if($myId == $usr["id"]){
                continue;
            }
    
            echo "<li>
            <a href='telaChat.php?idUser=$usr[id]&myId=$myId' target='blank'><img src='../img/logoMSN.png' 
            width='20'/>
            <p>$usr[nickname]
                <span>  - </span>
                <span class='msgStatusContato'>
                mensagens</span>
            </p>
            </li></a>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../img/logoMSN.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="listaContato.css">
        <title>FakeWindows Live</title>


    </head>
    <body>
    <section id="top">
        <div id="containerTop">
            <div id="nomePrograma" class="col-lg-12">
                <img src="../img/logoMSN.png" width="20"/>
                FakeWindows Live
            </div>
            <div id="logomarca">
                <img src="../img/frameUserDois.png"/>
                <span><?php echo $nick ?></span>
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
             <h5>Contatos<span>( <?php echo $quantContatos - 1 ?>)</span></h5>
            <ul>
                 <?php listaUsuarios() ?>
            </ul>
        </div>
    </section>

    <script src="listaContato" type="text/javascript"></script>
    <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" ></script>
    </body>
</html>