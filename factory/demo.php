<?php

    include './DbFactory.php';

    $dbFactory = new DbFactory('Mysql');
    $db  = $dbFactory->getDb();
    $db->connect(1,2,3);


 ?>
