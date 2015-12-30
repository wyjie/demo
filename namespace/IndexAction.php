<?php 

	namespace Controller;

	use Service\IndexService;

	include './IndexService.php';
	/**
	* IndexController
	*/
	class IndexController
	{
		private $indexService;

		public function __construct()
		{
			$this->service = new IndexService();
		} 
	}

	$index = new IndexController();

 ?>