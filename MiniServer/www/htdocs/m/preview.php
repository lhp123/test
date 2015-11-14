<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>2&&$_SESSION["auth"]<>9){
	header("location:index11.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta charset="utf-8"> 
	 <link rel="stylesheet" type="text/css" href="netcss/style3.css"/>
  	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script src="netjs/preview.js"></script>
	<script src="netjs/tools.js"></script>
	<title></title>
 </head>
  <style>
 body {TEXT-ALIGN: center;}
.msKeimgBox img{width:90%;height:auto;margin-left:auto;margin-right:auto;}
 </style>
 <body style="width:100%;">
 <div id="title"  style="width:100%;font-size:1.5em;margin-bottom:20px; text-align:center">
   <span>...</span></div>
  <div id="test" class="msKeimgBox" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;margin-bottom:15%;">	
  </div>
 </body>
</html>
