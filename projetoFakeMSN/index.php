<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- style do bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- style do projeto -->
        <link rel="stylesheet" href="main.css">
        <title>FakeWindows Live</title>
    </head>
    <body>
    <div class="col-sm-4 col-md-3 col-lg-3" id="containerPrincipal">
        <!-- ajuda -->
        <div id="ajuda" class="">
            <p for="ajudaIcon" class="">Ajuda
            <span class="glyphicon glyphicon-triangle-bottom" id="ajudaOpcao"></span>
            </p>
        </div>
        
        <!-- perfil -->
        <div id="perfil">
            <img id="framePerfil" src="img/frameOnline.png"/>
        </div>

        <!-- formulario e configs do no credenciamento -->
        <form id="formulario" name="formulario" method="post" action="class/controllerIndex.php">
            <p>Endereço de email:</p>
            <input id="email" name="email" type="email"/>
            <p>Senha:</p>
            <input id="senha" name="senha" type="password"/>
            
            <div id="entrarComo">
                <p id="">Entrar como <span>Online</span><span id="dropSimbolo" class="glyphicon glyphicon-triangle-bottom" id="ajudaOpcao"></span></p>
                <!-- Status static mas tem que alterar para dinamico -->
                <input type="hidden" id="status" name="status" value="Online" />
            </div>
                
            <div class="lembretes">
                <input id="lembra" class="" type="checkbox" name="lembra"/>
                <p class="">Lembrar-me:</p>
            </div>
            
            <div class="lembretes">
                <input id="lembraSenha" class="" type="checkbox" name="lembraSenha"/>
                <p>Lembrar minha senha:</p>
            </div>

            <button id="" onclick="validaDados()" name="">Entrar</button>

        </form>
        
        <!-- rodape -->
        <div id="rodape">
            <img class="logoMSN" src="img/logoMSN.png"/>
            <p>FakeWindows Live</p>
        </div>
    </div>

    <!-- JavaScript do projeto -->
    <script src="main.js"></script>
    <!-- jQuery primeiro e Bootstrap JS -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>