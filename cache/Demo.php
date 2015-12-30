<?php

    class Demo
    {
        private $name;
        public $age;

        public function __construct()
        {
            echo 'sxx';
        }

        public function test()
        {
            echo "string";
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }
    }


 ?>
