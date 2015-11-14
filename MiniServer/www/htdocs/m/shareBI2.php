<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
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
	<link rel="stylesheet" type="text/css" href="netcss/style.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script src="netjs/highcharts.js"></script>
	<script src="netjs/highcharts-3d.js"></script>
	<script src="netjs/exporting.js"></script>
	<script type="application/javascript" src="netjs/tools.js"> </script>
	<script type="application/javascript" scr="netjs/shareBI2.min.js"></script>
	<title>首页</title>
 </head>

 <body>
 <div id="container" style="width:100%;text-align:center;">

	 </div>
   
	
 
 </body>
</html>
