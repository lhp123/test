<?
	include_once 'INCLUDE.php';
	include_once 'head.php';
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=yes" name="format-detection">
<meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM">
<?php 
//$sqlt="select * from XT_KEYWORDS where type='首页' and cid='".$CID."'";
//$stmtt=mysql_query(get_gbk($sqlt),$conn);
//while ( $rst = mysql_fetch_array ( $stmtt ) ){
//	if($rst['NAME']=="TITLE"){
//		$TITLE=$rst["CONTENT"];
//	}
//	else if($rst['NAME']=="KEYWORDS"){
//		$Keyword=$rst["CONTENT"];
//	}
//	else if($rst['NAME']=="DESCRIPTION"){
//		$Description=$rst["CONTENT"];
//	}
//}



?>
<link rel="shortcut icon" href="img/Icon-4.png" />
<link rel="apple-touch-icon" href="img/Icon-114.png"/>
<link rel="stylesheet" href="css/swiper.min.css">
<link href="netcss/mobile.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.all.css" rel="stylesheet">
<link href="css/jquery-ui-1.10.2.custom.min.css" rel="stylesheet">
<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery.tap.js"></script>
<style type="text/css">
body{ background-color:#333333}
div{margin:0px;padding:0px;}
#inner {
	position: relative;
	top:30px;
	width: 300px;
	margin: 0 auto;
}



</style>
	  <script type="text/javascript">

	
	//Main Swiper
	$(function() {var swiper = new Swiper('.swiper-container', {
		loop:true,
		autoplay:2500,
		centeredSlides: true,
		spaceBetween: 10,
		autoplayDisableOnInteraction: false
	});
});
$(function() {
          $( "#tel" ).draggable({ containment: "#parent", scroll: false });
        });



</script>
<script type="text/javascript">
//判断是否加载引导页  
$(function (){
	var today=new Date();
var fiveMinutes = 7*24*60*60;
	var show = localStorage.getItem("showYinDaoYe");
	
	var phonetype = navigator.userAgent;
	//alert(show);
	//alert("cha :"+(today.getTime()/1000-show));
	if (phonetype.indexOf("MicroMessenger")<0) {
		if((show&&today.getTime()/1000-show>=fiveMinutes)){
			
				localStorage.setItem("showYinDaoYe",today.getTime()/1000);
			
			
			if ((phonetype.match(/iPhone/i) || phonetype.match(/iPod/i))&& phonetype.match(/Safari/i)) {
				window.location.href="yinDao_phone.html";
			}
			
			if (phonetype.match(/Android/i)||(phonetype.match(/iPad/i)&& phonetype.match(/Safari/i))) {
				window.location.href="yinDao_android.html";
				//alert("test");
			}		
		}
	}
	if (phonetype.match(/MicroMessenger/i)) {
		if(document.getElementById("android_client_download")){			
			document.getElementById("android_client_download").style.display="none";
		}
	
	}

});
 

</script>

</head>

<body>
<div id="bodyc">

	<div id="fbinfo" style="display:none;">
			  <div id="inner"><img src="netimages/fp.jpg" width="300" height="171" /></div> 
	</div>

	

<div>
<a id="test1" href="myapp://afs.com.afs" style="display:none">test</a>
<script type="text/javascript">
$(function() {
	if(navigator.userAgent.match(/Android/i)){
	//alert("test");
	document.getElementById('test1').onclick=function(e){
		var ifrSrc='myapp://afs.com.afs';
		if(!ifrSrc){
			return;
			}
			
		var ifr = document.createElement('iframe');
		//alert("test");
		ifr.src=ifrSrc;
		ifr.style.display='none';
		document.body.appendChild(ifr);
		
		setTimeout(function(){
			document.removeChild(ifr);
		
		},1000);

	};
	if(document.all){
		
		document.getElementById('test1').click();
	}
	else{
		//alert("test");
		//var e = document.getEvent('MouseEvents');
		//e.initEvent('click',true,true);
		//document.getElementById('test1').dispatchEvent(e);
		document.getElementById('test1').click();
	}

	}
	});
</script>
<!--<table  border="0" cellspacing="0" cellpadding="0" class="index_top">-->

<!--<tr>
    <td style="background:url(netimages/tit_bg.jpg); background-size:100% 100%; background-repeat:no-repeat; line-height:2.6em;">
    <div id="companyName" style="float:left; padding-left:0.5em;">欢迎光临<?=get_utf8($companyName) ?></div>
    <div id="android_client_download" style="display:none;float:right; padding-right:0.5em; padding-left:1.5em; background:url(netimages/down.png) left center no-repeat; background-size:14% 60%;" onClick="download();">客户端下载</div>
    </td></tr>-->

    <!--<td height="8" >-->
	<div class="index_top" style="position:relative;">
	
	<!--<img src="<?php echo $photosy==""?"netimages/index_top.jpg":$photosy;?>" width="100%" class="index_img2" width="150" >-->


      <div class="swiper-container ">
        <div class="swiper-wrapper">
          <div class="swiper-slide"> <a href="myapp://afs.com.afs"><img src="netimages/t1.png"  width="100%"> </a></div>
          <div class="swiper-slide"> <a id="app"><img src="netimages/t2.jpg"  width="100%" onClick="download();"> </a></div>
         <div class="swiper-slide"> <a href="xfdetail.php?id=28"><img src="netimages/t3.jpg"  width="100%"></a> </div>
        </div>
     </div>

	
<script>
 $( "#app" ).on("tap",function(){
	download();
 });
 $(function (){

/*$(".test").on("tap",function(){
$(this).children("img").css("-webkit-transform","scale(0.95)");
$(this).children("img").css("-moz-transform","scale(0.95)");
$(this).children("img").css("-ms-transform","scale(0.95)");
$(this).children("img").css("-o-transform","scale(0.95)");
$(this).children("img").css("transform","scale(0.95)");

setTimeout(function (){
$(".test").children("img").css("-webkit-transform","scale(1)");
$(".test").children("img").css("-moz-transform","scale(1)");
$(".test").children("img").css("-ms-transform","scale(1)");
$(".test").children("img").css("-o-transform","scale(1)");
$(".test").children("img").css("transform","scale(1)");
},50);
});
 });*/

</script>





<!--	</td>
	</tr>
	
	
  </table>-->

  </div>
  <div id="parent">
  <script type="text/javascript" src="netjs/index_down.js"></script>
  <table border="0" cellspacing="0" cellpadding="0" class="index_top" >
  <div class="peppable"  style="position:absolute;z-index:10;right:0;" id="tel" ><img  src="netimages/phone.png"></div>
    <tr>
      <td  align="center" valign="top">
	  <a href="fylist.php?y=mm" class="test"><img src="netimages/1.png" width="95%" class="index_img2" ></a></td>
		<td align="center" valign="top">
      <a href="xflist.php" class="test"><img src="netimages/2.png" width="95%" class="index_img2"></a></td>
      <td  align="center" valign="top">
	  <a href="fylist.php?y=zl" class="test"><img src="netimages/3.png" width="95%" class="index_img2"></a>
</td>
</tr>

 <tr>

 <td  align="center"valign="top">

      <a href="xqlist.php" class="test"><img src="netimages/4.png" width="95%" class="index_img2"></a>
	  </td>

	  <td  align="center" valign="top">

      <a href="mortgage.php" class="test"><img src="netimages/5.png" width="95%" class="index_img2"></a></td>
	  <td  align="center"valign="top">
	  <a href="weituo.php" class="test"><img src="netimages/6.png" width="95%" class="index_img2"></a>
</td>
    </tr>

<tr><td height="50">&nbsp;</td></tr>


  </table>
  
 <script>

 $( "#tel" ).on("tap",function(){
	$(this).children("img").css("-webkit-transform","scale(0.9)");
	$(this).children("img").css("-moz-transform","scale(0.9)");
	$(this).children("img").css("-ms-transform","scale(0.9)");
	$(this).children("img").css("-o-transform","scale(0.9)");
	$(this).children("img").css("transform","scale(0.9)");
	setTimeout(function (){
	$("#tel").children("img").css("-webkit-transform","scale(1)");
	$("#tel").children("img").css("-moz-transform","scale(1)");
	$("#tel").children("img").css("-ms-transform","scale(1)");
	$("#tel").children("img").css("-o-transform","scale(1)");
	$("#tel").children("img").css("transform","scale(1)");
	},10);

	 var tel = "<?=$TEL400?>";
	 window.location.href="tel:"+tel;

 });


  </script>
</div>
  
 
 
<script>
var reqAnimationFrame = (function () {
        return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
           // window.setTimeout(callback, 1000 / 60);
        };
    })();
	 var el = document.querySelector("#tel");
	 var START_X = Math.round((window.innerWidth - el.offsetWidth) / 2);
    var START_Y = Math.round((window.innerHeight - el.offsetHeight) / 2);

    var ticking = false;
    var transform;
    var timer;

    var mc = new Hammer.Manager(el);

    mc.add(new Hammer.Pan({ threshold: 0, pointers: 0 }));
	  mc.add(new Hammer.Tap());
 mc.on("panstart panmove", onPan);
  mc.on("tap", onTap);
   function resetElement() {
        el.className = 'animate';
        transform = {
            translate: { x: START_X, y: START_Y },
            scale: 1,
            angle: 0,
            rx: 0,
            ry: 0,
            rz: 0
        };

        requestElementUpdate();

        if (log.textContent.length > 2000) {
            log.textContent = log.textContent.substring(0, 2000) + "...";
        }
    }

    function updateElementTransform() {
        var value = [
                    'translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0)',
                    'scale(' + transform.scale + ', ' + transform.scale + ')',
                    'rotate3d('+ transform.rx +','+ transform.ry +','+ transform.rz +','+  transform.angle + 'deg)'
        ];

        value = value.join(" ");
       // el.textContent = value;
        el.style.webkitTransform = value;
        el.style.mozTransform = value;
        el.style.transform = value;
        ticking = false;
    }

    function requestElementUpdate() {
        if(!ticking) {
            reqAnimationFrame(updateElementTransform);
            ticking = true;
        }
    }
	 function onPan(ev) {
        el.className = '';
        transform.translate = {
            x: START_X + ev.deltaX,
            y: START_Y + ev.deltaY
        };

        requestElementUpdate();
        logEvent(ev.type);
    }

    var initScale = 1;
    function onPinch(ev) {
        if(ev.type == 'pinchstart') {
            initScale = transform.scale || 1;
        }

        el.className = '';
        transform.scale = initScale * ev.scale;

        requestElementUpdate();
        logEvent(ev.type);
    }

    var initAngle = 0;
	 function onTap(ev) {
        transform.rx = 1;
        transform.angle = 25;

        clearTimeout(timer);
        timer = setTimeout(function () {
            resetElement2();
        }, 200);
        requestElementUpdate();
        logEvent(ev.type);
    }

function resetElement2() {
       // el.className = 'animate';
        transform = {
            translate: { x: START_X, y: START_Y },
            scale: 1,
            angle: 0,
            rx: 0,
            ry: 0,
            rz: 0
        };

        requestElementUpdate();

        
    }
	    resetElement();




</script>





<div style="position: fixed; left:0px; bottom:0px; z-index:1000; width:100%; overflow:visible; text-align:center; _position:absolute; _top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); margin:0 auto; clear:both; cursor:pointer;">
  <div class="tail" style="width:100%; height:50px; background:#333; margin:0 auto;">
  <ul><li class="tail_f1" >
  <a href="index.php">
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/7.png" width="20" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/7.png',sizingMethod='image'); float:left;" /></td>
   
      <td height="20" align="center" valign="bottom" class="tail_font">首 页</td>
	   </tr>

  </table>
  </a>
</li>
<a href="jsq/fdjsq_sy.php">
<li class="tail_l2" >
  <table width="70" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/8.png" width="18"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/8.png',sizingMethod='image'); float:left;
	  " /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">按揭器</td>
    </tr>
  </table>
</li>
</a>
<a href="jjrlist.php" >
<li class="tail_w2" >
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/9.png" width="20"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/9.png',sizingMethod='image'); float:left;" /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">经纪人</td>
    </tr>
  </table>
</li>
</a>
<a href="about.php">
<li class="tail_g2" >
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/10.png" width="20"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/10.png',sizingMethod='image'); float:left;" /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">招 聘</td>
    </tr>
  </table>
</li>
</a>
</ul>
  </div>
</div>

</div>
</body>
</html>

<script>
    var updateorientation = function (){
        var classname = '',top = 100;  
        switch(window.orientation){  
            case 0:  
            classname += "normal";  
            break;  
      
            case -90:  
            classname += "landscape";  
            break;  
      
            case 90:  
            classname += "landscape";  
            break;        
        }
        var bodyobj=document.getElementsByTagName("body")[0];
        if (classname == 'landscape') {  
            if (document.getElementById("overlay")==null) {
                window.scrollTo(0, 1); 
                //alert(window.screen.height);
                var overlaydivstr="<div id='overlay' style='width: 100%;height:"+(window.screen.width)+"px;text-align:center;'>"+document.getElementById("fbinfo").innerHTML+"</div>";
                bodyobj.innerHTML=overlaydivstr+bodyobj.innerHTML;  
				document.getElementById("bodyc").style.display="none";
            }
        } else {  
            bodyobj.removeChild(document.getElementById("overlay"));  
            document.getElementById("bodyc").style.display="";
        }  
    };  

////////////////////////////////      
    var supportsOrientationChange = "onorientationchange" in window,  
    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";  
      
    window.addEventListener(orientationEvent, function() {  
        updateorientation();  
    }, false);  
    </script>  

<script type="text/javascript">
var browseMode='';
localStorage["browseMode"]=browseMode;	
</script>

