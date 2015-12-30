<?php

    $host = 'www.baidu.com';
    $port = '80';

    set_time_limit(0);      //设置脚本运行时间

    //创建socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('could not create socket' . PHP_EOF);
    //绑定socket到ip和端口
    $result = socket_bind($socket, $host, $port);
    //开始监听连接
    $result = socket_listen($socket, 3);


 ?>
