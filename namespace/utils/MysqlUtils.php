<?php
	
	namespace Utils;

	class MysqlUtils
	{
		private static $ins;
		private $conn;

		private final function __construct()
		{
			include '../res/config.php';
			$this->conn = $this->connection($config['host'], $config['user'], $config['passwd'], $config['dbname'], $config['port']);

			var_dump($this->conn);
		}

		//防止被克隆
		private function __clone()
		{

		}

		//获取实例
		public static function getIns()
		{
			if(!self::$ins instanceof self)
			{
				self::$ins = new MysqlUtils();
			}

			return self::$ins;
		}

		//连接数据库
		public function connection($host, $user, $passwd, $dbname, $port=3306)
		{
			try{
				$mysqli = new \Mysqli($host, $user, $passwd, $dbname, $port=3306);

				if($mysqli->connect_errno)
				{
					throw new Exception();
				}

				return $mysqli;
			}catch(Exception $e){
				die($mysqli->connect_errno . '--连接数据库失败--' . $mysqli->connect_error);
			}			
		}
	}

 ?>