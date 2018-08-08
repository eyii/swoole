<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);
!$client->connect("server", 90, 0.5) and  die("connect failed.");
!$client->send("hello world") and die("send failed.");
$data = $client->recv();
!$data and  die("recv failed.");
echo $data;
$client->close();