$(document).ready(function (){
	
	$(".xq_detail .three a img").click(function (){
		
		$(this).parents(".three").siblings(".two").toggleClass("two_h");
		
	});
	
	$(".xq_around li").click(function (){
		$(this).siblings("li").removeClass("select");
		$(this).addClass("select");
		$(this).closest("ul").siblings("div").toggleClass("display");
	});
	
	//var  offset = $("#center").offset();
	
	//$(document).scrollTop(-offset.top);
	
	
});