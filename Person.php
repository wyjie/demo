<?php

    /**
     * PHP的类
     */
    class Person
    {
        private $name;
        private $age;

        /**
         * 构造函数
         * @param [string] $name [名字]
         * @param [int] $age  [年龄]
         */
        function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        public function say()
        {
            echo "my name is ", $this->name, " age is ", $this->age, "\n";
        }

        /**
         * 析构函数
         */
        public function __destruct(){}
    }



    $xiaoming = new Person("哀木涕", 20);

    //php中的对象是由数组模拟出来的, 可以把对象转化成数组
    print_r(array($xiaoming));
    /**
     * Array
     * (
     * [0] => Person Object
     *    (
     *       [name:Person:private] => 哀木涕
     *       [age:Person:private] => 20
     *    )
     * )
     */

    var_dump($xiaoming);
    /**
     * object(Person)#1 (2) {
     *     ["name":"Person":private] => string(9) "哀木涕"
     *     ["age":"Person":private] => int(20)
     * }
     */

    echo "<hr />";

    //直观的看到，对象就是一堆数据，可以把一个对象存储起来，这就是序列化
    //序列化是指把存在于内存中的各种对象状态(属性)保存起来，并在需要的时候
    //反序列化

    //把一个对象存到文件里
    $str = serialize($xiaoming);        //O:6:"Person":2:{s:12:" Person name";s:9:"哀木涕";s:11:" Person age";i:20;}
    file_put_contents('store.txt', $str);       //二进制

    //从文件中取出序列化字符串，并进行反序列化
    $str = file_get_contents('./store.txt');
    $xiaoming = unserialize($str);
    $xiaoming->say();

    //不难发现，对象序列化后存储的只是对象的属性，可见，类是属性和对象的集合
    //而对象则是属性的集合，在类的方法区中存储的方法，由该类的对象共享

 ?>
