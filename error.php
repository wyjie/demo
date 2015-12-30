<?php

    //自定义错误处理
    function myError($errstr, $errno, $errfile, $errline)
    {
        //非致命错误，抛出异常4e
        throw new Exception($errstr);
    }

    set_error_handler('myError', E_ALL | E_STRICT);

    try
    {
        $num = 5 / 0;
    }
    catch(Exception $e)
    {
        //print_r($e);
        echo $e->getMessage();
    }

 ?>
