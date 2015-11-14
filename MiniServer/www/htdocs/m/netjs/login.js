$(function(){$("#login").click(function(){
			if($.trim($("#username").val()) == "" || $.trim($("#username").val()) == undefined){
				alert("用户名不能为空");
				return;
			}
			if($.trim($("#password").val()) == "" || $.trim($("#password").val()) == undefined){
				alert("密码不能为空");
				return;
			}
			var data = {username:$.trim($("#username").val()),password:$.trim($("#password").val())};
			sub1(data);
		});
 });
