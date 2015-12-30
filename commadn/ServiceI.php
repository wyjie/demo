<?php

    interface ServiceI
    {
        public function __construct(ChefEntity $chef);
        public function execute();
    }

 ?>
