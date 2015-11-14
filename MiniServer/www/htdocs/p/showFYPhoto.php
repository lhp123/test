
<?php 
    function showPhoto($photo){
?> 

	<div class="dl">
        <span fyid="" ctid='17' id="ppcfyid" style="display: none;"></span>
        <?
   
		if ($photo==""){
			 $photo="img/view_default.jpg";
		}
		$photostr=explode(";",$photo);	
		foreach( $photostr as $k=>$v){
				if( !$v )
					unset( $photostr[$k] );
			}
			
        ?>
        <div id='swipe' class='a1'>
         <div class="a4">
         <?
         for($fi=0;$fi<count($photostr);$fi++){
			$photocompress=getCompressPic($photostr[$fi],80);
         	echo "<div class='a2'>
           <img class='a3' onclick='show(this)' src='".$photocompress."' data-src-swipe='".$photocompress."' />		
          </div>";
         }
         ?>
         </div>
         <nav class="a6">
         <span id="positions" class="position"> 
         <?
         for($fi=0;$fi<count($photostr);$fi++){
         	echo "<em ".($fi==0?"class='on'":"").">&bull;</em>&nbsp;";
         }
         ?>
          </span>
         </nav>
        </div>
       </div>
		<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:1001;width:100%;height:100%;display:none;">
		<div id="innerdiv" style="position:absolute;"><img id="bigimg" style="border:5px solid #fff;" src="" /></div>
		
		</div>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script>
function imgShow(outerdiv, innerdiv, bigimg, _src){
	var src = _src;
	$(bigimg).attr("src", src);
	
	$("<img/>").attr("src", src).load(function(){
		var windowW = $(window).width();
		var windowH = $(window).height();
		var realWidth = this.width;
		var realHeight = this.height;
		var imgWidth, imgHeight;
		var scale = 0.8;
		
		if(realHeight>windowH*scale) {
			imgHeight = windowH*scale;
			imgWidth = imgHeight/realHeight*realWidth;
			if(imgWidth>windowW*scale) {
				imgWidth = windowW*scale;
			}
		} else if(realWidth>windowW*scale) {
			imgWidth = windowW*scale;
			imgHeight = imgWidth/realWidth*realHeight;
		} else {
			imgWidth = realWidth;
			imgHeight = realHeight;
		}
		$(bigimg).css("width",imgWidth);
		
		var w = (windowW-imgWidth)/2;
		var h = (windowH-imgHeight)/2;
		$(innerdiv).css({"top":h, "left":w});
		$(outerdiv).fadeIn("fast");
	});	
	$(outerdiv).click(function(){
		$(this).fadeOut("fast");
	});
}
function show(obj){
	imgShow("#outerdiv", "#innerdiv", "#bigimg", obj.src);
}
</script>
<?php }?>		