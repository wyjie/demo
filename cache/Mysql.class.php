<?php

    class Mysql
    {
        private $mysqli;
        private static $ins;
        private $rand;

        private function __construct()
        {
            $this->connect();
            $this->query('set names utf8');
            $this->rand = rand(1, 99999);
        }

        public static function getIns()
        {
            if(!(self::$ins instanceof self))
            {
                self::$ins = new Mysql();
            }

            return self::$ins;
        }

        private function connect()
        {
            try{
                $mysqli = new mysqli('localhost', 'root', 'root', 'bool');

                if($mysqli->connect_errno)
                {
                    throw new Exception();
                }

                $this->mysqli = $mysqli;
            }catch(Exception $e){
               die($mysqli->connect_errno . "--连接错误:" . $mysqli->connect_error);
            }

        }

        //查询数据
        public function query($sql)
        {
            $res = $this->mysqli->query($sql);

            return $res;
        }

        //获取所有数据
        public function getAll($sql)
        {
            $res = $this->query($sql);

            $list = array();

            while($row = $res->fetch_assoc())
            {
                $list[] = $row;
            }

            return $list;
        }

        public function getRand()
        {
            echo $this->rand + '<br/>';
        }

        public function insert($sql)
        {
            return $this->query($sql);
        }
    }


 ?>
