 <?php
    include("../classe/conexao.php");
    $idUser = $_GET['idUser'];
    $myId = $_GET['myId'];
    
    $queryConsulta  = 'SELECT id ,nickname FROM usuarios';
    $consulta = $mysqli->query($queryConsulta) or die ($mysqli->error);

    foreach($consulta as $usr)
    {
       if($usr['id'] == $idUser){
         $nick = $usr['nickname'];
       }
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
    <link rel="stylesheet" href="telaChat.css">
    <title>FakeWindows Live</title>
    <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>

</head>
<body>
    <section>
        <div id="containerGeral">
            <div id="containerEsquedo">
                <div class="perfil" id="ego">
                    <img src="../img/frameUserUm.png"/>
                </div>
                <div class="perfil" id="eros">
                    <img src="../img/frameUserDois.png"/>
                </div>
            </div>
            <div id="containerDireito">
                <div class="contInternoDireito" id="header">
                    <p>
                    <span class="nickStatus" id="nick"><?php echo $nick ?></span>
                    <span class="nickStatus" id="status">(status)</span>
                        <!--<?php echo $status ?>-->
                    </p>
                    <p id="bio">
                        Mensagem fresca de indiretas aviadadas 
                    </p>
                </div>
                <div class="contInternoDireito" id="chat_output"></div>
                <div class="contInternoDireito" id="footer">
                    <input type="textarea" col="5" id="chat_input"/>
                    <button type="submit"><span class="glyphicon glyphicon-send"><span></button>
                </div>
            </div>
        </div>
    </section>
    <?php include("telaChatController.php")?>
    <!-- JavaScript do projeto -->
    <script src="telaChat.js" type="text/javascript"></script>
    <!-- jQuery primeiro e Bootstrap JS -->
    <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>


 