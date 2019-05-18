<?php
    include("../classe/conexao.php");
    $idUser = $_GET['idUser'];
?>
<script>
    idUser = '<?php echo $idUser ?>'
    jQuery(function($){
        controleMsg = true
      // Websocket
        var websocket_server = new WebSocket("ws://localhost:8080/");
        websocket_server.onopen = function(e) {
            websocket_server.send(
                JSON.stringify({
                    'type':'socket',
                    'user_id':idUser
                })
            );
        };
        websocket_server.onerror = function(e) {
            // Errorhandling
        }
        websocket_server.onmessage = function(e){
            var json = JSON.parse(e.data);
            switch(json.type) {
                case 'chat':
                    if(json.id == <?php echo $idUser ?> ){
                        $('#chat_output').append("<p id='msgEu'>"+json.msg+"</p><br/>");
                  
                    }else{
                        $('#chat_output').append("<p id='msgTu'>"+json.msg+"</p><br/>");
                    }
                    break;
            }
        }
       // Events
        $('#chat_input').on('keyup',function(e){
            if(e.keyCode==13 && !e.shiftKey){
                controleMsg = false
                var chat_msg = $(this).val();
                websocket_server.send(
                    JSON.stringify({
                        'type':'chat',
                        'user_id':idUser,
                        'chat_msg':chat_msg
                    })
                );
                $(this).val('');
            }
         });
    })
</script>