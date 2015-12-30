<html><style>
	.{
		whi
	}
</style></html>
<?php 

	//回调函数
	function myCallBack($p1, $p2)
	{
		echo $p1.", ".$p2 . "<br />";
	}

	$p = array('p1' => 'hello', 'p2' => 'world');

	call_user_func_array('myCallBack', $p);


	//回调类的方法
	class MyClass
	{
		private $callBackMethodDesc = 'className->callBackMethod <br />';
		public static $staticCallBackMethodDesc = 'className::staticCallBackMethod <br />';

		public function callBackMethod()
		{
			echo $this->callBackMethodDesc;
		}

		public static function staticCallBackMethod()
		{
			echo self::$staticCallBackMethodDesc;
		}
	}


	$myClass = new MyClass();
	call_user_func(array($myClass, 'callBackMethod'));
	call_user_func('MyClass::staticCallBackMethod');
 ?>