<?php

    /**
     * Created by yijie wang on 2015-11-12 13:11:59
     */
    class Person
    {
        private $name;
        private $sex;
        private $age;

        public function say()
        {
            echo "hello, world";
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __get($name)
        {
            return $this->$name;
        }

        //__call实现的重载
        public function __call($name, $arguments)
        {
            $size = count($arguments);
            switch($size)
            {
                case 1:
                    say();
                    break;
                case 2:
                    say();
                    break;
                default:
                    echo $name . PHP_EOL;       //根据操作系统选择换行符'\r\n'
                    break;
            }
        }

    }

    //调用不存在的方法
    $p = new Person();
    $p->song();     //Fatal error: Call to undefined method Person::song()
 ?>
