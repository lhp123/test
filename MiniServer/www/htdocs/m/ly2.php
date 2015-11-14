<?include_once 'INCLUDE.php'; ?>
<?include_once 'temhead.php'; ?>
<script type="text/javascript">
function GetRequest() { 
	var url = location.search; //获取url中"?"符后的字串 
	var theRequest = new Object(); 
	if (url.indexOf("?") != -1) { 
		var str = url.substr(1); 
		strs = str.split("&"); 
		for(var i = 0; i < strs.length; i ++) { 
			theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]); 
		} 
	} 
	return theRequest; 
}
function gethw(img){
var image=new Image();
image.src=img;
var w = image.width;
var h = image.height;

return w+"x"+h;

}
$(function(){
var id=GetRequest()["id"];

$.ajax({
	 url:"lyajax.php",
	 type:"post",
	 data:{act:"get",id:id},
	 error: function(){  
            // alert('Error loading XML document');  
         },
	success: function(data,status){//如果调用php成功    
             //alert(data);//解码，显示汉字
			 //alert("test");
			var data2=jQuery.parseJSON(data);
			if(data2.success==1){
				document.title=data2.title;
				document.getElementById("title").innerHTML="<span>"+data2.title+"</span>";
				if(data2.button!="")
				document.getElementById("btn").innerHTML=data2.button;
				else
				document.getElementById("btn").innerHTML="点击即可拥有";
				//alert(data2.button);
				if(data2.phone!="")
				document.getElementById("act").value=data2.phone;
				else
				document.getElementById("act2").value=data2.tips;

				
				var contrain = "";
				//alert(JSON.parse(data2.content));
				var contents=jQuery.parseJSON(data2.content);
				//alert(content);
				for(var i=0;i<contents.length;i++){
					//alert(gethw(content[i].img));
					while(!(typeof (gethw(content[i].img))=="string")){
						alert(gethw(content[i].img);
					}
					contrain += "<figure itemprop='associatedMedia' itemscope itemtype='http://schema.org/ImageObject'><a href='"+contents[i].img+"' itemprop='contentUrl' data-size='"+gethw(contents[i].img)+"' style='width:100%;'><img src='"+contents[i].img+"' style='width:100%;' itemprop='thumbnail' alt='Image description' />";
					if(contents[i].content!=""){
						contrain +="<span>"+contents[i].content+"</span>";
					}
					contrain += "</a></figure>"
				}
				//alert(contrain);
				document.getElementById("contrainer").innerHTML=contrain;
			}else{
				alert(data2.success);
			}
     }
	});


});



</script>


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
<div id="title" style="width:100%;font-size:1.5em;margin-bottom:20px; text-align:center">
   <span>3D大迷宫 门票送送送！</span></div>
   <div id="contrainer" class="my-gallery"  style="margin-bottom:150px;" itemscope itemtype="http://schema.org/ImageGallery">


</div>

      <form id="lyform" >
      <div class="drop" id="drop" style="left:0px; bottom:0px;z-index:2;position: fixed;width:100%;">
	  <div style="width:100%;">
<input type="hidden" value="save" name="act" id="act"/>
<input type="hidden" value="save"  id="act2"/>
<img src="netimages/phone26.png" style="width:12%;float:left;margin:0px 0px 0px 0px;"/><input type="number" name="TEL" id="TEL" style="margin:0px 0px 0px 0px;width:80%;font-size:2em;float:left;" placeholder="请先输入手机号" />
</div>
<a id="btn" href="#" onclick="check();" style="width:80%;float:left;text-align:center; "  class="button green serif round">我要券</a>
</div>



</form>
<script type="text/javascript">
function check(){
	//var myform = document.getElementById("lyform");
    var TEL= document.getElementById("TEL").value;
	var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
    if(TEL==""||TEL=="请输入手机号"){
		alert("先留下电话号码,再点击按钮！");
		return ;
	}
	if(TEL!=""&&TEL!="请输入手机号"&&(!reg.test(TEL))){
		alert("先留下电话号码,再点击按钮！");  return ;
		}else{
    //myform.submit();
	$.ajax({
	 url:"lyajax.php",
	 type:"post",
	 data:{act:"save",TEL:TEL,title:document.title},
	 error: function(){  
            // alert('Error loading XML document');  
         },
	success: function(data,status){//如果调用php成功    
             //alert(data);//解码，显示汉字
			 var phone = document.getElementById("act").value;
			 //
			 if(phone!="" || phone!="save"){
				// alert(phone);
				//window.location.href="tel:28990003";
			 window.location.href='tel:'+phone;

			 }else{
				var tips = document.getElementById("act2").value;
				 alert(tips);
			 }
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


















    