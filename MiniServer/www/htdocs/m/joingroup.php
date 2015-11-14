<!doctype html>
<html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/LAB.min.js"></script>
	<!--<script type="text/javascript" src="netjs/joingroup.min.js"></script> -->

 </head>

 <body>
  <div data-role="page">
  <div data-role="header" >
  <img src="netimages/header.jpg" style="width:100%">
  </div>
		<div data-role="content" id="dd">
			<div>
				<input type="text" name="mphone" id="mphone" placeholder="填写你的手机号完成注册"/>
			</div>
			<div>
				<input type="text" name="invitecode" id="invitecode" placeholder="请输入邀请码"/>
			</div>
			<div>
				<button id="register">马上去分享链接</button>
			</div>
			<div>
				<button id="go">已经注册？马上去分享链接吧！</button>
			</div>
			<div style="text-align:center;">
			<input type="checkbox" id="checkbox-0" checked="checked" data-mini="true" style="margin-top:2px;">
    		我接受<a href="clause.html" data-ajax="false">专属经纪人服务条款</a>
		</div>
		<div style="text-align:center;margin-top:2%;">
		<a href="#" id="scroll"><img src="netimages/weixin.gif" style="width:100%"/></a>
		<p>添加微信 随时咨询</p>
			<img src="" id="content" style="width:100%" />
		</div>
		</div>

 </body>
</html>
