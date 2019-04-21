<?php

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

// Incluindo bibliotecas e classe do chat
require '../../lib/vendor/autoload.php';
require 'manageConnection.php';

// Iniciando conexão
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ManageConnection()
        )
    ),
    8080
);

$server->run();