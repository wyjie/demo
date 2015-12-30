<?php 

	namespace Model;

	use Utils\MysqlUtils;

	include '../utils/MysqlUtils.php';

	class DemoModel
	{
		function __construct()
		{
			$mysql = MysqlUtils::getIns();
		}
	}

	$demo = new DemoModel();

 ?>