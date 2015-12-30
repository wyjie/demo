<?php

    /**
     * @author yijie wang <world_er@hotmail.com>
     * @describe :PDO Demo
     */

    set_time_limit(0);
    //配置数据源
    $dsn = "mysql:host = localhost; dbname=test";
    $db = new PDO($dsn, 'root', 'root');
    //设置异常可捕获
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $db->exec("set names utf8");
        $sql = "INSERT INTO user(name, email, date, password) values('神棍德', 'world_er@hotmail.com', now(), '111111')";
        if($db->exec($sql) != 1){
            throw new PDOException();
        }

        //使用预处理语句
        $insert = $db->prepare("INSERT INTO user(name, email, date, password) values(?, ?, now(), ?)");
        $start = time();
        //插入50万条数据
        //for($i=0; $i<500000; ++$i){
        $insert->execute(array(base64_encode('傻馒'), 863979265, md5('flzx_3QC')));
        //}
        $end = time();

        echo $end - $start;

        $sql = "select * from user";
        $query = $db->prepare($sql);
        //$query->execute();
        //print_r($query->fetchAll(PDO::FETCH_ASSOC));

    }catch(PDOException $e){
        echo $e->getMessage();
    }

 ?>
