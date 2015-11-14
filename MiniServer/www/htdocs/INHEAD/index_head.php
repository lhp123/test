<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

include_once PATH_WEBROOT.'action/KwAction.php';

include_once PATH_WEBROOT.'action/PhotoAction.php';

$photoAction=new PhotoAction($conn, $CID);

$kwAction=new KwAction($conn,$CID);

$index_tdk=$kwAction->getTDK("首页");

?>

<title><?php echo $index_tdk["TITLE"]?></title>

<meta name="description" content="<?php echo $index_tdk["DESCRIPTION"]?>" />

<meta name="keywords" content="<?php echo $index_tdk["KEYWORDS"]?>" />



<link href="/css/index.css" rel="stylesheet" type="text/css" />

<link href="/css/index_login.css" rel="stylesheet" type="text/css" />

<link href="/css/footer.css" rel="stylesheet" type="text/css" />

<link href="/css/index_lrtk.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>

<script type="text/javascript" src="/js/glable-effect.js"></script>

<script type="text/javascript" src="/js/urlcheck.js"></script>

<script type=text/javascript src="/js/lrscroll.js"></script>

<script type="text/javascript" src="/js/index.js"></script>

<style type="text/css">

#center_main_tj_cj .left #scrollDiv ul, #center_main_tj_cj .left #scrollDiv ul li {

	margin: 0;

	padding: 0

}

#hedpic {

	float: left;

	height: 80px;

	width: 130px;

}

#scrollDiv {

	overflow: hidden;

	width: 820px;

	height: 38px;

}

#scrollDiv li {

	height: 38px;

	padding-left: 10px;

	float: none;

	width: 820px;

	overflow: hidden;

}





</style>



<script type="text/javascript">

function sh(n){ 

	var obj=n; 

	var liObj=obj.getElementsByTagName("li"); 

	var length=liObj.length; liObj[0].className+=" hover"; 

	for(var i=0;i<length;i++){ 

		liObj[i].onmouseover=function(){ 

			for(var j=0; j<length; j++){ 

				liObj[j].className=liObj[j].className.replace("hover", " "); 

			} 

			this.className+=" hover"; 

		}

	}

}

</script>

</head>



<body>

<?php 

$photo=$photoAction->showPhotoImage("首页顶部广告位"); 

if($photo["ifHasAdv"]){

	echo "<div>".$photo["photohtml"]."</div>";

}

?>

<div id="header">

<?php include_once 'index_login.php';?>

  <div id="header_line"></div>  

  <div id="header_main">  

    <div id="header_logo"><?php $photo=$photoAction->showPhotoImage("LOGO_CONTENT"); echo $photo["photohtml"];?></div>

    <div id="header_nav">

	  <div id="top_nav"> <span id="loginStatusMsg"></span> <a id="loginStatus" class="a_float" href="#" rel="div_Content">登录&nbsp;|&nbsp;注册</a>&nbsp;&nbsp;客服热线：<?php echo $COMTEL;?>&nbsp;&nbsp;<a href="map.php" target="_blank">地图</a> </div>

      

      <div id="header_nav_main">

        <ul>

          <li><a href="/index.php">首页</a></li>

          <li><a href="/mmfy_list.php">二手房</a></li>
           
<li><a href="/lpdl/lpdl.php">一手楼</a></li>

          <li><a href="/zlfy_list.php">租房</a></li>

          <li><a href="/xq/xq_list.php">小区</a></li>

          <li><a href="/jjr_list.php">经纪人</a></li>

          <li><a href="/news/news.php">资讯</a></li>

          <li><a href="/registe.php">委托</a></li>

        </ul>

      </div>

    </div>

    <div id="hedpic"><a href='/m/download/eallAndroidPhoneClient.apk'><img src="/images/hedpic.png" width="130" height="80" /></a></div>

  </div>

</div>

<?php include_once 'index_search.php';?>

<?php include_once '2wei.php';?>

<?php include_once 'QQ.php';?>