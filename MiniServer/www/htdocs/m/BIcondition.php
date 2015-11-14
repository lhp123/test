<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
?>
<!doctype html>
<html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<meta content="yes" name="apple-mobile-web-app-capable"> 
	<meta content="black" name="apple-mobile-web-app-status-bar-style"> 
	<meta content="telephone=yes" name="format-detection">
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="application/javascript" src="netjs/tools.js"> </script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="netjs/BIcondition.min.js"></script>
	<title>首页</title>
 </head>
 <style>
 body{
 text-align:center;
 }
 </style>
 <body>
 <div data-role="page">
<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title"></span></div>
			<div data-role="content">
  <label class="lab">从</label>
  <input id="begindate" type="date" >
  <input id="beginmon" type="month" >
  <label class="lab">到</label>
  <input id="enddate" type="date" >
  <button id="summit">提交</button>
  </div>
  </div>

 </body>
</html>
