$(function(){
$.post("action.php",{action:"getlocaluser"},function(data){
		var datas = jQuery.parseJSON(data);
		if(datas.success==1){
			var uid = datas.uid;
			$.post("action.php",{action:"getusrdetail",uid:uid},function(data){
				var datas = jQuery.parseJSON(data);
				if(datas.success==1){
					$("#username").val(datas.username);
					$("#name").val(datas.name);
					$("#mphone").val(datas.mphone);
					$("#invitecode").val(datas.invitecode);
					/*if(datas.invitecode==""||datas.invitecode==undefined){
						$("#invitelink").attr("disabled","true");
					}*/
					if(eval(datas.age)>0){
						$("#select-native-1").get(0).selectedIndex=eval(datas.age)-1;
						$("#select-native-2").get(0).selectedIndex=eval(datas.industry)-1;
						$("#select-native-3").get(0).selectedIndex=eval(datas.addr)-1;
						$("#select-native-1").selectmenu("refresh");
						$("#select-native-2").selectmenu("refresh");
						$("#select-native-3").selectmenu("refresh");
					}

				}
			
			});
		}else{
			location.href="login.php";
		}
	});
	/*$("#invitelink").click(function(){
			location.href=
	});*/
	$("#register").click(function(){
		if($.trim($("#name").val()) == "" || $.trim($("#name").val()) == undefined){
			alert("姓名不能为空");
			return;
		}
		if($.trim($("#mphone").val()) == "" || $.trim($("#mphone").val()) == undefined){
			alert("手机号不能为空");
			return;
		}
		var age = $.trim($("#select-native-1 option:selected").val());
		var industry = $.trim($("#select-native-2 option:selected").val());
		var addr = $.trim($("#select-native-3 option:selected").val());
		$.post("action.php",{action:"modifyusr",username:$.trim($("#username").val()),name:$.trim($("#name").val()),mphone:$.trim($("#mphone").val()),age:age,industry:industry,addr:addr},function(data){
			location.reload();
		});
	});
	$("#logout").click(function(){
		$.post("action.php",{action:"logout"},function(data){
			var datas = jQuery.parseJSON(data);
			if(datas.success==1){
				alert("退出成功");
				location.href="login.php";
			}else{
				alert("退出失败");
			}
		});
	});
	});