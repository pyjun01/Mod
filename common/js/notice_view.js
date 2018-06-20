$(document).ready(function(){
	$(".file_li").click(function(){
		if( $(this).hasClass("on")){
			$(this).removeClass("on");
			$(".sub_file").css({"height":90+"px"});
		}else{
			$(".sub_file").css({"height":0+"px"});
			$(this).addClass("on");
		}
	});
});
