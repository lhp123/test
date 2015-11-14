<!DOCTYPE html>
<html>
<style type="text/css">
.wzdl {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:16px;
	font-weight:bold;
	font-style:normal;
	height:41px;
	line-height:41px;
	width:140px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ffffff;
}
.wzdl:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.wzdl:active {
	position:relative;
	top:1px;
}</style>
    <head>
        <meta charset="utf-8">
	 	<meta name="format-detection" content="telephone=no">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	 	<link rel="shortcut icon" href="img/Icon-4.png" />
		<link rel="apple-touch-icon" href="img/Icon-114.png"/>
	 	<script src="netjs/urlcheck.js" type="text/javascript"></script>
	 	<!--  微信开始  -->
	 	<script type="text/javascript">
	 	function Hidden(weixin)
	 	{
	 	document.getElementById(weixin).style.display="none";
	 	}
	 	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	 	    // 通过下面这个API显示右上角按钮
	 	    //WeixinJSBridge.call('showOptionMenu');
	 	    //alert("WeixinJSBridgeReady");
	 		var today=new Date();
	 		var sevenday = 7*24*60*60;
	 		var show = localStorage.getItem("showWeixin");
	 		if(show ==null||show-today.getTime()>=sevenday){
	 			document.getElementById("weixin").style.display = "";
	 			localStorage.setItem("showWeixin",today.getTime());
		 	}
	 	});
	 	</script>
         <!--  微信结束  -->
        <?   
        if($MENU=="wt"||$MENU=="gy"||$MENU=="ly"||$MENU=="ditu"){
        	$sqlt="select * from XT_KEYWORDS where type='首页' and cid='".$CID."'";
        	$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
        	if($MENU=="gy"){
        		$TITLE=get_gbk("关于我们_").$TITLE;
        	}
        	if($MENU=="ly"){
        		$TITLE=get_gbk("给我们留言_").$TITLE;
        	}
        	if($MENU=="wt"){
        		$TITLE=get_gbk("委托信息_").$TITLE;
        	}
        	if($MENU=="ditu"){
        		$TITLE=get_gbk("地图找房_").$TITLE;
        	}
        }
        if($MENU=="fy"&&$YEWU=="mm"){
			if ($title!=""){
				$sqlt="select NAME,CONTENT from XT_KEYWORDS where type='二手房' and POSITION='详细' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
				while ( $rst = mysql_fetch_array ( $stmtt ) ){
					if($rst['NAME']=="TITLE"){
						$TITLE=$title."_".$rst["CONTENT"];
					}
					else if($rst['NAME']=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if($rst['NAME']=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
			}else{
				$sqlt="select NAME,CONTENT from XT_KEYWORDS where type='二手房' and POSITION='列表' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
			}
        }
        if($MENU=="fy"&&$YEWU=="zl"){
			if ($title!=""){
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='租房' and POSITION='详细' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
				while ( $rst = mysql_fetch_array ( $stmtt ) ){
					if($rst['NAME']=="TITLE"){
						$TITLE=$title."_".$rst["CONTENT"];
					}
					else if($rst['NAME']=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if($rst['NAME']=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
			}else{
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='租房' and POSITION='列表' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
			}
        }
        if($MENU=="xq"){
			if ($title!=""){
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='小区' and POSITION='详细' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
				while ( $rst = mysql_fetch_array ( $stmtt ) ){
					if($rst['NAME']=="TITLE"){
						$TITLE=$title."_".$rst["CONTENT"];
					}
					else if($rst['NAME']=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if($rst['NAME']=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
			}else{
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='小区' and POSITION='列表' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
			}
        }
        if($MENU=="xf"){
			if ($title!=""){
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='楼盘代理' and POSITION='详细' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
				while ( $rst = mysql_fetch_array ( $stmtt ) ){
					if($rst['NAME']=="TITLE"){
						$TITLE=$title."_".$rst["CONTENT"];
					}
					else if($rst['NAME']=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if($rst['NAME']=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
			}else{
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='楼盘代理' and POSITION='列表' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
			}
        }
        if($MENU=="jjr"){
			if ($title!=""){
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='明星经纪人' and POSITION='详细' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
				while ( $rst = mysql_fetch_array ( $stmtt ) ){
					if($rst['NAME']=="TITLE"){
						$TITLE=$title."_".$rst["CONTENT"];
					}
					else if($rst['NAME']=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if($rst['NAME']=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
			}else{
				$sqlt="select `NAME`,CONTENT from XT_KEYWORDS where type='明星经纪人' and POSITION='列表' and cid='".$CID."'";
				$stmtt=mysql_query(get_gbk($sqlt),$conn);
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
			}
        }
        ?>  
	 	
        <?if($MPOS=="index"){?>
        
        <script type="text/javascript">var PAGESTART = +new Date();</script>
        <!--<link rel="stylesheet" href="css/Home.css" type="text/css" />-->
        
        <?}else if($MPOS=="list" || $MPOS=="list_detail"){?>

	 	<link rel="stylesheet" href="css/List.css" type="text/css" />	
	 	 	
	 	<?}else if($MPOS=="detail" || $MPOS=="list_detail"){ ?>	 	
	
		<script type="text/javascript">var PAGESTART = +new Date();</script>
		<link rel="apple-touch-icon" href="img/eall-logo.png" />
		<link rel="stylesheet" href="css/View.css" type="text/css" />	
			
	 	<?}
	 	if($MPOS=="list_detail"){ ?>	 	
	 	<link rel="stylesheet" href="netcss/jjr.css" type="text/css" />
	 	<?}?>
	 	
        <meta name="description" content="<?=get_utf8($Description)?>"/>
        <meta name="Keywords" content="<?=get_utf8($Keyword)?>"/>        
        <title><?=get_utf8($TITLE)?></title>  
	 	
	 	<link rel="stylesheet" href="css/Glb.css" type="text/css" />
  		<link rel="stylesheet" href="css/Glb_img.css" type="text/css" />
  		<link rel="stylesheet" href="css/List_img.css" type="text/css" />
  		<link rel="stylesheet" href="netcss/tail.css" type="text/css" />
        

		<style type="text/css">
		#inner {
	position: relative;
	top:30px;
	width: 300px;
	margin: 0 auto;
}
		</style>



    </head>	
        <script type="text/javascript" src="js/json.js"></script>
       <?php include_once 'qj9.php';?>
      
        
    <?if($MPOS=="index"){?>
	<body data-page="Anjuke_Home" ontouchstart="">  
	
    <?}?>
    <?if($MPOS=="list"){?>
    <body data-page="Anjuke_Prop_List" ontouchstart="">
    <?}?>
    <?if($MPOS=="detail"){?>
    <body data-page="Anjuke_Prop_View" ontouchstart="">
    <?}?>
    <!-- bodyc start -->
    <div id="weixin" style="position:fixed; background:rgba(0,0,0,0.7); width:100%; height:100%; top:0px; left:0px; z-index:9999; display:none;">
    	<div style="color:rgb(255,255,255); position:absolute; width:80%; right:0px; top:0px;">
   	    <img src="images/wxllq.png" width="100%"> 
        </div>
        <a onclick="Hidden('weixin')" style="position:absolute; left:50%; top:60%; margin-left:-70px;" href="#" class="wzdl">我知道了</a>
        
    </div>
    
    
    <div id="bodyc">
	<div id="fbinfo" style="display:none;">		
	</div>