<?php
include("conexao.php");
//carregaUsuarios
function chamaUsuarios()
{
    global $mysqli;
    global $nick;

    $queryConsulta  = 'SELECT nickname FROM usuarios';
    $consulta = $mysqli->query($queryConsulta) or die ($mysqli->error);
    foreach($consulta as $usr)
    {
        
        echo "<li>
        <a href='telaChat.php' target='blank'><img src='../img/logoMSN.png' 
        width='20'/>
        <p>$usr[nickname]
            <span> - </span>
            <span class='msgStatusContato'>
            No dos outros é refresco</span>
        </p>
        </li></a>";
    }
}

?>