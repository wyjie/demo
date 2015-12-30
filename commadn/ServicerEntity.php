<?php

    class SeivicerEntity implements ServiceI
    {
        private $name;
        private $age;
        private $sex;
        private $chef;      //命令的接受者

        public function __construct(ChefEntity $chef)
        {
            $this->chef = $chef;
        }

        /**
         * 下发命令
         * @return [type] [description]
         */
        public function execute()
        {
            $this->chef->make();
        }
    }

 ?>
