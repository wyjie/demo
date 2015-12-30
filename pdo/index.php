<?php

    /**
     * php模拟sql参数绑定
     * Created by yijie wang in 2015-11-19 17:44:17
     * @param  [type] $sql      [sql语句]
     * @param  [type] $location [参数位置]
     * @param  [type] $val      [参数值]
     * @param  [type] $type     [参数类型]
     * @return [void]           [void]
     */
    function bindParam(&$sql, $var, $type){
        $type = strtoupper($type);
        switch ($type){
            case 'STRING':
                $var = addslashes($var);    //转义
                $var = "'". $var ."'";      //给字符串加''
                break;
            case 'INT':
                $var = (int)$var;
                break;
            default:
                //更多类型
                break;
        }

        for($i=0, $pos=0; $i<1; $i++){
            $pos = strpos($sql, '?', $pos+1);
        }

        $sql = substr($sql, 0, $pos) . $var . substr($sql, $pos+1);
    }

    $id = 10086;
    $name = "野德新之助";
    $sql = "update user set name = ? where id = ?";
    bindParam($sql, $name, 'string');
    bindParam($sql, $id, 'int');

    echo $sql;

?>
