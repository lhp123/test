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
	<script type="text/javascript" src="netjs/RegLogin.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="netjs/tools.js" charset="utf-8"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
  <script type="text/javascript" src="netjs/reg.min.js"></script>
  
	<title>注册页面</title>
 </head>
 <body>
	<div data-role="page">
		<div data-role="header"><h1>注册</h1></div>
		<div data-role="content">
				<div>
					<input type="text" name="username" id="username" placeholder="账户名"/>	
					<input type="hidden" value="0" id="usrchk"/>
				</div>
				<span id="usersp" class="error" style="display:none;"></span>
				<div >
					<input type="password" name="password" id="password" placeholder="密 码" />	
				</div>
				<div>
					<input type="text" name="name" id="name" placeholder="姓 名" />	
				</div>
				<div >
					<input type="text" name="mphone" id="mphone" placeholder="手机号" />	
				</div>
				<div class="zhuce">
					<button id="register">注 册</button>
				</div>
				<div>
				<input type="checkbox" name="checkbox-mini-0" id="checkbox-mini-0" data-mini="true" checked="checked">
    <label for="checkbox-mini-0">我接受<a href="clause.html" data-ajax="false">专属经纪人服务条款</a></label>
				</div>
			<a href="login.php" data-ajax="false">已有账号？点击登录</a>

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
