<?php 

ob_start();

session_start();

include_once 'include.php';

$type = filterParaByName("type")==""?"mm":filterParaByName("type");

//echo $type;

$pos= $type=="mm"?"二手房":"租房";



$sqlt="select * from XT_KEYWORDS where type='地图找房'";

$stmtt=mysql_query($sqlt,$conn);

while ( $rst = mysql_fetch_array ( $stmtt ) ){

    if($rst['NAME']=="TITLE"){

        $TITLE=$rst["CONTENT"];

    }

    else if($rst['NAME']=="KEYWORDS"){

        $Keyword=$rst["CONTENT"];

    }

    else if($rst['NAME']=="DESCRIPTION"){

        $Description=$rst["CONTENT"];

    }

}

?>

<?php 

include_once PATH_WEBROOT.'action/PhotoAction.php';

$photoAction=new PhotoAction($conn, $CID);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $TITLE ?></title>

<meta name="Keywords" content="<?php echo $Keyword?>"/>

<meta name="Description" content="<?php echo $Description?>" />

<link href="/css/index_login.css" rel="stylesheet" type="text/css" />

<link href="/css/map.css" rel="stylesheet" type="text/css" />

<style type="text/css">

 {

}

#searchform table tr td #map_bg span #showDept {



	color: #FFFFFF;

	font-family: "微软雅黑";

	font-size: 13px;

	line-height: 28px;

	background-image: url(../images/map/showDept1.png);

	text-align: center;

	height: 28px;

	width: 107px;

	border:none;

}

#searchform table tr td #map_bg span #showDept:hover {



	color: #fff;

	font-family: "微软雅黑";

	font-size: 13px;

	line-height: 28px;

	background-image: url(../images/map/showDept2.png);

	text-align: center;

	height: 28px;

	width: 107px;

	border:none;

}

</style>

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<script src='http://api.map.baidu.com/api?v=1.2&services=true' type='text/javascript' charset=utf-8></script>

<script type="text/javascript">

        function setValue(obj,vdownn,vdown,vupn,vup){

        	if(document.getElementById(vdownn)){

        		document.getElementById(vdownn).value=vdown;

        	}

        	if(document.getElementById(vupn)){

        		document.getElementById(vupn).value=vup;

        	}

        	query();

        }

        

        function query(){

        	var searchform = document.getElementById("searchform");

        	searchform.submit();

        }		

		//获取页面的高度、宽度

		    var windowWidth, windowHeight;

		    if (self.innerHeight) { // all except Explorer    

		        if (document.documentElement.clientWidth) {

		            windowWidth = document.documentElement.clientWidth;

		        } else {

		            windowWidth = self.innerWidth;

		        }

		        windowHeight = self.innerHeight;

		    } else {

		        if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode    

		            windowWidth = document.documentElement.clientWidth;

		            windowHeight = document.documentElement.clientHeight;

		        } else {

		            if (document.body) { // other Explorers    

		                windowWidth = document.body.clientWidth;

		                windowHeight = document.body.clientHeight;

		            }

		        }

		    }       

		   

		$(document).ready(function(){

			$("#FYDIV").css({

				   'width':(windowWidth-244)+'px',

				   'height':(windowHeight-162)+'px'

			});



			$('.sidelist').mousemove(function(){

					$(this).find('.i-list').show();

					$(this).find('h3').addClass('hover');

					});

					$('.sidelist').mouseleave(function(){

					$(this).find('.i-list').hide();

					$(this).find('h3').removeClass('hover');

			});

			

		});

</script>

</head>



<body>

	<div id="header">

<?php include_once 'INHEAD/index_login.php';?>

  <div id="header_main">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="50%" align="right">	  

        <div id="top_nav"> <span id="loginStatusMsg"></span> <a id="loginStatus" class="a_float" href="#" rel="div_Content">登录&nbsp;|&nbsp;注册</a>&nbsp;&nbsp;客服热线：<?php echo $COMTEL;?>&nbsp;|&nbsp;<a href="news/news.php">资讯</a> </div>

        </td>

      </tr>

    </table>

  </div>

</div>

<div id="search">

  <div id="search_main">

  	<div id="search_logo"><?php $photo=$photoAction->showPhotoImage("LOGO_ONLY"); echo $photo["photohtml"];?></div>

    <div id="search_search">

    <form action="map.php" method="post">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">

    	<tr>

        	<td>

        	

            <span style=" font-size:16px; color:#666; font-family:'微软雅黑'; margin-right:10px;"><?php echo $pos?></>地图</span>

            <input name="DISNAME" type="text"  value="<?php echo filterParaByName("DISNAME")?>" style=" width:266px; height:32px; border:#d5d6d6 1px solid; line-height:32px; font-size:14px; color:#666; font-family:'微软雅黑'; padding-left:3px;"/>

            <input name="" value="搜索" type="submit" style="height:34px; margin:0px; width:80px; background:#ff7f00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#c76300 1px solid; border-left:none;" />&nbsp;&nbsp;

            <input type="hidden" name="type" value="<?php echo $type?>" />

            <?php if($type=="mm"){?>

            <span class="blu"><a href="/map.php?type=zl">去租房地图>></a></span>

            <?php }elseif($type=="zl"){?>

            <span class="blu"><a href="/map.php?type=mm">去二手房地图>></a></span>

            <?php }?>

            </td>

        </tr>

        <tr>

        	<td height="33" align="right" valign="bottom">

           	<a href="/index.php">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/mmfy_list.php">二手房</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/lpdl/lpdl.php">一手楼</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/zlfy_list.php">租房</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/xq/xq_list.php">小区</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/jjr_list.php">经纪人</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/news/news.php">资讯</a></td>

        </tr>

    </table>

    </form>	

    </div>

  </div>

</div>

<form id="searchform" action="map.php" method="post">

    <input  type="hidden" name='type' value="<?php echo $type?>" />

<table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tr>

    	<td width="240" valign="top">

   	    	<div id="sxtj">

           	  <div id="sxtj_tit"><?php echo $pos?>地图筛选条件</div>

           	  <?php 

           	      if($type=="mm"){

           	  ?>

              <div id="rsftj">

              	<span class="tex1">售价：</span><br />

                

                <ul class="blu">

               		<li><a href="javascript:void(0);"  onclick="setValue(this,'MMPRICEDOWN','','MMPRICEUP','')" style="<?php echo filterParaByName("MMPRICEDOWN")==""&&filterParaByName("MMPRICEUP")==""?"color:#FE9900;font-weight:bold;":""?>">价格不限</a><br /></li>

                	 <?

					$stmt = mysql_query ( "select * from PZ_BOUND where TYPE = '价格区间' AND CID=".$CID." order by taborder",$conn );

					while ( $rs = mysql_fetch_array ( $stmt ) ) {

							

							echo "<li><a href='#' title='' onclick=setValue(this,'MMPRICEDOWN','".$rs ["DOWN"]."','MMPRICEUP','".$rs ["UP"]."') style='".((filterParaNumber($_REQUEST["MMPRICEDOWN"])==$rs ["DOWN"]&&filterParaNumber($_REQUEST["MMPRICEUP"])==$rs ["UP"])?"color:#FE9900;font-weight:bold;":"")."'>".$rs ["MEMO"]."</a></li>";

					}

				 ?>

                </ul>

               <input id="MMPRICEDOWN" name="MMPRICEDOWN" type="text" value='<?php echo filterParaNumber($_REQUEST["MMPRICEDOWN"])?>' size=2/>-<input id="MMPRICEUP" name="MMPRICEUP" type="text"  value='<?php echo filterParaNumber($_REQUEST["MMPRICEUP"])?>' size=2/>万 <input name="button" type="submit"  value="确定" />

              </div>

              <?php }elseif ($type=="zl"){?>

                  <div id="rsftj">

              	<span class="tex1">租价：</span><br />

                

                <ul class="blu">

               		<li><a href="javascript:void(0);"  onclick="setValue(this,'ZPRICEDOWN','','ZPRICEUP','')" style="<?php echo filterParaByName("ZPRICEDOWN")==""&&filterParaByName("ZPRICEUP")==""?"color:#FE9900;font-weight:bold;":""?>">价格不限</a><br /></li>

                	 <?

					$stmt = mysql_query ( "select * from PZ_BOUND where TYPE = '租赁价格区间' AND CID=".$CID." order by taborder",$conn );

					while ( $rs = mysql_fetch_array ( $stmt ) ) {

							

							echo "<li><a href='#' title='' onclick=setValue(this,'ZPRICEDOWN','".$rs ["DOWN"]."','ZPRICEUP','".$rs ["UP"]."') style='".((filterParaNumber($_REQUEST["ZPRICEDOWN"])==$rs ["DOWN"]&&filterParaNumber($_REQUEST["ZPRICEUP"])==$rs ["UP"])?"color:#FE9900;font-weight:bold;":"")."'>".$rs ["MEMO"]."</a></li>";

					}

				 ?>

                </ul>

               <input id="ZPRICEDOWN" name="ZPRICEDOWN" type="text" value='<?php echo filterParaNumber($_REQUEST["ZPRICEDOWN"])?>' size=2/>-<input id="ZPRICEUP" name="ZPRICEUP" type="text"  value='<?php echo filterParaNumber($_REQUEST["ZPRICEUP"])?>' size=2/>万 <input name="button" type="submit"  value="确定" />

              </div>

              <?php }?>

              <div id="rsftj" style="	overflow:hidden;">

              	<span class="tex1">户型：</span><br />

                

                <ul class="blu">

                <li><a href="javascript:void(0);" onclick="setValue(this,'H_SHI','')" style="<?php echo filterParaByName("H_SHI")==""?"color:#FE9900;font-weight:bold;":""?>" >价格不限</a></li>

                	<li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','1')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==1?"color:#FE9900;font-weight:bold;":"")?>' >一室</a></li>

                    <li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','2')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==2?"color:#FE9900;font-weight:bold;":"")?>'>二室</a></li>

                    <li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','3')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==3?"color:#FE9900;font-weight:bold;":"")?>' >三室</a></li>

                    <li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','4')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==4?"color:#FE9900;font-weight:bold;":"")?>'>四室</a></li>

			        <li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','5')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==5?"color:#FE9900;font-weight:bold;":"")?>'>五室</a></li>

                    <li><a href="javascript:void(0);" title="" onclick="setValue(this,'H_SHI','6')" style='<?php echo (filterParaNumber($_REQUEST["H_SHI"])==6?"color:#FE9900;font-weight:bold;":"")?>'>五室以上</a></li>

			        <input type='hidden' id='H_SHI' name = 'H_SHI' value='<?php echo filterParaNumber($_REQUEST["H_SHI"])?>'>

                </ul>

               

              </div>

              <div id="rsftj">

              	<span class="tex1">更多筛选：</span><br />

                <div id="sidebar">

    <div class="sidelist">

	    <span><h3><a href="javascript:void(0);">面积</a></h3></span>

		<div class="i-list">

		    <ul>

			   <li><a href="javascript:void(0);"  onclick="setValue(this,'BUILD_AREADOWN','','BUILD_AREAUP','')" style="<?php echo ((filterParaNumber($_REQUEST["BUILD_AREADOWN"])==""&&filterParaNumber($_REQUEST["BUILD_AREAUP"])=="")?"color:#FE9900;font-weight:bold;":"")?>">面积不限</a></span><br /></li>

                	<?

				$stmt = mysql_query ( "select * from PZ_BOUND where TYPE = '面积区间' AND CID=".$CID. " order by taborder",$conn );

				while ( $rs = mysql_fetch_array ( $stmt ) ) {

					echo "<li><a href='javascript:void(0);' title='' onclick=setValue(this,'BUILD_AREADOWN','".$rs ["DOWN"]."','BUILD_AREAUP','".$rs ["UP"]."') style='".((filterParaNumber($_REQUEST["BUILD_AREADOWN"])==$rs ["DOWN"]&&filterParaNumber($_REQUEST["BUILD_AREAUP"])==$rs ["UP"])?"color:#FE9900;font-weight:bold;":"")."'>".$rs ["MEMO"]."</a></li>";

				}

		?>

		 <input type="hidden" size="2" id="BUILD_AREADOWN" name="BUILD_AREADOWN"  value='<?php echo filterParaNumber($_REQUEST["BUILD_AREADOWN"])?>'/><input type="hidden" id="BUILD_AREAUP" name="BUILD_AREAUP" value='<?php echo filterParaNumber($_REQUEST["BUILD_AREAUP"])?>' size="2" />

			</ul>

		</div>

	</div>

<!--second start-->

	<div class="sidelist">

	    <span>

	    <h3><a href="javascript:void(0);">类型</a></h3></span>

		<div class="i-list">

		    <ul>

		     <li><a href='javascript:void(0);' onclick="setValue(this,'FYFL','')" style="<?php echo filterParaByName("FYFL")==""?"color:#FE9900;font-weight:bold;":"" ?>">类型不限</a></li>

		    <?php 

		        $stmt = mysql_query("select * from PZ_PROFILE where TYPE = '房源分类' AND CID='".$CID. "' order by taborder",$conn );

		        while($rs = mysql_fetch_array($stmt)){

		            echo "<li><a href='javascript:void(0);' onclick=setValue(this,'FYFL','".$rs["NAME"]."') style='".(filterParaByName("FYFL")==$rs["NAME"]?"color:#FE9900;font-weight:bold;":"")."'>".$rs["NAME"]."</a></li>";

		        }

		       

		    ?>

			<input type="hidden" name= 'FYFL' id='FYFL' value="<?php echo filterParaByName("FYFL")?>" />   	

			</ul>

		</div>

	</div>

<!--5 start-->

</div>

              </div>

            </div>

            

        </td>

        <td valign="top">

   	    	

           	  <div id="map_bg"  style="width:auto;">

                 <span style=" float:right; margin-top:3px; margin-right:10px;"><input id="showDept" flag="true" type="button" value="隐藏经纪人门店"></span>

              </div>



           	   <div id="FYDIV" style="float: left; width: 1120px; height: 492px;" >地图正在加载中......</div>

              



        </td>

    </tr>

</table>

 </form>

 	<?

	$mapstr = "";

	$str="";

	$conndition="";

	

	if (filterPara($_REQUEST['DISNAME'] )!= ""){

		$conndition.=" and (a.RE1 LIKE '%".filterPara($_REQUEST['DISNAME'])."%' || a.RE2 LIKE '%".filterPara($_REQUEST['DISNAME'])."%' || a.DISNAME LIKE '%".filterPara($_REQUEST['DISNAME'])."%')";

	}

	

	if (filterParaNumber($_REQUEST['MMPRICEUP']) != "" && filterParaNumber($_REQUEST['MMPRICEDOWN']) != ""){

		

        $conndition.=" and a.PRICE >=".filterParaNumber($_REQUEST['MMPRICEDOWN'])."  and a.PRICE <=".filterParaNumber($_REQUEST['MMPRICEUP']);

	

    }elseif (filterParaNumber($_REQUEST['MMPRICEDOWN']) != ""){

		

        $conndition.=" and a.PRICE >=".filterParaNumber($_REQUEST['MMPRICEDOWN']);

	

    }elseif (filterParaNumber($_REQUEST['MMPRICEUP']) != ""){

	

		$conndition.=" and a.PRICE <=".filterParaNumber($_REQUEST['MMPRICEUP']);

	}

	

	if (filterParaNumber($_REQUEST['ZPRICEUP']) != "" && filterParaNumber($_REQUEST['ZPRICEDOWN']) != ""){

		$conndition.=" and a.PRICE >=".filterParaNumber($_REQUEST['ZPRICEDOWN'])."  and a.PRICE <=".filterParaNumber($_REQUEST['ZPRICEUP']);

	}elseif (filterParaNumber($_REQUEST['ZPRICEDOWN']) != "")

	{

		$conndition.=" and a.PRICE >=".filterParaNumber($_REQUEST['ZPRICEDOWN']);

	}

	elseif (filterParaNumber($_REQUEST['ZPRICEUP']) != "")

	{

		$conndition.=" and a.PRICE <=".filterParaNumber($_REQUEST['ZPRICEUP']);

	}

   

    

	if(filterPara($_REQUEST["type"])=="mm"||filterPara($_REQUEST["type"])==""){

		$conndition .= " AND TYPE='出售'"; 

	}elseif(filterPara($_REQUEST["type"])=="zl"){

	    $conndition .= " AND TYPE='出租'";

	}

	if(filterParaNumber($_REQUEST["H_SHI"])!=""){

		if (filterParaNumber($_REQUEST["H_SHI"])!="6")

		{

			$conndition = $conndition." and a.H_SHI=".filterParaNumber($_REQUEST["H_SHI"]);

		}

		else {

			$conndition = $conndition." and a.H_SHI>=5";

		}

	}

	

	if (filterParaNumber($_REQUEST['BUILD_AREADOWN']) != "")

	{

		$conndition.=" and a.PRICE >=".filterParaNumber($_REQUEST['BUILD_AREADOWN']);

	}

	if (filterParaNumber($_REQUEST['BUILD_AREAUP']) != "")

	{

		$conndition.=" and a.PRICE <=".filterParaNumber($_REQUEST['BUILD_AREAUP']);

	}

	

	if (filterParaByName("FYFL")!=""){

	    $conndition .= " and a.FYFL = '".filterParaByName("FYFL")."'";

	}





	$sql="select b.MAP_Y,b.MAP_X,b.ID,b.SJT,b.NAME,b.JUNJIA,count(1) as NUM,a.TYPE from PZ_DIS b,FY a where b.MAP_Y>0 and (b.id=a.disid || (b.NAME=a.DISNAME AND b.PNAME=a.RE2 AND b.PPNAME=a.RE1)) ".$conndition."  GROUP BY b.ID,b.name,b.MAP_Y,b.MAP_X";

	

// 	echo $sql;

	$stmtmap = mysql_query ($sql, $conn);

	while ( $rs = mysql_fetch_array ( $stmtmap ) ) {

		$JUNJIA = $rs["JUNJIA"] >=10000?round($rs["JUNJIA"]/10000,1)."万":round($rs["JUNJIA"]);

		$IMAGE = explode(";",$rs["SJT"]);

		$IMAGE = $IMAGE[0]==""?ZW_FY_L:$IMAGE[0];

		$str.= "mapdate.push({'ID':'".$rs["ID"]."','MAP_X':'" . $rs["MAP_X"] . "','MAP_Y':'" . $rs ["MAP_Y"] . "','NAME':'" . $rs ["NAME"] ."','NUM':'".$rs["NUM"]."','JUNJIA':'".$JUNJIA."','IMAGE':'".$IMAGE."'});\n\r";

	}





    $sql  = "select ID,MAP_Y,MAP_X,PHOTO,DEPTNAME NAME,DZNAME, TEL,ADDRESS FROM XT_DEPT WHERE CID =10 AND IFDELETED = 0 ";



    $stmt = mysql_query($sql,$conn);

    

    while($rs = mysql_fetch_array($stmt)){

		$IMAGE = explode(";",$rs["PHOTO"]);

		$IMAGE = $IMAGE[0]==""?ZW_FY_L:$IMAGE[0];

			$str .="mapdeptdate.push({'ID':'".$rs["ID"]."','IMAGE':'".$IMAGE."','MAP_Y':'".$rs["MAP_Y"]."','MAP_X':'".$rs["MAP_X"]."','NAME':'".$rs["NAME"]."','DZNAME':'".$rs["DZNAME"]."','TEL':'".$rs["TEL"]."','ADDRESS':'".$rs["ADDRESS"]."'});\n\r";

    }





	?>





</body>

</html>



<SCRIPT>

	cityname = "从化市";

	dept_backgroup_image = "<?php echo MAP_MD_MARK ?>";

	mapdeptdate = [];

	mapdate = [];

	var showDept = document.getElementById("showDept");

	var value;

	flag = false;

	showDept.onclick = function (){

		flag = eval(showDept.getAttribute("flag"));

		value = flag?"显示经纪人门店":"隐藏经纪人门店";

		showDept.setAttribute("value",value);

		showDept.setAttribute("flag",!flag);

		if(flag){

			removedept();

		}else{

			adddept();

		}

		

	}



<?php echo $str;?>

</SCRIPT>

<SCRIPT language=JavaScript type=text/javascript src="js/map.js"></SCRIPT>

