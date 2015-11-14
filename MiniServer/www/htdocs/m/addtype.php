<!doctype html>
<html>
 <head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
		<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/jquery-1.11.3.min.js" ></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"  ></script>
<script type="text/javascript"  src="netjs/addtype.min.js"></script>
 </head>
 <body>
  <div data-role="page">
  <div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title"></span><a href="#" class="ui-btn-right ui-btn ui-btn-inline ui-btn-icon-right ui-icon-plus ui-btn-icon-notext" data-ajax="false" id="addtype1"></a></div>
		<div data-role="content">
		<ul data-role="listview" data-inset="true" data-divider-theme="a" id="lists">
		</ul>
		<div data-role="popup" id="popupMenu" data-theme="a">
		<ul data-role="listview"  >
		<li><a href="#" data-rel="back" id="alter">修改</a></li>
		<li><a href="#" data-rel="back" id="del">删除</a></li>
		<li><a href="#" data-rel="back">取消</a></li>
		</ul>
		</div>
	</div>
	<div data-role="popup" id="popupMenu2" data-theme="a">
		<div style="padding:10px 20px;"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><h3>添加分类</h3><label for="un" class="ui-hidden-accessible">Name:</label><input type="text" name="user" id="un" value="" placeholder="填写分类名称" data-theme="a"><button id="submits" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">确定</button></div>
		</div>
	</div>
	
	</div>
	
 </body>
</html>
