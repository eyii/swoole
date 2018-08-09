<?php
class Server
{
    private $serv;
    function __construct() {
        $this->serv = new swoole_server("0.0.0.0", 9501);
        $this->serv->set(['worker_num' => 8,  'daemonize' => false, ]);

        $this->serv->on('Start', [$this, 'onStart']);
        $this->serv->on('Connect', [$this, 'onConnect']);
        $this->serv->on('Receive', [$this, 'onReceive']);
        $this->serv->on('Close', [$this, 'onClose']);
        $this->serv->start();
    }

    function onStart( $serv ) {
        echo "Start\n";
    }

    function onConnect( $serv, $fd, $from_id ) {
        $serv->send( $fd, "Hello {$fd}!" );
    }

    function onReceive(swoole_server $serv, $fd, $from_id, $data ) {
        echo " Client {$fd}:{$data}\n";
        $serv->send($fd, $data);
    }

    function onClose( $serv, $fd, $from_id ) {
        echo "Client {$fd} close connection\n";
    }
}
$server = new Server();