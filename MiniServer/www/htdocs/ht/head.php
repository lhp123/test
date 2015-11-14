<?php
include_once  'include/tools.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台-<?php echo $title?></title>
<a target="_self"></a>
<link href="<?php echo $adminpath_;?>css/lbcss.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $adminpath_;?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- <script src="<?php echo $adminpath_;?>js/jquery.form.js" type="text/javascript"></script>  	 -->
<script language="javascript" type="text/javascript" src="<?php echo $adminpath_;?>My97DatePicker/WdatePicker.js"></script>
<?php if ($POS=="list"){?>

<script src="<?php echo $adminpath_;?>js/list.js" type="text/javascript"></script>
    
<?php }elseif($POS=="detail"){?>
    <link rel="stylesheet" href="<?php echo $adminpath_;?>kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="<?php echo $adminpath_;?>kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="<?php echo $adminpath_;?>kindeditor/lang/zh_CN.js"></script>
    <script src="<?php echo $adminpath;?>js/detail.js" type="text/javascript"></script>
<?php }else if ($POS=="pri"){?>
	<script src="<?php echo $adminpath_;?>js/pri.js" type="text/javascript"></script>
<?php }?>

<script type="text/javascript">
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

		    /* function menu*/
		    /* 定义全局变量 height  别的地方用到啦! 不要加var*/
		    height = $("#main_right").height()>(windowHeight-136)?$("#main_right").height():(windowHeight-136);
			$("#main_left").css({
				   'height':height+'px'
				});
		     var current_menu = "<?php echo $title?>";
			 $('div.sidenav:eq(0)> div.subnav').hide();//折叠所有菜单
			 $('div.sidenav:eq(0) ul.submenu a').each(function (){
				    
				   var title = $(this).text().replace(/(^\s*)|(\s*$)/g, ""); 
				   //alert(title);
				   if(title == current_menu){
					    $(this).css({'color': '#0180B5'}).parents("div.subnav").slideToggle('100').prev().toggleClass("selected");
					   }
			});
			  $('div.sidenav:eq(0)> div.navhead').click(function() {
				  $(this).siblings("div.navhead").each(function (){
					  $(this).next().slideUp('fast');
						$(this).removeClass("selected");
					  });
				$(this).next().slideToggle('normal');
				$(this).toggleClass("selected");
				
			  });
});
		    
</script>

</head>

<body>
<div id="header">
  <div id="header_1"></div>
  <div id="header_2">
  	<div id="header_2_main">
   	  <div id="logo"><img src="<?php echo $adminpath_;?>images/logo.jpg" width="280" height="64" /></div>
      <div id="nav">
      	<table border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td><img src="<?php echo $adminpath_;?>images/nav_1.jpg" width="10" height="43" /></td>
                <td style="background-color:#f4f4f4;"><a href="/index.php" target="_blank">网站首页</a> |   <a href="/mmfy_list.php" target="_blank">二手房</a> |   <a href="/zlfy_list.php" target="_blank">租房</a> |   <a href="/jjr_list.php" target="_blank">经纪人</a></td>
                <td><img src="<?php echo $adminpath_;?>images/nav_2.jpg" width="10" height="43" /></td>
            </tr>
        </table>
      </div>
      <div id="top_nav">
      	<a href="javascript:window.history.forward();">前进</a> |  <a href="javascript:window.history.back();">后退</a>
      </div>
    </div>
  </div>
<div id="header_3"></div>
</div>
<div class="box1" ></div>
