<?php include_once 'INCLUDE.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>手机版首页</title>
<link rel="shortcut icon" href="img/Icon-4.png" />
<link rel="apple-touch-icon" href="img/Icon-114.png"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
<script src='netjs/jquery-1.7.1.min.js'></script>
<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
	
	var height = $(window).height();
	var width  = $(window).width();
	$("#center").css("height",height+"px");

	$("a").each(function (){
		var href = $(this).attr("href");
		
		if( href=="#" || href=="" ) {
			$(this).attr("href","javascript:void(0);");
		}
	});
	$("#bgimg").click($.noop); //禁止查看背景图片

	// 下载
	var ua = navigator.userAgent.toLowerCase();
	var opts={
			clientAndroidPhoneAddress:"download/eallAndroidPhoneClient.apk",
			clientAndroidIpadAddress:"download/eallAndroidIpadClient.apk",
	}
	$(".download").each( function () {

		if( ua.match(/iPhone/i) || ua.match(/iPod/i) ){
			//
			$(this).hide();
			}

		if( ua.match(/Android/i) || ua.match(/iPad/i) || ua.match(/Safari/i) ){

			$(this).click( function () {
				//alert("sdsd");
				location.href = opts.clientAndroidPhoneAddress;
				})
			}
		
		})


	//搜索
	var  url = "fylist.php?y=mm";
	
	$(".search").blur( function () {
		
			$(this).val() == "" ? $(this).val( $(this).attr("title") ):null;

		}).focus( function () {

			$(this).val() == $(this).attr("title") ? $(this).val(""):null;
			
		}).keydown( function (e) {

			if(e.which){
				location.href = url + "&mohu=" + $(this).val().trim();
			}
			
		}).trigger("blur");

	$(".searchBt").click ( function () {
		
		location.href = url + "&mohu=" + ( $(".search").val() != $(".search").attr("title") ? $(".search").val().trim() : "" );
		
		}) 	

			

});
</SCRIPT>
<style type="text/css">
html {font-size: 62.5%;/*10 ÷ 16 × 100% = 62.5%*/}
body {font-size: 1.4rem;/*1.4 × 10px = 14px */}
#center {
	width: 100%;
	height:100%;
	margin: 0px auto;
	padding: 0px;
	position:relative;
	overflow:hidden;
}
img{ border:0px;}
body {
	margin: 0px;
	padding: 0px;
}
#left {
	width: 76%;

	padding-right: 2%;
	padding-left: 2%;
	position: absolute;
	top: 0px;
	left: 0px;
	height: 100%;
	
}
#box1 {
	height: 12%;
	width: 95%;
	background: rgba(62,93,145,0.8);
	margin-top: 2%;
	padding-left: 5%;
	padding-top: 3%;
	margin-top:10%;
}
.box2 {
	background: rgba(62,93,145,0.8);
	float: left;
	width: 47%;
	margin-right: 6%;
	height: 22%;
	margin-top: 3.5%;
	text-align: center;
}
.box3 {
	background: rgba(62,93,145,0.8);
	float: left;
	width: 47%;
	height: 22%;
	margin-top: 3.5%;
	text-align: center;
}
#right {
	width: 16%;
	padding-right: 2%;
	padding-left: 2%;
	position: absolute;
	top: 0px;
	left: 80%;
	margin-top: 35%;
}
#right img {
	margin-bottom: 2%;
}

#left{
-webkit-animation:bounceIn 1s .2s ease both;
-moz-animation:bounceIn 1s .2s ease both;}
@-webkit-keyframes bounceIn{
0%{opacity:0;
-webkit-transform:scale(.3)}
50%{opacity:1;
-webkit-transform:scale(1.05)}
70%{-webkit-transform:scale(.9)}
100%{-webkit-transform:scale(1)}
}
@-moz-keyframes bounceIn{
0%{opacity:0;
-moz-transform:scale(.3)}
50%{opacity:1;
-moz-transform:scale(1.05)}
70%{-moz-transform:scale(.9)}
100%{-moz-transform:scale(1)}
}
#box1{
-webkit-animation:bounceInDown 1s .2s ease both;
-moz-animation:bounceInDown 1s .2s ease both;}
@-webkit-keyframes bounceInDown{
0%{opacity:0;
-webkit-transform:translateY(-2000px)}
60%{opacity:1;
-webkit-transform:translateY(30px)}
80%{-webkit-transform:translateY(-10px)}
100%{-webkit-transform:translateY(0)}
}
@-moz-keyframes bounceInDown{
0%{opacity:0;
-moz-transform:translateY(-2000px)}
60%{opacity:1;
-moz-transform:translateY(30px)}
80%{-moz-transform:translateY(-10px)}
100%{-moz-transform:translateY(0)}
}
.box2{
-webkit-animation:bounceInLeft 1s .2s ease both;
-moz-animation:bounceInLeft 1s .2s ease both;}
@-webkit-keyframes bounceInLeft{
0%{opacity:0;
-webkit-transform:translateX(-2000px)}
60%{opacity:1;
-webkit-transform:translateX(30px)}
80%{-webkit-transform:translateX(-10px)}
100%{-webkit-transform:translateX(0)}
}
@-moz-keyframes bounceInLeft{
0%{opacity:0;
-moz-transform:translateX(-2000px)}
60%{opacity:1;
-moz-transform:translateX(30px)}
80%{-moz-transform:translateX(-10px)}
100%{-moz-transform:translateX(0)}
}
.box3{
-webkit-animation:bounceInRight 1s .2s ease both;
-moz-animation:bounceInRight 1s .2s ease both;}
@-webkit-keyframes bounceInRight{
0%{opacity:0;
-webkit-transform:translateX(2000px)}
60%{opacity:1;
-webkit-transform:translateX(-30px)}
80%{-webkit-transform:translateX(10px)}
100%{-webkit-transform:translateX(0)}
}
@-moz-keyframes bounceInRight{
0%{opacity:0;
-moz-transform:translateX(2000px)}
60%{opacity:1;
-moz-transform:translateX(-30px)}
80%{-moz-transform:translateX(10px)}
100%{-moz-transform:translateX(0)}
}

.sys{
-webkit-animation:bounce 1s .2s infinite alternate;
-moz-animation:bounce 1s .2s infinite alternate;}
@-webkit-keyframes bounce{
0%,20%,50%,80%,100%{-webkit-transform:translateY(0)}
40%{-webkit-transform:translateY(-20px)}
60%{-webkit-transform:translateY(-15px)}
}
@-moz-keyframes bounce{
0%,20%,50%,80%,100%{-moz-transform:translateY(0)}
40%{-moz-transform:translateY(-20px)}
60%{-moz-transform:translateY(-15px)}




　　　.search {
　　　　　width:100%; line-height:20px; font-size:20px;padding:0px; margin:0px; background:#333333;
　　　　}
</style>

</head>

<body>
	<div id="center">
    <!-- <img src="images/bg123.jpg" width="100%">  -->
    <?php echo getIndexImage("手机版首页底图",$conn);
		
	?>
<div id="left">
   	<div id="box1">
    <img src="images/jpfy.png" width="50%">
    <div style="position:relative; width:80%; margin:0px; padding:0px;">
    <input class="search" name="" title="搜二手房:区域、标题、小区 、标签" value="" type="text" style="width:100%; margin:0px; height: 1.5em;padding:0px;">
    <a href="#" class="searchBt" style="position:absolute; left:90%; top:2px;"><img src="images/ssfdj.png" width="90%" ></a> 
    </div>
      	</div>
    <div class="box2">
	    <a href="fylist.php?y=mm"><img src="images/esf.png" height="100%"></a>
    </div>
    <div class="box3">
    	 <a href="fylist.php?y=zl"><img src="images/zf.png" height="100%"></a>
    </div>
    <div class="box2">
    	<a href="jsq/fdjsq_sy.php"><img src="images/jsq.png" height="100%"></a>
    </div>
    <div class="box3">
    	<a href="ly.php"> <img src="images/ly.png" height="100%"></a>
    </div>
    <div class="box2">
    	<a href="zp.php"><img src="images/zp.png" height="100%"></a>
    </div>
    <div class="box3">
    	 <a href="news.php"><img src="images/news.png" height="100%"></a>
    </div>
  </div>
      <div id="right">
   	  <a  href="#" class="download">  <img src="images/xzkhd1.png" width="70%" style=" margin-bottom:0px;" class="sys"> </a>
      <a  href="#" class="download"> <img src="images/xzkhd.png" width="70%"> </a>
      <a  href="xflist.php"> <img src="images/xf.png" width="70%"> </a>
      <a  href="tel:<?=$TEL400 ?>" >  <img src="images/dh.png" width="70%"> </a>
      <a  href="about.php">  <img src="images/gy.png" width="70%"></a>
	  <a  href="help.php">  <img src="images/bangz.png" width="70%"> </a>
      </div>
</div>
</body>
</html>
