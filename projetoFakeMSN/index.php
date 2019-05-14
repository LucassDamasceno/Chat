<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logoMSN.png" />
        <!-- style do bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- style do projeto -->
        <link rel="stylesheet" href="main.css">
        <title>FakeWindows Live</title>
        <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
    </head>
    <body>
    <div class="col-sm-1 col-md-4 col-lg-4"></div>    
    <div class="col-sm-10 col-md-4 col-lg-4" id="containerPrincipal">
        <!-- perfil -->
        <div id="perfil">
            <img id="framePerfil" src="img/frameOnline.png"/>
        </div>

        <!-- formulario e configs do no credenciamento -->
        <form id="formulario" name="formulario" method="post" action="pages/listaContato.php">
            <p for="nickname">Nickname:</p>
            <input id="nickname" required name="nickname" type="text"/>
                        
            <div id="entrarComo">
                <p id="">Entrar como</p>
                <select id="statusOptions" name="status">
                    <option value="1" >Online</option>
                    <option value="0">Offline</option>
                </select>

                <button id="" onclick="validaDados()" name="">Entrar</button>
            </div>
        </form>
        
        <!-- rodape -->
        <div id="rodape">
            <img class="logoMSN" src="img/logoMSN.png"/>
            <p>FakeWindows Live</p>
        </div>
    </div>
    <div class="col-sm-1 col-md-4 col-lg-4"></div>    

    <!-- JavaScript do projeto -->
    <script src="main.js"></script>
    <!-- jQuery primeiro e Bootstrap JS -->
    <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>