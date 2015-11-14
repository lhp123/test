<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>9){
	header("location:index11.php");
}
?>
<!DOCTYPE html>
<html>
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<meta content="yes" name="apple-mobile-web-app-capable"> 
	<meta content="black" name="apple-mobile-web-app-status-bar-style"> 
	<meta content="telephone=yes" name="format-detection">
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script src="netjs/userlist.min.js"></script>
</head>

<body>
		
<div data-role="page">
	<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title">用户列表</span></div>
	<div data-role="content">
		<ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true" id="list_ul" >
		</ul>
		<div data-role="popup" id="popupMenu" data-theme="a">
		<ul data-role="listview"  >
		<li><a href="#" id="alter">修改</a></li>
		<li><a href="#" data-rel="back" id="del">删除</a></li>
		<li><a href="#" data-rel="back">取消</a></li>
		</ul>
		</div>
	</div>
</div>
	
 </body>

</html>