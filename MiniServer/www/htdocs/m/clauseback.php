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
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" href="netjs/themes/default/default.css" />
	<link rel="stylesheet" href="netjs/plugins/code/prettify.css" />
	<script charset="utf-8" src="netjs/kindeditor.js"></script>
	<script charset="utf-8" src="netjs/lang/zh_CN.js"></script>
	<script charset="utf-8" src="netjs/plugins/code/prettify.js"></script>
	<script type="text/javascript" src="netjs/plupload.full.min.js"></script>
	<script type="text/javascript" src="netjs/clauseback.min.js"></script>

<style type="text/css">
			.ul_pics li{float:left;width:160px;height:160px;border:1px solid #ddd;padding:2px;text-align: center;margin:0 5px 5px 0;}
			.ul_pics li .img{width: 160px;height: 140px;display: table-cell;vertical-align: middle;}
            .ul_pics li img{max-width: 160px;max-height: 140px;vertical-align: middle;}
			.ul_pics li div textarea{width: 100%;vertical-align: middle;}
            .progress{position:relative;padding: 1px; border-radius:3px; margin:60px 0 0 0;} 
            .bar {background-color: green; display:block; width:0%; height:20px; border-radius:3px; } 
            .percent{position:absolute; height:20px; display:inline-block;top:3px; left:2%; color:#fff } 
			.bianji input{width:60%;font-size:1.5em;}
			.bianji {margin-top:1em;}
        </style>
 
 </head>
 <body style="text-align:center;">
 <div data-role="page">
<div data-role="content">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">产品图片：</span>
						<div>
						<ul id="ul_pics1" class="ul_pics clearfix"></ul>
						</div>
						<div>
						<input type="button"  id="btn1" value="选择图片" style="margin-top:30px;" />
						</div>
					</div>
					<div style="margin:0 auto; width:60%;">
						<span class="inputTip">产品描述：</span>
						<textarea name="content1" id="content1" style="width:100%;height:400px;visibility:hidden;"></textarea>
					</div>
					<div class="bianji">
					<input type="button" name="button" id="summit" value="提交内容" />
					</div>
				</div>
				</div>

</body>


</html>

