<?php

    //文件缓存测试
    function getTree2Cache()
    {
        if(file_exists('./cat.php'))
        {
            $str = file_get_contents('./cat.php');
            eval("\$tree = $str;");
        }
        else
        {
            include("Mysql.class.php");

            $mysql = Mysql::getIns();

            $sql = "select * from category";

            $tree = $mysql->getAll($sql);
            file_put_contents('./cat.php', var_export($tree, TRUE));
        }

        return $tree;
    }

    //只接查数据库
    function getTree2Db()
    {
        include("Mysql.class.php");

        $mysql = Mysql::getIns();
        $mysql->getRand();

        $sql = "select * from category";

        $tree = $mysql->getAll($sql);

        return $tree;
    }

    //开源的文件缓存产品Secache
    function getTree2Secache()
    {
        include("secache/secache.php");
        $cache = new secache();
        $cache->workat('cachedata');

        $k = md5('tree');
        $v = file_get_contents('./cat.php');

        $cache->store($k, $v);
    }

    //getTree2Cache();
    //getTree2Db();
    //getTree2Secache();
    //
    function serializaDemo()
    {
        include 'Demo.php';
        include("Mysql.class.php");
        $mysql = Mysql::getIns();

        $demo = new Demo();
        $demo->name = '哀木涕';
        $demo->age = 18;
        //$demo = base64_encode(serialize($demo));
        $demo = json_encode($demo);
        echo $demo;
        $sql = "insert into demo(class) values('". $demo ."')";
        $mysql->insert($sql);

    }

    serializaDemo();

 ?>
