<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>3&&$_SESSION["auth"]<>9&&$_SESSION["auth"]<>4&&$_SESSION["auth"]<>5){
	header("location:index11.php");
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
	<link rel="stylesheet" type="text/css" href="netcss/style.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<title>首页</title>
 </head>
 <body id="indexPage">
	<div id="in_content" data-role="page">
	<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title">客户链接</span></div>
		<div id="in_list">
			<ul id="nav">
				<li><a href="allsharemenu.php" data-ajax="false">有账号链接</a><div class="right_1"><img src="netimages/louf.png"/></div></li>
				<li><a href="tempsharemenu.php" data-ajax="false">无账号链接</a><div class="right_1"><img src="netimages/louf.png"/></div></li>
			</ul>
		</div>
	</div>

 </body>
</html>
