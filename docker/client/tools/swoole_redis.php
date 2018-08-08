<?php
$redis = new Swoole\Redis;
$redis->connect("redis", 6379, function ($redis, $result) {
    $redis->set('test_key', 'value', function ($redis, $result) {
        $redis->get('test_key', function ($redis, $result) {
            var_dump($result);
        });
    });
});

$cli = new Swoole\Http\Client("server", 80);
$cli->setHeaders(['User-Agent' => 'swoole-http-client']);
$cli->setCookies(['test' => 'value']);

$cli->post('/dump.server', ["test" => 'abc'], function ($cli) {
    var_dump($cli->body);
    $cli->get('/index.server', function ($cli) {
        var_dump($cli->cookies);
        var_dump($cli->headers);
    });
});