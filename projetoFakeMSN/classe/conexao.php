<?php

$host   = "localhost";
$usr    = "root";
$senha  = "";
$bd     = "bd_fakemsn";

$mysqli = new mysqli($host, $usr, $senha, $bd);

if($mysqli->connect_errno)
{
    echo "Falha na conexão: (" . $mysqli->connect_errno.")" . $mysql->connect_error;
}

?> 