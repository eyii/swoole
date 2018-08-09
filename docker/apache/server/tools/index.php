<?php
$server = new swoole_server("0.0.0.0", 91);
$server->on('connect', function ($serv, $fd) {echo "Client: Connect.\n";});
$server->on('receive', function ($serv, $fd, $from_id, $data) {$serv->send($fd, "Server: ".$data);});
$server->on('close', function ($serv, $fd) {echo "Client: Close.\n";});
$server->start();