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
	<script type="text/javascript" src="netjs/RegLogin.min.js"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="netjs/login.min.js"></script>

	<style type="text/css">
	body{
	 
	  font-size:17px;
	  color:black;
	}
	a{
	  text-decoration:none;
	}
	.content{
	background:#facf00;
	}
	.content .ui-title{
	    font-family:"微软雅黑";
	}
	</style>
	<title>账户登录</title>
 </head>
 <body>
	<div id="content" class="content" data-role="page">
		<div data-role="header"><span class="ui-title">登录</span></div>
		<div data-role="content">
				<div >
					<input type="text" name="username" id="username" placeholder="账户名" />
				</div>
				<div >
					<input type="password" name="password" id="password" placeholder="密 码"/>	
				</div>
				<div class="denglu">
					<button id="login">登 录</button>
				</div>
			<a href="reg.php" data-ajax="false">没有账号？点击注册</a>
			<div>
				<label>登录即代表您接受<a href="clause.html" data-ajax="false">专属经纪人服务条款</a></label>
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
