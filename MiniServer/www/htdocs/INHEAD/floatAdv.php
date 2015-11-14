<?php 
$float_left=$photoAction->showPhotoImage("首页浮动广告位左",true);
$float_right=$photoAction->showPhotoImage("首页浮动广告位右",true);

?>
<div id="float_left" 
style="position: absolute;top: 100px;left: 10px;width: 110px;height: 405px;">

<?php echo $float_left["photohtml"];?>
<div><a href="#" class="close">关闭</a></div>
</div>
<div id="float_right"
style="position: absolute;top: 100px;right: -10px;width: 110px;height: 405px;">
<?php echo $float_right["photohtml"];?>
<div><a href="#" class="close">关闭</a></div>
</div>
<script type="text/javascript">

$(function (){
	var offset = $("#float_left").offset();
	var top = offset.top;
	var sh ,h;
	$(window).scroll( function() { 
			sh = $(document).scrollTop();
			h = (sh+top);
//			alert(h);
			if(h<360){
				$("#float_left,#float_right").animate({top:"100px"},{duration:500,queue:false});
			}else{
				$("#float_left,#float_right").animate({top:(h-200)+"px"},{duration:500,queue:false});
			}
			
		 } ).trigger("scroll");
	 $(".close").click(function (){
		$(this).parent().parent().hide();
	 }).parent().parent().each(function (){
			if( $(this).find("img").length==0 ) {
				$(this).hide();
				}
		 });
	 
})
</script>