<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>证件照</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.19.1" />
	<link rel="stylesheet" type="text/css" href="css/main.css"></link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/zhengjian.js"></script>
	<script type="text/javascript" src="js/jquery.textchange.min.js"></script>
</head>

<body>
<div id="zj-main-body">
	<div style="width:200px;margin:20px auto;">
		<h2>好人证申请</h2>
	</div>
	<div id="zj-create-panel">
		<form action="zhengjian.php" method="POST">
			<ul>
				<li><label class="zj-label">头像链接</label><input type="text" name="head" class="zj-text" id="head-img"/></li>
				<li><label class="zj-label">姓名</label><input type="text" name="name" class="zj-text" id="name"/></li>
				<li><label class="zj-label">英文名</label><input type="text" name="english_name" class="zj-text" id="english-name"/></li>
				<li><label class="zj-label">QQ号码</label><input type="text" name="qq" class="zj-text" id="qq"/></li>
				<li><label class="zj-label">人人网</label><input type="text" name="renren" class="zj-text" id="renren"/></li>
				<li><label class="zj-label">开心网</label><input type="text" name="kaixin" class="zj-text" id="kaixin"/></li>
				<li><label class="zj-label">新浪微博</label><input type="text" name="sinaweibo" class="zj-text" id="weibo"/></li>
				<li><label class="zj-label">Facebook</label><input type="text" name="facebook" class="zj-text" id="facebook"/></li>
				<li><label class="zj-label">Twitter</label><input type="text" name="twitter" class="zj-text" id="twitter"/></li>
				<li><input type="submit" value="创建" class="zj-button"/></li>
			</ul>
		</form>	
	</div>
	<?php
		if(isset($_POST["head"]) && trim($_POST["head"])!=""){
			$headUrl=$_POST["head"];
			$name=$_POST["name"];
			$englishName=$_POST["english_name"];
			$qq=$_POST["qq"];
			$kaixin=$_POST["kaixin"];
			$renren=$_POST["renren"];
			$sinaweibo=$_POST["sinaweibo"];
			$facebook=$_POST["facebook"];
			$twitter=$_POST["twitter"];
		?>
		
			<div id="zj-inst-demo-panel">
				<div>
					<div style="float:left;"><img src="<?php echo $headUrl;?>" class="head-img" id="demo-head-img"/></div>
					<div style="float:left;margin-left:20px;">
						<label class="zj-title">好人证</label>
						<br/>
						<br/>
						<label class="zj-label">姓名:</label><label class="zj-sb-label" id=""><?php echo $name;?></label>
						<br/>
						<label class="zj-label">英文名:</label><label class="zj-sb-label"><?php echo $englishName;?></label>
					</div>
					<div class="clear"></div>
					<div style="margin-top:10px;">
						<img src="images/zj-img.png" class="zj-zj-img" id="zj-zj-img"/>
						<table style="width:100%;">
							<tr>
								<td><img src="images/qq.png" class="zj-img"/><span class="zj-span"><?php echo $qq;?></span></td>
								<td><img src="images/renren.png" class="zj-img"/><span class="zj-span"><?php echo $renren;?></span></td>
							</tr>
							<tr>
								<td><img src="images/kaixin.png" class="zj-img"/><span class="zj-span"><?php echo $kaixin;?></span></td>
								<td><img src="images/sinaweibo.png" class="zj-img"/><span class="zj-span"><?php echo $sinaweibo;?></span></td>
							</tr>
							<tr>
								<td><img src="images/twitter.png" class="zj-img"/><span class="zj-span"><?php echo $twitter;?></span></td>
								<td><img src="images/facebook.png" class="zj-img"/><span class="zj-span"><?php echo $facebook;?></span></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		<?php	
		}
	?>
</div>

</body>

</html>
