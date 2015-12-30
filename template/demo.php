<?php
    include 'TempLate.calss.php';

    $tpl = TempLate::getIns();
    $tpl->assign('name', 'wangyijie');
    $tpl->assign('password', 'wangyijie');
    $tpl->display('index');

 ?>
