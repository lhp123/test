<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>2&&$_SESSION["auth"]<>9&&$_SESSION["auth"]<>5){
	header("location:index11.php?auth=".$_SESSION["auth"]);
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
	<link rel="stylesheet" type="text/css" href="netcss/style.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/RegLogin.js"></script>
	<title>首页</title>
 </head>
 <body id="listPage">
	<div id="list_content">
		<!--头部-->
		<div id="ht_header">
			<!--退出 管理中心-->
			<div class="ht_nav">
			<a href="index11.php">首页</a>
				<ul class="lr_ul" style="float:right;">
					<li><a href="javascript:logout();">退出&nbsp;&nbsp;&nbsp;</a></li>
					<li><a href="houtai.php" >您好，<span id="sess_id"><?php echo $_SESSION["usrname"] ?></span>&nbsp;&nbsp;&nbsp;</a></li>
				</ul>
				<input type="hidden" id="auth" value=<?php echo $_SESSION["auth"] ?> />
			</div>
		</div>