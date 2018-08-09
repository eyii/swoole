<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);
!$client->connect("server", 91, 0.5) and  die("connect failed.");
if (!$client->send("hello world")) die("send failed.");
$data = $client->recv();
if (!$data) die("recv failed.");
echo $data;
//关闭连接
$client->close();