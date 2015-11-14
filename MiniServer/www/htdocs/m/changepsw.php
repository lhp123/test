<!doctype html>
<html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/tools.js" charset="utf-8"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="netjs/checklogin.js"></script>
	<script type="text/javascript" src="netjs/changepsw.min.js"></script>
	<title>修改密码</title>
 </head>
 <body>
	<div data-role="page">
		<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title">修改密码</span></div>
		<div data-role="content">
				<div >
					<span class="inputTip" style="display:block;">原来的密码</span>
					<input type="password" name="username" id="opassword"/>	
					
				</div>
				<div>
				<span class="inputTip" style="display:block;">最新的密码</span>
					<input type="password" name="name" id="npassword"/>	
					
				</div>
				<div>
					<span class="inputTip" style="display:block;">再输入密码</span>
					<input type="password" name="mphone" id="gpassword" />	
					
				</div>
				<div>
					<button id="register">修 改</button>
				</div>
		</div>
	</div>

	
 </body>
</html>

