<?php
    include("../classe/conexao.php");
    $idUser = $_GET['idUser'];
    $myId   = $_GET['myId'];


    $queryConsulta  = 'SELECT id_remtente, id_destinat, msg FROM conversa';
    $consulta = $mysqli->query($queryConsulta) or die ($mysqli->error);



    //echo "<script> alert($myId) </script>";
?>
<script>
    idUser = '<?php echo $idUser ?>'
    enter = false;
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
        //  alert(<?php echo $myId ?>);
        websocket_server.onmessage = function(e){
            var json = JSON.parse(e.data);
           
            switch(json.type) {
                case 'chat':

                        if(json.id == <?php echo $idUser ?> && enter == true){
                            $('#chat_output').append("<p id='msgEu'>"+json.msg+"</p><br/>");
                        }else{
                            if(<?php echo $myId ?> == json.id ){
                                $('#chat_output').append("<p id='msgTu'>"+json.msg+"</p><br/>");
                               
                            }
                        }
                 
                    break;
            }
        }
       // Events
        $('#chat_input').on('keyup',function(e){
            if(e.keyCode==13 && !e.shiftKey){
                controleMsg = false
                var chat_msg = $(this).val();
                enter = true;

                websocket_server.send(
                    JSON.stringify({
                        'type':'chat',
                        'user_id':idUser,
                        'my_id':<?php echo $myId ?>,
                        'chat_msg':chat_msg
                    })
                );
                $(this).val('');
            }
         });

    })
</script>