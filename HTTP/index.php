<?php

    /**
     * 灌水机器人(树杈blog)
     * 发表文章
     * 字段：title(标题)，cat_id(分类)，is_bou(是否精品)，is_tj(推荐)，
     *         art_key(关键字)，body(内容 )
     */

    $data = array('name'=>'俺老孙到此一游', 'passwd' => '123456');
    //生成请求字符串
    $data = http_build_query($data);
    $opts = array(
        'http' => array(
            //请求方法
            'method' => 'POST',
            //头信息
            'header' => "Content-Type: application/x-www-form-urlencoded"."\r\n".
                        "Content-Length: " . strlen($data) . "\r\n".
                        "Cookie: ECS[visit_times]=4; PHPSESSID=uljd1bnqut3nekpn9mr21dngf6" . "\r\n".
                        "User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36"."\r\n".
                        "Referer: http://localhost/demo/demo/HTTP/login.html" . "\r\n",
            //主体
            'content' => $data

            )

        );

    $context = stream_context_create($opts);
    $html = file_get_contents('http://localhost/demo/demo/HTTP/login.php', false, $context);
 ?>

