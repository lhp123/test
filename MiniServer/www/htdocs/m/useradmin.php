<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>9){
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
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/tools.js" charset="utf-8"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
		<script type="text/javascript" src="netjs/useradmin.min.js"></script>
	<title>注册页面</title>
 </head>
 <body>
	<div  data-role="page">
		<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title">用户修改</span></div>
		<div data-role="content">
				<div>
					<span class="inputTip" style="display:block;">账户名</span>
					<input type="text" name="username" id="username" readonly="readonly" value="" />	
				</div>
				<div>
				<select id="state1"  name="state" style="height:100%;font-size:1.1em;">
							<option id="pt" value="1" />普通内部人员</option>
							<option id="fb" value="2" />发布者</option>
							<option id="xt" value="3"  />协调者</option>
							<option id="qr" value="4"  />总确认者</option>
							<option id="sh" value="5"  />审核者</option>
							<option id="wb" value="7"  />外部人员</option>
							<option id="gl" value="9"  />管理员</option>
				</select>
				</div>
				<div>
					<span class="inputTip" style="display:block;">姓&nbsp;&nbsp; 名</span>
					<input type="text" name="name" id="name" value="" />	
					
				</div>
				<div>
					<span class="inputTip" style="display:block;">手机号</span>
					<input type="text" name="mphone" id="mphone" value="" />	
					
				</div>
					<div>
				<span class="inputTip" style="display:block;">邀请码</span>
					<input type="text" name="invitecode" id="invitecode" readonly="readonly" value="" />	
					
				</div>
				<div>
					<span class="inputTip" style="display:block;">年&nbsp;龄</span>
					<select name="select-native-1" id="select-native-1">
				        <option value="1">22以下</option>
				        <option value="2">23-30</option>
				        <option value="3">31-40</option>
						<option value="4">41-55</option>
						<option value="5">55以上</option>
			    	</select>	
					
				</div>
				<div>
					<span class="inputTip" style="display:block;">行&nbsp;业</span>
					<select name="select-native-2" id="select-native-2">
				        <option value="1">IT|通信|电子|互联网</option>
				        <option value="2">金融业</option>
				        <option value="3">房地产|建筑业</option>
						<option value="4">商业服务</option>
						<option value="5">贸易|批发|零售|租赁业</option>
						<option value="6">文体教育|工艺美术</option>
						<option value="7">生产|加工|制造</option>
						<option value="8">交通|运输|物流|仓储</option>
						<option value="9">服务业</option>
						<option value="10">文化|传媒|娱乐|体育</option>
						<option value="11">能源|矿产|环保</option>
						<option value="12">政府|非盈利机构</option>
						<option value="13">农|林|牧|渔|其他</option>
				    </select>	
				</div>
				<div>
					<span class="inputTip" style="display:block;">居住地</span>
					<select name="select-native-3" id="select-native-3">
				        <option value="1">街口街道</option>
				        <option value="2">江浦街道</option>
				        <option value="3">城郊街道</option>
						<option value="4">温泉镇</option>
						<option value="5">良口镇</option>
						<option value="6">太平镇</option>
						<option value="7">鳌头镇</option>
						<option value="8">吕田镇</option>
				    </select>	
				</div>
				<div>
					<button id="register">修 改</button>
				</div>
		</div>
	</div>


 </body>
</html>
