<?include_once 'INCLUDE.php'; ?>
<?

include_once 'temhead.php'; 

//$act=filterParaAllByName("act");
//if($act=="save"){
//	$sql="insert into XT_TS (CID,TSDATE,TEL,TYPE) values('".$CID."',SYSDATE(),'".get_gbk(filterParaByName("TEL"))."','".get_gbk('手机')."')";
//	execute($sql);
	//echo "<script>location.href='?s=1';</script>";
//}
?>

<link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/photoswipe.css'>
<link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/default-skin/default-skin.css'>

 <link rel="stylesheet" type="text/css" href="netcss/buttons.css"/>
<style>
a span{
text-align:center;
font-size:1em;
}
b{
color:#ff0000;
}
A:link {
 color: #000000;
 TEXT-DECORATION: none
}
A:visited {
 COLOR: #000000;
 TEXT-DECORATION: none
}
A:hover {
 COLOR: #000000;
 text-decoration: none;
}
A:active {
 COLOR: #000000;  
 text-decoration: none;
}

</style>
<div style="width:100%;font-size:1.5em;margin-bottom:20px; text-align:center">
   <span>3D大迷宫 门票送送送！</span></div>
   <div class="my-gallery"  style="margin-bottom:150px;" itemscope itemtype="http://schema.org/ImageGallery">
<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" >
	<a href="netimages/000.jpg" itemprop="contentUrl" data-size="1024x1024" style="width:100%;">
	<img src="netimages/000.jpg" style="width:100%;" itemprop="thumbnail" alt="Image description" />
	<span>输入电话号码，点击<b>“我要迷宫券”</b>，即可到得田地产门店以及景业荔都项目现场领取3D迷宫券</span>
	</a>
</figure>
<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
	<a href="netimages/DSC04920.JPG" itemprop="contentUrl" data-size="1024x1024">
	<img src="netimages/DSC04920.JPG" style="width:100%;" itemprop="thumbnail" alt="Image description"/>
		<span><br/>
得田地产总店地址：<br/>
从化区街口街城中路48号<br/>
电话：020-37938886<br/></span>
	</a>
</figure>	

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
	<a href="netimages/640.webp (4).jpg" itemprop="contentUrl" data-size="1024x1024">
	<img src="netimages/640.webp (4).jpg" style="width:100%;" itemprop="thumbnail" alt="Image description"/>
	<span>建设路店地址：<br/>
从化区街口街建设路107<br/>
电话：020-37908881</span>
	</a>
</figure>
</div>
  <form id="lyform" name="lyform" action="ly.php" method="post">
      <div class="drop" id="drop" style="left:0px; bottom:0px;z-index:2;position: fixed;width:100%;">
	  <div>
<input type="hidden" value="save" name="act" id="act"/>
<img src="netimages/phone26.png" style="width:auto;float:left;margin:10px 0px 10px 10px;height:44px;"><input type="number" name="TEL" id="TEL" style="height:40px;margin:10px 0px 10px 0px;width:80%;font-size:1em;float:left;border:1px soild #000000;" placeholder="请先输入手机号" />
</div>
<a href="#" onclick="check();" style="width:80%;float:left;text-align:center; "  class="button green serif round">我要迷宫券</a>
</div>
</form>
<script type="text/javascript">
function check(){
	//var myform = document.getElementById("lyform");
    var TEL= document.getElementById("TEL").value;
	var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
    if(TEL==""||TEL=="请输入手机号"){
		alert("先留下电话号码，再点击领券！");
		return ;
	}
	if(TEL!=""&&TEL!="请输入手机号"&&(!reg.test(TEL))){
		alert("先留下电话号码，再点击领券！");  return ;
		}else{
    //myform.submit();
	$.ajax({
	 url:"lyajax.php",
	 type:"post",
	 data:{act:"save",TEL:TEL},
	 error: function(){  
            // alert('Error loading XML document');  
         },
	success: function(data,status){//如果调用php成功    
             //alert(data);//解码，显示汉字
			 window.location.href='tel:15889981324';
     }
	});
		}
	//window.location.href='tel:13926111171';
}
</script>





<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
 <script type="text/javascript" src="netjs/photoswipe-ui-default.min.js"></script>
 <script src="netjs/photoswipe.min.js"></script>
 <script src="netjs/ly2.js"></script>
 </body>
</html>
