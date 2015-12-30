<?php

    //反射API
    class Mysql
    {
        public function connect($db)
        {
            echo "我连接到数据库${db[0]}了, 我天下无敌了, 哈哈哈哈!!!";
        }
    }

    //类的东态调用
    class SqlProxy
    {
        //保存类的实现的数组
        private $target;

        function __construct($className)
        {
            $this->target[] = new $className();
        }

        //核心
        function __call($name, $args)
        {
            foreach ($this->target as $obj)
            {
                $r = new ReflectionClass($obj);

                if($method = $r->getMethod($name))
                {
                    //减查方法是否公开，是否是抽象方法
                    if($method ->isPublic() && !$method->isAbstract())
                    {
                        //invoke执行
                        $method->invoke($obj, $args);
                    }
                }
            }
        }
    }

    //Test
    $sqlProxy = new SqlProxy('mysql');
    $sqlProxy->connect('haier_st');



 ?>
