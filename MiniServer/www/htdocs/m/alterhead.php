<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>2&&$_SESSION["auth"]<>9&&$_SESSION["auth"]<>5){
	header("location:index11.php");
}
?>
<!doctype html>
<html >
 <head>
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<meta content="telephone=no" name="format-detection">
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/RegLogin.min.js"></script>
<script type="text/javascript" src="netjs/plupload.full.min.js"></script>
	<link rel="stylesheet" href="netjs/themes/default/default.css" />
	<link rel="stylesheet" href="netjs/plugins/code/prettify.css" />
	<script charset="utf-8" src="netjs/kindeditor.js"></script>
	<script charset="utf-8" src="netjs/lang/zh_CN.js"></script>
	<script charset="utf-8" src="netjs/plugins/code/prettify.js"></script>
	<script type="text/javascript" src="js/initLocation.js"></script>
		 <script type="text/javascript" src="js/GlobalProvinces_main.js"></script>
<script type="text/javascript" src="js/GlobalProvinces_extend1.js"></script>
		<title>首页</title>
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
