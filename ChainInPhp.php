<?php

    /**
     * Creaded by yijie wang on 2015-11-12 10:57:22
     *
     * php链式操作
     * 例: 过滤一个字符串首位的空格，然后取字符串的长度
     *     strlen(trim($str));
     *     现需要实现类似js中的链式操作
     *     $str->trim()->strlen();
     */

    //链式操作，String类的实现
    class MyString extends stdClass
    {
        private $_val;

        public function __construct($str)
        {
            $this->_val = $str;
        }

        public function __tostring()
        {
            return $this->_val.'';
        }

        //核心，调用不存在的函数会自动调用此函数
        public function __call($method, $arguments)
        {
            //自能实现一个参数的链式操作
            $this->_val = call_user_func($method, $this->_val);

            return $this;
        }
    }

    //@Test 测试
    $myString = new MyString('  yijie wang   ' . PHP_EOL);
    echo $myString->trim()->strlen();

 ?>
