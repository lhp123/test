<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	 	<meta name="format-detection" content="telephone=no">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	 	<link rel="shortcut icon" href="img/Icon-4.png" />
		<link rel="apple-touch-icon" href="img/Icon-114.png"/>
	 	<script src="netjs/urlcheck.js" type="text/javascript"></script>
	 	
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
					if(get_utf8($rst['NAME'])=="TITLE"){
						$TITLE=$rst["CONTENT"];
					}
					else if(get_utf8($rst['NAME'])=="KEYWORDS"){
						$Keyword=$rst["CONTENT"];
					}
					else if(get_utf8($rst['NAME'])=="DESCRIPTION"){
						$Description=$rst["CONTENT"];
					}
				}
				//echo $TITLE."||".$Keyword."||".$Description;
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
        <link rel="stylesheet" href="css/Home.css" type="text/css" />    
                    
        <?}else if($MPOS=="list" || $MPOS=="list_detail"){?>  
	 	<link rel="stylesheet" href="css/List.css" type="text/css" />	
	 	 	
	 	<?}else if($MPOS=="detail" || $MPOS=="list_detail"){ ?>
		<script type="text/javascript">var PAGESTART = +new Date();</script>
		<link rel="apple-touch-icon" href="img/eall-logo.png" />
		<link rel="stylesheet" href="css/View.css" type="text/css" />	
			
	 	<?}else if($MPOS=="list_detail"){ ?>
	 	
	 	<link rel="stylesheet" href="netcss/jjr.css" type="text/css" />
	 	
	 	<?} ?>
	 	
        <meta name="description" content="<?=get_utf8($Description)?>"/>
        <meta name="Keywords" content="<?=get_utf8($Keyword)?>"/>        
        <title><?=get_utf8($TITLE)?></title>   
	 	<link rel="stylesheet" href="css/Glb.css" type="text/css" />
  		<link rel="stylesheet" href="css/Glb_img.css" type="text/css" />
  		<link rel="stylesheet" href="css/List_img.css" type="text/css" />
  		<link rel="stylesheet" href="netcss/tail.css" type="text/css" />

		<style type="text/css">
		body {padding: 0; margin: 0; background: #e7e8ec;} 
		body,html{height: 100%;} 
		#outer {height: 50%; overflow: hidden; position: relative;width: 100%;} 
		#outer[id] {display: table; position: static;} 
		#middle {position: absolute; top: 10%;} /* for explorer only*/ 
		#middle[id] {display: table-cell; vertical-align: middle; position: static;} 
		#inner {position: relative; top: -50%;width: 300px;margin: 0 auto;} /* for explorer only */ 
		</style>
		<link href="netcss/index_down.css" rel="stylesheet" type="text/css">
		


    </head>	
        <script type="text/javascript" src="js/json.js"></script>
        <?php include_once 'qj9.php';?>
<!--        <script type="text/javascript" src="js/re19.js"></script>-->
<!--        <script type="text/javascript" src="js/qj9.js"></script>-->
	
        <?if($MPOS=="list"){?>
<!--        <script type="text/javascript" src="js/re29.js"></script>-->
        <?}?>
        
    <?if($MPOS=="index"){?>
	<body data-page="Anjuke_Home" ontouchstart="">        
    <?}?>
    <?if($MPOS=="list"){?>
    <body data-page="Anjuke_Prop_List" ontouchstart="">
    <?}?>
    <?if($MPOS=="detail"){?>
    <body data-page="Anjuke_Prop_View" ontouchstart="">
    <?}?>
    
    <?include_once 'index_down.php';?>
    
    <!-- bodyc start -->
    <div id="bodyc">
	<div id="fbinfo" style="display:none;">
		<div id="outer"> 
		  <div id="middle"> 
			  <div id="inner"><span class="fp"><img src="netimages/fp.jpg" width="300" height="171" /></span></div> 
		  </div> 
		</div>
	</div>