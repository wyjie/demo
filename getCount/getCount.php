<?php

    if(!file_exists('count.txt')){
        file_put_contents('count.txt', 1);
    }

    $count = (int)file_get_contents('count.txt');

    file_put_contents('count.txt', ++$count);

    echo $count;

 ?>
