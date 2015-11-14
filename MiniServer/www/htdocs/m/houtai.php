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
	<script type="text/javascript" src="netjs/checkadminlogin.js"></script>
	<script type="text/javascript" src="netjs/houtai.min.js"></script>

	<title>首页</title>
 </head>

 <body id="houtaiPage">
<div data-role="page">
 
	<div id="ht_content">

		<!--middle-->
		<div class="ht_middle">
			<!--菜单列表-->
			<div class="menu">
				<ul class="menu_list">
					<li><a href="usermsg.php" data-ajax="false">用户信息</a></li>
					<li><a href="mysharemenu.php" data-ajax="false">我的点击</a></li>
					<li><a href="changepsw.php" data-ajax="false">修改密码</a></li>
				</ul>
			</div>
		</div>
	</div>
<div data-role="footer">
    <div data-role="navbar">
      <ul>
        <li><a href="index11.php"  data-icon="home" data-ajax="false">首页</a></li>
        <li><a href="gouwu_list.php"  data-icon="shop" data-ajax="false">购物车</a></li>
		<li><a href="houtai.php" class="ui-btn-active ui-state-persist"  data-icon="user" data-ajax="false">用户</a></li>
      </ul>
  </div>
</div>
</div>
 </body>
 
</html>