<?$TEL400="400123456"; ?>
<?//include_once '../../eall/DBCON_YD.php'; ?>
<?include_once '../../include/db/DBCON_YD_QJ.php'; ?>
<!DOCTYPE html>
<!-- saved from url=(0026)http://m.soufun.com/tools/ -->
<html>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<link rel="shortcut icon" href="img/Icon-4.png" />
<title>房贷计算器</title> 
<link href="../netcss/css.css" rel="stylesheet" type="text/css">
<link href="../netcss/tail.css" rel="stylesheet" type="text/css" />
<link href="../css/Glb.css" rel="stylesheet" type="text/css" />
<link href="../css/Glb_img.css" rel="stylesheet" type="text/css" />
<link href="../css/List.css" rel="stylesheet" type="text/css" />

<link href="../css/List_img.css" rel="stylesheet" type="text/css" />

<link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
        /***
        *功能：隐藏和显示div
        *参数divDisplay：html标签id
        ***/
        function click_a(divDisplay)
        {
            if(document.getElementById(divDisplay).style.display != "block")
            {
                document.getElementById(divDisplay).style.display = "block";
            }
            else
            {
                document.getElementById(divDisplay).style.display = "none";
            }
        }
</script>
<link rel="stylesheet" type="text/css" href="../chrometheme/chromestyle.css" />





<!--<script type="text/javascript" async="" src="netjs/uvforwapandm.min.js">
SFUVForWapAndM.init({isNorth:_isNorth,bid:_bid,frameType:_sfuv_frameType,location:_sfuv_location,referrer:_sfuv_referrer})
</script> 
<script type="text/javascript" async="" src="netjs/loadforwapandm.min.js"></script> -->


<script src="../netjs/jquery-1.7.1.min.js"></script>
<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
 
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L">
    <div>

<!--head begin-->
<div class="list_header_container">
      <div id="list_header">
       <div class="H">
        <a class="back" id="topbar" href="javascript:void(0);" onclick="history.back()" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>
        <span id="list_title" class="title" onClick="click_a('divOne_1')">
<div class="chromestyle" id="chromemenu">
<ul>

<li><a href="#" rel="dropmenu1">
<?
$tit=filterParaAllByName("tit");
if($tit=="sy"){echo "商业贷款计算器";}
else if($tit=="gjj"){echo "公积金贷款计算器";}
else if($tit=="zh"){echo "组合贷款计算器";}
else{echo "商业贷款计算器";}
$price=(filterParaAllByName("price")==""?100:filterParaAllByName("price"));
?>
<img src="../chrometheme/xln.png" width="13" height="9" /></a></li>

</ul>
</div>

<!--1st drop down menu -->                                                   
<div id="divOne_1"  style="display:none;   position: fixed;  bottom:0px; z-index:1000; width:50%; height:104px; overflow:visible; text-align:center; _position:absolute; _top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); margin:0 auto; clear:both; cursor:pointer;" class="dropmenudiv">

<a href="fdjsq_sy.php?tit=sy&price=<?=$price?>">商业贷款计算器</a>
<a href="fdjsq_gjj.php?tit=gjj&price=<?=$price?>">公积金贷款计算器</a>
<a href="fdjsq_zh.php?tit=zh&price=<?=$price?>">组合贷款计算器</a>

</div>
        </span>
       </div>
      </div>
     </div>

<!--head end-->
<!-- 
<div class="jsqnav">
	<a id="waptool_B02_02" href="jsq.php"><div class="td01">房贷计算器<div class="jiant"></div></div></a>
    
  <a id="waptool_B02_03" href="sf.php"><div class="td02">税费计算器</div></a>
    </a>
</div>
 -->
 
 <script type="text/javascript">
 	
	//点击其他部分关闭选择框
	document.onclick = function(e){
		if (e.target.getAttribute("id") != "showselection"){
			if($("#selection").css("display") == "block"){
				$("#selection").hide();
			}
		}
	}
	
		function navOpra(){
			if ($("#nav").css('display') == 'none') {
				$('#nav').show();
				$("#newMsgNumWrap").css("display","none");
			}
			else {
				$('#nav').hide();
				if(parseInt($("#newMsgNum").html())<100 && parseInt($("#newMsgNum").html())>0){
					$("#newMsgNumWrap").css("display","block");
				}
			}
		}
		
		//获取页面的高度、宽度
		function getPageSize() {
		    var xScroll, yScroll;
		    if (window.innerHeight && window.scrollMaxY) {
		        xScroll = window.innerWidth + window.scrollMaxX;
		        yScroll = window.innerHeight + window.scrollMaxY;
		    } else {
		        if (document.body.scrollHeight > document.body.offsetHeight) { // all but Explorer Mac    
		            xScroll = document.body.scrollWidth;
		            yScroll = document.body.scrollHeight;
		        } else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari    
		            xScroll = document.body.offsetWidth;
		            yScroll = document.body.offsetHeight;
		        }
		    }
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
		    // for small pages with total height less then height of the viewport    
		    if (yScroll < windowHeight) {
		        pageHeight = windowHeight;
		    } else {
		        pageHeight = yScroll;
		    }    
		    // for small pages with total width less then width of the viewport    
		    if (xScroll < windowWidth) {
		        pageWidth = xScroll;
		    } else {
		        pageWidth = windowWidth;
		    }
		    var dif = pageHeight - 2*windowHeight;
		    $('#BackTop').hide();
		    if(dif > 0)
		    {
		    	$('#BackTop').show();
		    }
		    else
		    {
		    	$('#BackTop').hide();
		    }
		}
		
		$(document).ready(function(){
			$("#waptool_B01_10").bind("click",function(){
				$(".sms-num").css({
				    "margin-left":"25px",
				    "margin-top":"-30px",
				    "margin-right":"0",
				    "top":"auto",
				    "right":"auto",
					"border-radius":"6px"
				});
			});
			
		});
		
		
		
	
</script>

<script type="text/javascript">

cssdropdown.startchrome("chromemenu")

</script>