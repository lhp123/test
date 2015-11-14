jQuery(function(){
//图库弹出层
$(".mskeLayBg").height($(document).height());
$(".msKeimgBox p").click(function(){
	alert("test");
	var li = "<img src='"+$(this).attr("src")+"'/>"
	$(".mske_html").html(li);
	$(".mskeLayBg").show();
	$(".mskelayBox").fadeIn(300)});
$(".mske_html").click(function(){$(".mskeLayBg,.mskelayBox").hide()});
});
