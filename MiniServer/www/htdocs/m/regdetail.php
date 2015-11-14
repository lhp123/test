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
	<script type="text/javascript" src="netjs/regdetail.min.js"></script>
	<title>注册页面</title>
 </head>
 <body>
 <div data-role="page">
 <div data-role="header"><span class="ui-title">继续完成资料</span><a href="QR.php" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-carat-r" data-ajax="false">跳过</a></div>
	<div data-role="content">
		<div class="ui-field-contain">
	    	<label for="select-native-1">年龄:</label>
		    <select name="select-native-1" id="select-native-1">
		        <option value="1">22以下</option>
		        <option value="2">23-30</option>
		        <option value="3">31-40</option>
				<option value="4">41-55</option>
				<option value="5">55以上</option>
		    </select>
		</div>
		<div class="ui-field-contain">
	    	<label for="select-native-2">行业:</label>
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
		<div class="ui-field-contain">
	    	<label for="select-native-3">居住地:</label>
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
		<button id="summit">提交资料</button>
	</div>
</div>
  </div>
 
 </body>
</html>
