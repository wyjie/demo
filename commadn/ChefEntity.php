<?php

    /**
     * 厨师
     */
    class ChefEntity
    {
        public function __construct()
        {

        }

        private $name;
        private $sex;
        private $age;

        /**
         * 炒菜
         * @return [type] [description]
         */
        public function mark()
        {
            echo "西红柿炒月饼" . PHP_EOF;
        }

        /**
         * 完成
         * @return [type] [description]
         */
        public function ok()
        {
            return true;
        }
    }

 ?>
