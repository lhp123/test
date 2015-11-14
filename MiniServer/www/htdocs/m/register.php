<!doctype html>
<html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/LAB.min.js"></script>
 </head>
  <script>
 $LAB.script("netjs/jquery-1.7.1.min.js")
    .wait()    // 空的wait()只是确保script1在其他代码之前被执行
    .script("netjs/tools.js")
	.wait()// script2 和 script3 依赖于 script1
    .script("netjs/jquery.lazyload.js")
       // 但是script2 和 script3 并不互相依赖,可以并行下载
	.script("netjs/jquery.mobile-1.4.5.min.js")
    .script("netjs/register.js")
  </script>
 <body>
  <div data-role="page">
  <div data-role="header" ><img src="netimages/header.jpg" style="width:100%"></div>
		<div data-role="content" id="dd">
			<div>
				<input type="text" name="mphone" id="mphone" placeholder="填写你的手机号完成注册"/>
			</div>
			<div>
				<button id="register">马上去分享链接</button>
			</div>
			<div>
				<button id="go">想拿更多佣金？马上点击</button>
			</div><div style="text-align:center;"><input type="checkbox" id="checkbox-0" checked="checked" data-mini="true" style="margin-top:2px;">我接受<a href="clause.html" data-ajax="false">专属经纪人服务条款</a></div>
		<div style="text-align:center;margin-top:2%;">
		<a href="#" id="scroll"><img src="netimages/weixin.gif" style="width:100%"/></a>
		<p>添加微信 随时咨询</p>
			<img src="" id="content" style="width:100%" />
		</div>
		</div>
 </body>
</html>
