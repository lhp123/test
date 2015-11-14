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

if($pos=="二手房"){

	$tdk=$kwAction->getTDK("二手房");

}

else if($pos=="租房"){

	$tdk=$kwAction->getTDK("租房");

}

else if($pos=="小区"){

	$tdk=$kwAction->getTDK("小区");

}

else if($pos=="新闻"){

	$tdk=$kwAction->getTDK("新闻");

}

else if($pos=="楼盘代理"){

	$tdk=$kwAction->getTDK("楼盘代理");

}

else if($pos=="经纪人店铺"){

	$tdk=$kwAction->getTDK("经纪人店铺");

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



<?php if($posd=="列表"&&($pos=="二手房"||$pos=="租房"||$pos=="小区"||$pos=="楼盘代理")){?>    

    <link rel="stylesheet" href="/css/fylb.css" type="text/css" />

    <link rel="stylesheet" href="/css/nav.css" type="text/css" />    

    <script type="text/javascript" src="/js/search.js"></script>

    <script type="text/javascript" src="/js/list.js"></script>

    

<?php }elseif($posd=="详细"&&($pos=="二手房"||$pos=="租房"||$pos=="小区")){?>

    <link href="/css/lrtk.css" rel=stylesheet type=text/css>

    <link href="/css/xc.css" rel="stylesheet" type="text/css" /> 

    <script type="text/javascript" src="/js/search.js"></script>

    <script type="text/javascript" src="/js/xc.js"></script>

    <script type=text/javascript src="/js/lrtk.js"></script>    

<?php 		if($pos=="二手房"||$pos=="租房"){?>

		    <link href="/css/fyxxy.css" rel="stylesheet" type="text/css" /> 

		    <script type="text/javascript" src="/js/js_fy.js"></script>

		    <script type="text/javascript" src="/js/fyxx.js"></script>

<?php 		}else if($pos=="小区"){ ?>

		    <link href="/css/xqxxy.css" rel="stylesheet" type="text/css" />

		     <script type="text/javascript" src="/js/list.js"></script>

		    <script type="text/javascript" src="/js/roll.js"></script>

		    <SCRIPT type=text/javascript src="/js/xq.js"></SCRIPT>  

		  

<?php 		}?>

<?php }elseif($pos=="新闻"){?>

	<link href="/css/news.css" rel="stylesheet" type="text/css" />

	<link href="/css/xwlb.css" rel="stylesheet" type="text/css" />    

	<link href="/css/zsucai.css" rel="stylesheet" type="text/css" />	

	<style type="text/css">

		    #apDiv1 {

			    position: absolute;

			    left: 430px;

			    top: 222px;

			    width: 170px;

			    height: 29px;

			    z-index: 1;

		    }

	</style>  

	<script type="text/javascript" src="/js/search.js"></script>

	 <script type="text/javascript" src="/js/list.js"></script>

	<script type="text/javascript" src="/js/news.js"></script>  			

<?php }elseif($pos=="经纪人店铺"){?>

<link rel="stylesheet" href="/css/jjrxx_dp.css" type="text/css" />

<link rel="stylesheet" href="/css/jjrxx_fy.css" type="text/css" />

<script type="text/javascript" src="/js/search.js"></script>

 <script type="text/javascript" src="/js/list.js"></script>

<script type="text/javascript" src="/js/js1.js"></script>

<?php }elseif($pos=="对比"){?></link>

<link href="/css/fydb.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/js1.js"></script>

<?php }elseif($pos=="楼盘代理"&&$posd=="首页"){?>

<link href="/css/lpdl.css" rel="stylesheet" type="text/css" />

<script src="/js/lpdl.js" type="text/javascript"></script>



<?php }elseif($pos=="楼盘代理"&&$posd=="详细"){?>

<link href="/css/lpxxy.css" rel="stylesheet" type="text/css" />

<link href="/css/nav.css" rel="stylesheet" type="text/css" />

<link href="/css/xc.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/xc.js"></script>

<script type="text/javascript" src="/js/lrtk.js"></script>

<script type="text/javascript" src="/js/lpdl.js" ></script>

<?php }?>

</head>



<body>

<!-- 房源 头部 -->

<div id="header">

<?php include_once 'index_login.php';?>

  <div id="header_main">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="70%" align="left">

                <a href="/index.php">首页</a>&nbsp;|&nbsp; 

                <a href="/mmfy_list.php">二手房</a>&nbsp; |&nbsp; 
               


<a href="/lpdl/lpdl.php">一手楼</a>&nbsp; |&nbsp; 
                <a href="/zlfy_list.php">租房</a>&nbsp; |&nbsp; 

                <a href="/xq/xq_list.php">小区</a>&nbsp;|&nbsp; 

                <a href="/jjr_list.php">经纪人</a>&nbsp; |&nbsp; 

                <a href="/map.php">地图</a>&nbsp; |&nbsp;

                <a href="/about/zp.php">招聘</a>&nbsp; |&nbsp; 

                <a href="/about/gywm.php">关于我们</a>

        </td>

        <td width="30%" align="right" >

	  <div id="top_nav"> <span id="loginStatusMsg"></span> <a id="loginStatus" class="a_float" href="#" rel="div_Content">登录&nbsp;|&nbsp;注册</a>&nbsp;&nbsp;客服热线：<?php echo $COMTEL;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>

        

        </td>

     

      </tr>

    </table>

  </div>

</div>

<?php if($pos!="经纪人店铺"){?>

<div id="search">

  <div id="search_main">

    <div id="search_logo"><?php $photo=$photoAction->showPhotoImage("LOGO_ONLY"); echo $photo["photohtml"];?></div>

    <div id="search_nav">

<?php if($pos=="二手房"||$yewu == "出售"){?>

      <ul>

        <li> <a href="mmfy_list.php">全部二手房</a> </li>

        <li> <a href="mmfy_list.php?types=个人">个人二手房</a> </li>        

		<li> <a href="map.php" target="_blank">地图</a> </li>

      </ul>

<?php }elseif($pos=="租房"||$yewu == "出租"){?>

       <ul>

        <li> <a href="zlfy_list.php">全部租房</a> </li>

        <li> <a href="zlfy_list.php?types=个人">个人租房</a> </li>

        <li> <a href="map.php" target="_blank">地图</a> </li>

      </ul>



<?php }elseif ($pos=="小区"||$pos=="小区详细页"){?> 

      <ul>

        <!-- <li> <a href="#">全部小区</a> </li> -->

      </ul>

<?php }elseif ($pos=="楼盘代理"){?>

	  <ul>

        <!-- <li> <a href="#">全部楼盘</a> </li> -->

      </ul>

<?php }?>

    </div>

    <div id="search_search">

      <table border="0" cellpadding="0" cellspacing="0">

        <tr>

<?php if(($posd=="详细"||$posd=="列表")&&($pos=="二手房"||$pos=="租房"||$pos=="小区")){?>

          <td><input id="headmohu" name="mohu" type="text"  style=" width:300px; height:30px; border:#d5d6d6 1px solid; line-height:30px; font-size:14px; color:#666; font-family:'微软雅黑'; padding-left:3px;" value="<?php echo $_REQUEST["mohu"]=""?"请输入城区，商圈或小区名......":$_REQUEST["mohu"];?>" /></td>            

		<?

              if($posd=="详细"&&($pos=="二手房"||$pos=="租房")){

                  if($yewu=="出租"){  $value = "找租房";}

                  if($yewu=="出售"){  $value = "找二手房";}

              }elseif($pos=="小区"&&$posd=="详细"){					

                  $value = "找小区";

              }else{

                  $value = "找".$pos;

              }

          ?>

          <td><input id="headsearch" name="headsearch" value="<?php echo  $value?>" type="button" style="height:34px; width:120px; background:#f7ab00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#f7ab00 1px solid; border-left:none;" /></td>		  

<?php }elseif ($pos=="新闻"){?>

            <td>

            <input id="headmohu" name="mohu" type="text"  style=" width:366px; height:32px; border:#d5d6d6 1px solid; line-height:32px; font-size:14px; color:#666; font-family:'微软雅黑'; padding-left:3px;"/>

            </td>

            <td>

            <input id="headsearch_fy" name="headsearch_fy" value="找二手房" type="button" style="height:34px; width:120px; background:#f7ab00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#f7ab00 1px solid; border-left:none;" />

            </td>

             <td>

            <input id="headsearch_news" name="headsearch_news" value="资讯" type="button" style="height:34px; width:80px; background:#ff7f00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#c76300 1px solid; border-left:none;" />

            </td>

<?php }elseif($pos=="楼盘代理"){?>

          <td><input name="" type="text"  style=" width:300px; height:30px; border:#d5d6d6 1px solid; line-height:30px; font-size:14px; color:#666; font-family:'微软雅黑'; padding-left:3px;" onfocus="this.value=''" value="请输入房源特征，地点或小区名..." /></td>

          <td><input name="" value="找楼盘" type="button" style="height:34px; width:120px; background:#f7ab00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#f7ab00 1px solid; border-left:none;" /></td>

<?php }?>

        </tr>

      </table>

    </div>

  </div>

</div>

<?php }?>

<?php include_once '2wei.php';?>

<?php include_once 'QQ.php';?>