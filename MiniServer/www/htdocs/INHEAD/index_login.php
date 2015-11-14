<?php 
include_once PATH_WEBROOT.'action/LoginHtAction.php';
$loginHtAction=new LoginHtAction($conn, $CID);
?>

<!-- 登录注册 -->

<div id="div_Content" class="div_style" style="style="display: none; top:28px; margin-top:-2px;">
  	<div id="dltc_tit"><span id="loginClose" style="background-image:url(/images/succ_cha.jpg);">&nbsp;</span>会员享受更多特权</div>
    <div id="dltc_main">
    	<div id="dltc_main_l">
       	  <div id="TabbedPanels_index" class="TabbedPanels">
        	  <ul class="TabbedPanelsTabGroup">
        	    <li class="TabbedPanelsTab TabbedPanelsTabSelected" tabindex="0">注册</li>
        	    <li class="TabbedPanelsTab" tabindex="0">登录</li>        	    
      	      </ul>
        	  <div id="registlogin" class="TabbedPanelsContentGroup">
        	    <div class="TabbedPanelsContent"  style="display: block;">
        	    <div id="registMsg" style="color:red;height:12px;"></div>
        	    <form id="registForm" name="registForm" action="" method="post">
                	<input value="" title="请输入登录名" name="loginname" type="text" class="logininput"/>
                    <input value="" title="请输入密码" name="password" type="text" p=1 class="logininput" />
                    <input value="" title="请输入密码" name="password" type="password" p=0 class="logininput" style="display:none;"/>
                    <input value="" title="请再次输入密码" name="password_confirm" type="text" p=1 class="logininput"/>
                    <input value="" title="请再次输入密码" name="password_confirm" type="password" p=0 class="logininput" style="display:none;"/>
                    <input value="" title="请输入年龄" name="age" type="text" class="logininput" />
                    <input value="" title="验证码" name="registcode" type="text" class="logininput" style="width:50px;" />&nbsp;
                    <img src="/include/CodeChar.php?sn=registcode" id="registcode" align="absmiddle"  style="height:22px">
                    <span class="kbq"><a href="#" id="change_registcode">看不清楚？换一张</a></span>&nbsp;&nbsp;
                    <input name="" type="button" value="立即注册" onclick="regist(this)" class="but_use" />
                </form>
                </div>
                    
   
        	    <div class="TabbedPanelsContent"  style="display: none;">
        	    <div id="loginMsg" style="color:red;height:12px;"></div>
        	    <form id="loginForm" name="loginForm" action="" method="post">
                	<input value="" title="请输入登录名" name="loginname" type="text"  class="logininput"/>
                    <input value="" title="请输入密码" name="password" type="text" p=1 class="logininput" />
                    <input value="" title="请输入密码" name="password" type="password" p=0 class="logininput" style="display:none;"/>
                    <input value="" title="验证码" name="logincode" type="text"  class="logininput" style="width:50px;" />&nbsp;
                    <img src="/include/CodeChar.php?sn=logincode" id="logincode" align="absmiddle"  style="height:22px">
                    <span class="kbq"><a href="#" id="change_logincode">看不清楚？换一张</a></span><br />
                    <input name="" type="button" value="立即登录" onclick="login(this)"  class="but_use" />&nbsp;&nbsp;<span class="wjmm"><a href="#">忘记密码</a></span> </div>
      	    	</form>
      	    	</div>
      	    	
      	    	
      	  </div>
        </div>
        <div id="dltc_main_r">我是经纪人<br />
        <a href="/admin/login.php" target="_blank">从这里登录</a></div>
    </div>
  </div>
<script type="text/javascript" src="/js/index_login.js"></script>
<script type="text/javascript">
//-------显示登录框-------start
//页面加载完成后...
$(function() {
	
	$("#div_Content").mouseover(function() {
		$(this).show();
	});
	//$("#div_Content").mouseleave(function() {
	//    $(this).hide();
	//});
	//初次加载
	Loading();

	init_login();	
	changeTab("TabbedPanels_index","TabbedPanelsTabSelected");
});

function Loading() {	
	$(".a_float").each(function() {
	    var _showDiv = $(this).attr("rel");
	    //开始替换： 调用时传参改变广告块图片链接等
	    //$("#" + _showDiv + " a").attr("href", $(this).attr("href"));
	    $("#" + _showDiv + " img").eq(0).attr("src", $(this).attr("accesskey"));
	    $("#" + _showDiv + " img").eq(0).attr("alt", $(this).attr("title"));
	    $("#" + _showDiv + " p").eq(0).html($(this).attr("title"));
	    // $("#pprice").html($(this).attr("price"));
	    //替换完成
		<?php 
		if($loginHtAction->ifLogin()){
			$loginInfo=$loginHtAction->getLoginInfo();
		?>
			loginInShowInfo("<?php echo $loginInfo["session_username"]?>");		
		<?php }else{?>
		   	loginShowHide(this);
		<?php }?>
	});
}


//鼠标经过
function getTop(e) {
	var offset = e.offsetTop;
	if (e.offsetParent != null) offset += getTop(e.offsetParent);
	return offset;
}
function getLeft(e) {
	var offset = e.offsetLeft;
	if (e.offsetParent != null) offset += getLeft(e.offsetParent);
	return offset;
}

function loginShowHide(obj){
var _showDiv = $(obj).attr("rel"); 
$(obj).mouseover(function() {
    var _l = getLeft(obj);
    var _t = getTop(obj) + $(obj).height();
    $("#" + _showDiv).css("top", _t); $("#" + _showDiv).css("left", _l);
    $("#" + _showDiv).show();
});
$(obj).mouseleave(function() {
	$("#" + _showDiv).hide();
});
}

//-------显示登录框-------end
</script>

  <!-- 登录注册  END-->