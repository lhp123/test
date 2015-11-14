<?php 
include_once PATH_WEBROOT.'action/CompanyAction.php';
$companyAction=new CompanyAction($conn, $CID);
?>
<?
$erwm=$companyAction->get2WEI();
if(!isEmpty($erwm)){
?>
<script language="javascript">
	var name = "#floatMenu";
	var menuYloc = null;	
		$(document).ready(function(){
			menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
			$(window).scroll(function () { 
				offset = menuYloc+$(document).scrollTop()+"px";
				$(name).animate({top:offset},{duration:500,queue:false});
			});
		}); 
	 </script>
<style type="text/css">
#floatMenu {
	position:absolute;
	top:20px;
	left:10px;
	width:110px;
	height:405px;
	text-align:center;
	background-image: url(/images/2wei_bg.png);
	background-repeat: no-repeat;
	background-position: left top;
	color:#004aad;
	font-weight:bold;
}
</style>
<div id="floatMenu">

<div id="guanbi" onClick="javascript:document.getElementById('floatMenu').style.display='none';" style="height:35px;"></div>

<?
	if($erwm["WXERWM"]!=""){
		echo "<img src='".getPhoto($erwm["WXERWM"])."' width='100' height='100' border='0'/><br />";
		echo $COMPANYJXNAME."微信<br />";
	}
	if($erwm["MBLERWM"]!=""){
		echo "<img src='".getPhoto($erwm["MBLERWM"])."' width='100' height='100' border='0'/><br />";
		echo $COMPANYJXNAME."手机版<br />";
	}
	if($erwm["PADERWM"]!=""){
		echo "<img src='".getPhoto($erwm["PADERWM"])."' width='100' height='100' border='0'/><br />";
		echo $COMPANYJXNAME."PAD版<br />";
	}	
?>
</div>

<?}?>
