<?php
$db['master'] = array(
    'type'       => Swoole\Database::TYPE_MYSQLi,
    'host'       => "db",
    'port'       => 3306,
    'dbms'       => 'mysql',
    'engine'     => 'MyISAM',
    'user'       => "root",
    'passwd'     => "root",
    'name'       => "test",
    'charset'    => "utf8",
    'setname'    => true,
    'persistent' => false, //MySQL长连接
);
return $db;