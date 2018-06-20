function menubar_click(){
	$(".header_menu").css({"right":0+"px"});
	$(".close").removeClass("on");
}
function close_click(){
	var width = $(".header_menu").width();
	$(".close").addClass("on");
	$(".header_menu").css({"right":-width+"px"});
}