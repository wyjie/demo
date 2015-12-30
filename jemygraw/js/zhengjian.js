$(document).ready(function(){
	var headPos=$(".head-img").position();
	var headWidth=$(".head-img").width();
	$("#zj-zj-img").css({"left":headPos.left+headWidth/3*2,"top":headPos.top+headWidth/2+10});
	
});
