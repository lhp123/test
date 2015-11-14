var uid = GetRequest()["id"];
	$.post("action.php", {action:"getusrdetail",uid:uid}, function(data){
		//alert(data);
			var datas = jQuery.parseJSON(data);
			if(datas.success==1){
				switch(eval(datas.auth)){
					case 1:
						document.getElementById("pt").selected="selected";
						break;
					case 2:
						document.getElementById("fb").selected="selected";
						break;
					case 3:
						document.getElementById("xt").selected="selected";
						break;
					case 4:
						document.getElementById("qr").selected="selected";
						break;
					case 5:
						document.getElementById("sh").selected="selected";
						break;
					case 7:
						document.getElementById("wb").selected="selected";
						break;
					case 9:
						document.getElementById("gl").selected="selected";
						break;
				}
				$("#state1").selectmenu("refresh");
				$("#username").val(datas.username);
				$("#name").val(datas.name);
				$("#mphone").val(datas.mphone);
				$("#invitecode").val(datas.invitecode);
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
		
		


	$(function(){
	
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
			$.post("action.php",{action:"modifyadminusr",username:$.trim($("#username").val()),name:$.trim($("#name").val()),mphone:$.trim($("#mphone").val()),auth:$.trim($("#state1").val()),age:age,industry:industry,addr:addr},function(data){
				var datas = jQuery.parseJSON(data);
				if(datas.success==1){
					if(eval($.trim($("#state1").val()))==7){
						$.post("action.php",{action:"addinvitecode",username:$.trim($("#username").val()),invitecode:""},function(data){
							location.href = "userlist.php";
						});
					}else{
						$.post("action.php",{action:"addinvitecode",username:$.trim($("#username").val()),invitecode:createinvitedCode()},function(data){
							location.href = "userlist.php";
						});	
					}
				}else{
					location.href = "userlist.php";
				}
		});
	});

	});