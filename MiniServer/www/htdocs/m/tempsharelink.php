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
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/tools.js"> </script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="netjs/tempsharelink.js"></script>
	<title>首页</title>
 </head>
 <body >
 <div  data-role="page">
				<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title"></span></div>
			<div data-role="content">
			<input type="hidden" id="auth" value=<?php echo $_SESSION["auth"] ?> />
				<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
				<thead>
					<tr>
						<th>客户电话</th>
						<th data-priority="1">链接所属电话</th>
						<th data-priority="2">所属上家账号</th>
						<th data-priority="1">所属上家姓名</th>
						<th data-priority="2">所属链接</th>
						<th data-priority="3">时间</th>
						<th data-priority="1">状态</th>
					</tr>
					</thead>
					<tbody id="sharelink">
					</tbody>
					</table>
					<div id="count"></div>
			</div>
	</div>
 </body>


</html>