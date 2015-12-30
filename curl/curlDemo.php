<?php
    //初始化，返回一个句柄
    $ch = curl_init();
    //设置
    curl_setopt($ch, CURLOPT_URL, 'www.baidu.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //执行
    $optput = curl_exec($ch);

    //判断是否失败
    if($optput === false)
    {
        echo "cURL Error:" . curl_error($ch);
    }

    //获取抓取详细
    $info = curl_getinfo($ch);

    //关闭资源
    curl_close($ch);

    file_put_contents("baidu.html", $optput);

    $size = filesize("baidu.html");
    if($size != $info['size_download'])
    {
        echo "抓取数据不完整";
        echo $optput;

        return false;
    }
    else
    {
        echo "抓取: ". $info['url'] ."  ---------  耗时: ". $info['total_time'] ."秒...";
    }

 ?>
