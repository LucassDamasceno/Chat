<?php

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ManageConnection implements MessageComponentInterface
{
    protected $clients;
    
    //ManageConnection constructor.
    public function __construct()
    {
        // Iniciamos a coleção que irá armazenar os clientes conectados
        $this->clients = new \SplObjectStorage;
    }

    //Evento que será chamado quando um cliente se conectar ao websocket
    public function onOpen(ConnectionInterface $conn)
    {
        // Adicionando o cliente na coleção
        $this->clients->attach($conn);
        echo "Cliente conectado ({$conn->resourceId})" . PHP_EOL;
    }

    // Evento que será chamado quando um cliente enviar dados ao websocket
    public function onMessage(ConnectionInterface $from, $data)
    {
        // Convertendo os dados recebidos para vetor e adicionando a data
        $data = json_decode($data);
        $data->date = date('d/m/Y H:i:s');

        // Passando pelos clientes conectados e enviando a mensagem
        // para cada um deles
        foreach ($this->clients as $client) {
            $client->send(json_encode($data));
        }

        echo "Cliente {$from->resourceId} enviou uma mensagem" . PHP_EOL;
    }

    // Evento que será chamado quando o cliente desconectar do websocket
    public function onClose(ConnectionInterface $conn)
    {
        // Retirando o cliente da coleção
        $this->clients->detach($conn);
        echo "Cliente {$conn->resourceId} desconectou" . PHP_EOL;
    }


    //Evento que será chamado caso ocorra algum erro no websocket
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Fechando conexão do cliente
        $conn->close();
        echo "Ocorreu um erro: {$e->getMessage()}" . PHP_EOL;
    }
}