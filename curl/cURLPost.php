<?php
    $url = 'http://localhost/demo/demo/curl/01.php';
    $filepath = 'D:\debug.exe';

    //post
    $post = array(
        'name' => 'wyjie',
        );

    //构造上传文件
    if(class_exists('\CURLFile'))
    {
        $post['art_img'] = new \CURLFile(realpath($filepath));
    }
    else
    {
        $post['art_img'] = '@' . realpath($filepath);
    }


    //cURL发送post请求
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $optput = curl_exec($ch);
    curl_close($ch);

    echo $optput;

 ?>
