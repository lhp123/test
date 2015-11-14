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
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="application/javascript" src="netjs/tools.js"> </script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="netjs/selectBI.min.js"></script>
	<title>首页</title>
 </head>
 <body>
  <div data-role="page" id="pageone">
  <div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title"></span></div>
  <div data-role="content">
    <ul data-role="listview" data-inset="true" id="lists">
      <li>
        <a href="#" id="list1">
        <h2>各用户留电话比例</h2>
        </a>
      </li>
      <li>
        <a href="#" id="list2">
        <h2>各用户浏览比例</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list3">
        <h2>总成交转化比率</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list4">
        <h2>总留电话转化比率</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list5">
        <h2>各用户成交比例</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list6">
        <h2>今天浏览量</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list7">
        <h2>一天浏览量</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list8">
        <h2>按时间段浏览量分析</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list9">
        <h2>一个月浏览量</h2>
        </a>
      </li>
	  <li>
        <a href="#" id="list10">
        <h2>自选日期日浏览量</h2>
        </a>
      </li>
    </ul>
  </div>
</div> 
 </body>
</html>
