<?php

    include 'Db.php';
    /**
     * Created by yijie wang on 2015-11-14 11:11:36
     * mysql 实现
     */

    class Mysql implements Db
    {
        private static $ins;

        private final function __construct()
        {

        }

        public static function getIns()
        {
            if(!self::$ins instanceof self)
            {
                return new self();
            }

            return self::$ins;
        }

        public function connect($l, $u, $p)
        {
            echo "连接到mysql数据库" . PHP_EOL;
        }
    }

 ?>
