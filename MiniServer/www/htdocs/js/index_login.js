function init_login(){
	/*注册*/
	$("#registForm input[type!=button]").each(function(){
		if($(this).attr("type")!="password")
		$(this).val($(this).attr("title"));
	}).focus(function(){
		$("#registMsg").text($(this).attr("title"));
		login_focus_check("registForm",$(this));
	}).blur(function(){
		$("#registMsg").text("");
		login_blur_check("registForm",$(this));
	});

	$("#change_registcode").click(function(){
		$("#registcode").get(0).src="/include/CodeChar.php?sn=registcode&rand="+Math.random();
	});


	//登录
	$("#loginForm input[type!=button]").each(function(){
		$(this).val($(this).attr("title"));
	}).focus(function(){
		$("#loginMsg").text($(this).attr("title"));
		login_focus_check("loginForm",$(this));		
	}).blur(function(){
		$("#loginMsg").text("");
		login_blur_check("loginForm",$(this));
	});

	$("#change_logincode").click(function(){
		$("#logincode").get(0).src="/include/CodeChar.php?sn=logincode&rand="+Math.random();
	});


	//控制输入框不可复制粘贴
	$("#registlogin form input").keydown(function(event){
		if(event.ctrlKey) return false;
	});
	
	$("#loginClose").click(function(){
		$("#div_Content").hide();
	});

}

function login_focus_check(formid,obj){
	if(obj.val()==obj.attr("title")){
		obj.val("");
	}
	var pobj=$("#"+formid+" input[name="+obj.attr("name")+"][p="+(obj.attr("p")==0?1:0)+"]")[0];
	if(obj.attr("p")==1) {
		obj.get(0).style.display="none";
		pobj.style.display="inline-block";
		pobj.focus();
	}
}

function login_blur_check(formid,obj){
	if(obj.attr("type")!="password"){
		if(obj.val()==""){
			obj.val(obj.attr("title"));
		}
	}
	//alert("#registForm input[name="+obj.attr("name")+"][p="+(obj.attr("p")==0?1:0)+"]");
	var pobj=$("#"+formid+" input[name="+obj.attr("name")+"][p="+(obj.attr("p")==0?1:0)+"]")[0];
	if(obj.attr("p")==0&&obj.val()=="") {
		obj.get(0).style.display="none";
		pobj.style.display="inline-block";
	}

}


function login(obj){
	var butUseStr="立即登录";
	var butDisuseStr="登录中...";

	butDisuse(obj,butDisuseStr);

	var formobj=$("#loginForm");
	var loginname=formobj.find("input[name='loginname']");
	var password=formobj.find("input[name='password'][p=0]");
	var logincode=formobj.find("input[name='logincode']");
	if(loginname.val()==""){
		loginname.focus();
		$('#loginMsg').html("用户名不能为空");		
		butUse(obj,butUseStr);
		return;
	}
	if(password.val()==""){
		password.focus();
		$('#loginMsg').html("密码不能为空");
		butUse(obj,butUseStr);
		return;
	}
	if(logincode.val()==""){
		logincode.focus();
		$('#loginMsg').html("验证码不能为空");	
		butUse(obj,butUseStr);
		return;
	}

	$.post('/action/Control.php', 
	{ 
		a:"loginht",
		action:"loginin",
		loginname:loginname.val(), 
		password:password.val(),
		logincode:logincode.val()
	}, 		
	function (data){
		var myjson=""; 
		eval("myjson=" + data + ";");
		$("#change_logincode").click();
		if(myjson.errormsg!=""){
			$("#change_logincode").click();
			$('#loginMsg').html(myjson.errormsg);			
		}else{
			loginInShowInfo(myjson.session_username);
			$("#div_Content").get(0).style.display="none";
		}
		butUse(obj,butUseStr);
		inputReuse();
	}
	); 

}

function loginOut(){
	$.post('/action/Control.php', 
	{ 
		a:"loginht",
		action:"loginout"
	}, 		
	function (data){
		var myjson=""; 
//		alert(data);
		eval("myjson=" + data + ";");		
		if(myjson.success){
			loginOutShowInfo();
		}
	}
	);	
}

function regist(obj){
	var butUseStr="立即注册";
	var butDisuseStr="请稍等...";

	butDisuse(obj,butDisuseStr);

	var formobj=$("#registForm");
	var loginname=formobj.find("input[name='loginname']");
	var password=formobj.find("input[name='password'][p=0]");
	var password_confirm=formobj.find("input[name='password_confirm'][p=0]");
	var age=formobj.find("input[name='age']");
	var registcode=formobj.find("input[name='registcode']");
	
	if(loginname.val()==""){
		loginname.focus();
		$('#registMsg').html("用户名不能为空");		
		butUse(obj,butUseStr);
		return;
	}
	if(password.val()==""){
		password.focus();
		$('#registMsg').html("密码不能为空");
		butUse(obj,butUseStr);
		return;
	}
	if(password_confirm.val()==""){
		password_confirm.focus();
		$('#registMsg').html("确认密码不能为空");
		butUse(obj,butUseStr);
		return;
	}
	if(age.val()==""){
		age.focus();
		$('#registMsg').html("年龄不能为空");
		butUse(obj,butUseStr);
		return;
	}
	if(registcode.val()==""){
		registcode.focus();
		$('#registMsg').html("验证码不能为空");		
		butUse(obj,butUseStr);
		return;
	}

	if(password.val()!=password_confirm.val()){		
		password.val("");
		password_confirm.val("");
		password.focus();
		$("#registMsg").html("密码不一致！请重新输入密码！");
		return;
	}
	
	$.post('/action/Control.php', 
	{ 
		a:"loginht",
		ac:"save",
		action:"regist",
		loginname:loginname.val(),
		password:password.val(),
		age:age.val(),
		registcode:registcode.val()
	}, 		
	function (data){
		var myjson=""; 
		eval("myjson=" + data + ";");
		$("#change_registcode").click();
		if(myjson.success==0){
			$("#registMsg").text(myjson.errormsg);			
		}else{
			$("#loginMsg").text(myjson.errormsg);
			$("#loginForm input[name='loginname']").val(loginname.val());
			$("#TabbedPanels_index ul li:eq(1)").click();
		}
		butUse(obj,butUseStr);
		inputReuse();
	}
	);	
}

function loginInShowInfo(username){
	$("#loginStatusMsg").get(0).style.display="inline-block";
	$("#loginStatusMsg").html("您好，"+username+"！&nbsp;&nbsp;[<a href='javascript:loginOut()'>退出</a>]&nbsp;&nbsp;|&nbsp;&nbsp;<a href='/ht/fy_list.php' target='_blank'>我的房源</a>&nbsp;&nbsp;|");
	$("#loginStatus").get(0).style.display="none";
	$("#change_registcode").click();
	$("#change_logincode").click();
}

function loginOutShowInfo(){
	$("#loginStatus").html("登录&nbsp;|&nbsp;注册");
	$("#loginStatus").get(0).style.display="inline-block";
	$("#div_Content").get(0).style.display="inline-block";
	$("#loginStatusMsg").get(0).style.display="none";
	$("#change_registcode").click();
	$("#change_logincode").click();
}

function inputReuse(){
	$("body form input[type!=button][type!=password]").each(function(){
		$(this).val($(this).attr("title"));
	});
	$("body form input[type!=button][type=password]").each(function(){
		$(this).val("");
	});
	$("body form input[type!=button][p]").each(function(){
		if($(this).attr("p")==0) this.style.display="none";
		if($(this).attr("p")==1) this.style.display="inline-block";
	});
}

function butUse(obj,butval){
	obj.disabled=false;
	obj.className="but_use";
	obj.value=butval;
}

function butDisuse(obj,butval){
	obj.disabled=true;
	obj.className="but_disuse";
	obj.value=butval;
}