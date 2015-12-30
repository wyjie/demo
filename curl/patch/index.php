<?php

    //cURL 批处理
    $url1 = 'http://localhost/demo/demo/curl/patch/01.php';
    $url2 = 'http://localhost/demo/demo/curl/patch/02.php';


    //创建两个cURL资源
    $ch1 = curl_init();
    $ch2 = curl_init();

    //设置
    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_HEADER, 0);

    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_HEADER, 0);

    //创建批处理句柄
    $mh = curl_multi_init();

    curl_multi_add_handle($mh, $ch1);
    curl_multi_add_handle($mh, $ch2);

    $active = null;

    do
    {
        $mrc = curl_multi_exec($mh, $active);
    } while($mrc == CURLM_CALL_MULTI_PERFORM);

    while ($active && $mrc == CURLM_OK)
    {
        if(curl_multi_select($mh) != -1)
        {
            do{
                $mrc = curl_multi_exec($mh, $active);
            } while($mrc == CURLM_CALL_MULTI_PERFORM);
        }
    }

    curl_multi_remove_handle($mh, $ch1);
    curl_multi_remove_handle($mh, $ch2);
    curl_multi_close($mh);
?>
