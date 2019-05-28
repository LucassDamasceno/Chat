<?php
set_time_limit(0);
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
require_once '../lib/vendor/autoload.php';
class Chat implements MessageComponentInterface {
	protected $clients;
	protected $users;
	public function __construct() {
		$this->clients = new \SplObjectStorage;
	}
	public function onOpen(ConnectionInterface $conn) {
		$this->clients->attach($conn);
		//$this->users[$conn->resourceId] = $conn;
		echo "New connection! ({$conn->resourceId})\n";
	}
	public function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
	//	unset($this->users[$conn->resourceId]);
	}
	public function onMessage(ConnectionInterface $from,  $data) {
		$from_id = $from->resourceId;
		echo $from_id;
		$data = json_decode($data);
		$type = $data->type;
		switch ($type) {
			case 'chat':
				$user_id = $data->user_id;
				$chat_msg = $data->chat_msg;
				$response_from = $chat_msg;
				$response_to = "<b>".$user_id."</b>: ".$chat_msg."<br><br>";
				// Output
				//$from->send(json_encode(array("type"=>$type,"msg"=>$response_from,'id'=>$user_id)));

				foreach($this->clients as $client)
				{
					$client->send(json_encode(array("type"=>$type,"msg"=>$response_from,'id'=>$user_id)));
					// if($from!=$client)
					// {
					// 	$client->send(json_encode(array("type"=>$type,"msg"=>$response_to)));
					// //	$$client->send(json_encode(array("type"=>$type,"msg"=>$response_to,'id'=>$user_id)));

					// }
				}
				break;
		}
	}
	public function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
	}
}
$server = IoServer::factory(
	new HttpServer(new WsServer(new Chat())),
	8080
);
$server->run();
?>