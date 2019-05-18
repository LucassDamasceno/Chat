<?php
    $idUser = $_GET['idUser'];
?>

<script>
    idUser = '<?php echo $idUser ?>'
    jQuery(function($){
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
                case 'chatt':
                    $('#chat_output').append("<p id='msgEu'>"+json.msg+"</p><br/>");
                    break;
                case 'tu':
                    console.log("mesangem de tu")
                    break
            }
        }
       // Events
        $('#chat_input').on('keyup',function(e){
            if(e.keyCode==13 && !e.shiftKey){
                var chat_msg = $(this).val();
                websocket_server.send(
                    JSON.stringify({
                        'type':'chatt',
                        'user_id':idUser,
                        'chat_msg':chat_msg
                    })
                );
                $(this).val('');
            }
         });
    })
</script>
