<?php
    class CustomerEntity
    {
        private $servicer;

        public function add(ServiceI $servicer)
        {
            $this->servicer = $servicer;
        }

        public function call()
        {
            $this->servicer->execute();
        }
    }

    echo date('Y-m-d H:i:s', 1447381532);


 ?>
