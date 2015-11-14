<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

include_once PATH_WEBROOT.'action/KwAction.php';

include_once PATH_WEBROOT.'action/PhotoAction.php';

$kwAction=new KwAction($conn,$CID);

$photoAction=new PhotoAction($conn, $CID);

?>

<?php 

if($pos=="经纪人"){

	$tdk=$kwAction->getTDK("经纪人");

}

else if($pos=="关于我们"){

	$tdk=$kwAction->getTDK("关于我们");

}

?>



<title><?php echo $tdk["TITLE"]?></title>

<meta name="description" content="<?php echo $tdk["DESCRIPTION"]?>" />

<meta name="keywords" content="<?php echo $tdk["KEYWORDS"]?>" />



<link href="/css/index_login.css" rel="stylesheet" type="text/css" />

<link href="/css/footer.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>

<script type="text/javascript" src="/js/glable-effect.js"></script>

<script type="text/javascript" src="/js/urlcheck.js"></script>

<script type="text/javascript" src="/js/list.js"></script>

<?php if($pos =="经纪人"){?>

      <link href="/css/jjr.css" rel="stylesheet" type="text/css" />

      <script type="text/javascript" src="/js/js_za.js"></script>

      <script type="text/javascript" src="/js/search.js"></script>

      <style type="text/css">

        .apDiv1 {

        	position: absolute;

        	left: 57px;

        	top: 0px;

        	width: 11px;

        	height: 7px;

        	z-index: 2;

        	margin-top:-7px;

        }

</style>      

<?php }elseif($pos=="招聘"||$pos=="关于我们"||$pos=="客户需求"){?>

    <link href="/css/gywm.css" rel="stylesheet" type="text/css" />

<?php }elseif($pos=="服务"){?>

	<link href="/css/fwxm.css" rel="stylesheet" type="text/css" />

	<?php if($posd=="列表"){?>

	<script type="text/javascript" src="/js/news.js"></script>

    <?php } elseif($posd=="计算器"){?>

    	<script type="text/javascript" src="/js/lilv.js" charset="UTF-8"></script>

        <script type="text/javascript" src="/js/fwjsq.js"></script>

    <?php } ?>

<?php } ?>

</head>



<body>

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

  </div>

</div>

<?php include_once '2wei.php';?>

<?php include_once 'QQ.php';?>