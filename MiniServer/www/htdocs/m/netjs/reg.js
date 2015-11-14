	$(document).ready(function(){
		function $name(_this,class_name){
			return $(_this).parent().find(class_name);
		}
		$("input").each(function(){
			$(this).click(function(){
				$name(this,"span").css("display","none");
			})
		})
	});

	$("#username").blur(function(){
		if($.trim($(this).val()) != "" && $.trim($(this).val()) != undefined){
			var data = {username:$.trim($(this).val())};
			checkUser(data);
		}
	});
	$("#checkbox-mini-0").click(function(){
		if($(this).attr("checked")!="checked"){
			$("#register").attr("disabled","true");
		}else{
			$("#register").removeAttr("disabled");
		}
	});
	$(function(){
	
	$("#register").click(function(){
		if($.trim($("#username").val()) == "" || $.trim($("#username").val()) == undefined){
			alert("用户名不能为空");
			return;
		}
		if($.trim($("#username").val()).length<6){
			alert("请输入六位以上的英文账号");
			return;
		}
		if(checkChinese($.trim($("#username").val()))){
			alert("用户名不能为中文");
			return;
		}
		if($.trim($("#password").val()) == "" || $.trim($("#password").val()) == undefined){
			alert("密码不能为空");
			return;
		}
		
		var p = checkStrong($.trim($("#password").val()));
		if(p<2){
			alert("请填写六位以上带字母和数字的密码");
			return;
		}
		if($.trim($("#name").val()) == "" || $.trim($("#name").val()) == undefined){
			alert("姓名不能为空");
			return;
		}
		if($.trim($("#mphone").val()) == "" || $.trim($("#mphone").val()) == undefined){
			alert("手机号不能为空");
			return;
		}
		if(!checkPhone($.trim($("#mphone").val()))){
			alert("请输入正确的手机号");
			return;
		}
		if($.trim($("#usrchk").val()) == "0"){
			alert("用户名已被注册");
			return;
		}		
		$.post("action.php",{action:"checkusr",username:$.trim($("#username").val())},function(data){
			var datas = jQuery.parseJSON(data);
			if(datas.success==1){
			var data2 = {username:$.trim($("#username").val()),password:$.trim($("#password").val()),name:$.trim($("#name").val()),mphone:$.trim($("#mphone").val())};
			sub(data2);
			}else{
				alert("用户名已被注册");
				return;
			}
		});

	});
	
	});