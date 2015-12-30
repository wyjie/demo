<?php 
	if (($_SERVER['PHP_AUTH_USER'] != 'admin') || ($_SERVER['PHP_AUTH_PW'] != 'admin'))
	{
   		header('WWW-Authenticate: Basic Realm="Secret Stash"');
   		header('HTTP/1.0 401 Unauthorized');

   		print('You must provide the proper credentials!');
   		exit;
	}
	else
	{
    	echo 'hello, world';
	}

 ?>
			<!-- user dropdown ends -->
			<div id="bell-container">
				 <div class="btn-group pull-right theme-container animated tada"  data-toggle="popover" data-placement="bottom"  id="bell" data-content="" title="通知">
	                    <i class="glyphicon glyphicon-bell"  style="font-size: 40px;color:#fff;cursor:pointer"></i>
	                    <span class="hidden-sm hidden-xs"></span>
	                    <span class="notification red" style="display:none">6</span>
	            </div>
			
			</div>
		


			<div id="bell-container">
				 
			
			<div class="btn-group pull-right theme-container animated tada" data-toggle="popover" data-placement="bottom" id="bell" data-content="" title="通知"><i class="glyphicon glyphicon-bell" style="font-size: 40px;color:#fff;cursor:pointer"></i><span class="hidden-sm hidden-xs"></span> <span class="notification red">0</span> </div></div>
