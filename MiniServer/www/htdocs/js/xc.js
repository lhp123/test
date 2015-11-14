function locking(){
	 document.getElementById("zzjs_net").style.display="block";
	 document.getElementById("zzjs_net").style.width=document.body.clientWidth;
	 document.getElementById("zzjs_net").style.height=document.body.clientHeight;
	 document.getElementById("www_zzjs_net").style.display='block';
}//q欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。
function Lock_CheckForm(theForm){
 document.getElementById("zzjs_net").style.display='none';document.getElementById("www_zzjs_net").style.display='none';
 return false;
}//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。


$(function(){
	//纵向，默认，移动间隔2
    //$('div.albumSlider').albumSlider();
    //横向设置
    //$('div.albumSlider-h').albumSlider({direction:'h',step:3});
	
	$('div.albumSlider ul.imglist li a img').on("mouseover",function (event){
		
		var src = $(this).attr("src");
		$('div.albumSlider div.fullview img').attr("src",src);
		return false;
	});
});