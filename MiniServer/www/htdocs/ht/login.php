<?

include_once 'include/tools.php';

$loginin = new LoginAction($conn,$CID);
$loginin->loginIn();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $COMPANYNAME?>网站后台管理</title>
<link href="<?php echo $adminpath_;?>css/logcss.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $adminpath_;?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
</head>

<body>
<div style="width:100%;height:100%;">
<img src="<?php echo $adminpath_;?>images/login_bg.jpg" width="100%" height="100%" /></div>
<div style="position: absolute; width:100%; height:100%; z-index: 1; top: 0px; left:auto;">

<div id="login">
	<form id="form1" name="form1" method="post" action="">
	
    	<input  type="hidden" name="action" value="login"/>
    	<input  type="hidden" name="cd_url" value="<?php echo $cd_url?>"/>
	
	  <table width="90%" border="0" cellpadding="0" cellspacing="0">
    	    <tr>
    	      <td height="48"><input style="color:#666;"   class="id" name="LOGINNAME" type="text"  id="LOGINNAME"/></td>
    	    </tr>
    	    <tr>
    	      <td height="48"><input class="password" name="PASSWORD" type="password" id="PASSWORD"/></td>
    	    </tr>
    	    <tr>
    	      <td height="40">验证码:
    	      <input type="text" class="text_w" id="code_char1" name="code_char1"  style="height: 22px; width: 80px;"  />
    	      <img src="include/code_char.php" id="getcode_char1" title="看不清，点击换一张" align="absmiddle"  style="height:22px">&nbsp;&nbsp;</td>
    	    </tr>
    	    <tr>
    	      <td>
    	          <input value="" id = "tijiao" type="button" style="background-color: Transparent; background-image:url(<?php echo $adminpath_;?>images/submit2.jpg); width:107px; height:31px; border:0px; " onmouseover="this.style.backgroundImage='url(<?php echo $adminpath_;?>images/submit.jpg)'" onmouseout="this.style.backgroundImage='url(<?php echo $adminpath_;?>images/submit2.jpg)'" />
    	          <input value="" type="button" style="background-color: Transparent; background-image:url(<?php echo $adminpath_;?>images/res2.jpg); margin-left:63px; width:107px; height:31px; border:0px; " onmouseover="this.style.backgroundImage='url(<?php echo $adminpath_;?>images/res.jpg)'" onmouseout="this.style.backgroundImage='url(<?php echo $adminpath_;?>images/res2.jpg)'"/>
    	      </td>
    	    </tr>
	  </table>
	</form>
</div>
<div id="footer"> Copyright 2006-2013 <?php echo $COMPANYNAME?>版权所有  技术支持：易遨科技 </div>
</div>
</body>
<script>
$(document).ready(function(){
	var flag = true;
	var name = $("#LOGINNAME");
	var pass = $("#PASSWORD");
	var code = $("#code_char1");
	
	
	$("#form1").bind("submit",function (){
		if(name.val()==""||name.val()=="用户名"){
			    name.siblings(".error").remove();
		        name.after("<br><font style='font-size: 10;color: red;' class='error'>用户名不能为空!</font>");
    			flag = false;
			}else if(pass.val()==""){
				pass.siblings(".error").remove();
				pass.after("<br><font style='font-size: 10;color: red;' class='error'>密码不能为空!</font>");
    			flag = false;
			}else if(code.val()==""){
				code.siblings(".error").remove();
				code.parent().append("<br><font style='font-size: 10;color: red;' class='error'>验证码错误!</font>");
	    		flag = false;
			}else if($(".error").length!="0"){
				flag = false;
			}else { flag = true;}
		return flag;
		}).find("input[type='text'],input[type='password']").keydown(function (event){
				if ( event.which == 13 ) {
				    event.preventDefault();
				    $("#form1").submit();
				  }else{
					   name.siblings(".error").remove();	
					  $(this).siblings(".error").remove();
					  $(this).siblings("br").remove();
				 }
		});
	name.focus();
	$("#tijiao").click(function (){
			$("#form1").submit(); 
		});
	$("#getcode_char1").click(function (){
	    $(this).attr("src","include/code_char.php?t="+Math.random());
		});
	var msg = "<?php echo filterPara($_REQUEST["msg"])?>";
	if(msg !=""){
		name.before("<font style='font-size: 10;color: red;' class='error'>"+msg+"!</font><br />");
		}
});



</script>
</html>


