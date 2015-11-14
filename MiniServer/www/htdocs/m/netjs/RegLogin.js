
/*检测用户名*/
function checkUser(data){
	data.action = "checkusr";
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			var val = eval("("+data+")");
			if(val.success == 0){
				$("#usersp").css("display","block").html("用户名已被注册");
				$("#usrchk").val("0");
				$("#username").focus();
				//document.getElementById("username").focus();
			}else{
				$("#usersp").css("display","none");
				$("#usrchk").val("1");
			}
		}
	});
}

/*注册*/
function sub(data){
	//alert(data.username+'\n'+data.password+'\n'+data.name+'\n'+data.mphone+'\n'+data.action);
	data.action = "register";
	$.ajax({
		type:"post",
		url: "action.php",
		data: data,
		success: function(data){
			//$(document.body).html(data); 
			var val = eval("("+data+")");
			if(val.success == 1){
				localStorage.user=val.username;
				alert("恭喜你注册成功");
				location.href="regdetail.php";
			}else{
				alert(val.success);
			}
		}
	});
}

/*登录*/
function sub1(data){
	data.action = "login";
	$.ajax({
		type:"post",
		url: "action.php",
		data:data,
		success:function(data){
			var val = eval("("+data+")");
			if(val.success == 1){
				localStorage.user=val.username;
				location.href="index11.php";
			}else{
				alert(val.msg);
			}
		}
	});
}

/*登出*/
function logout(){
	$.ajax({
		action:"logout",
		type:"post",
		url: "action.php",
		success:function(data){
			localStorage.clear();
			location.href="login.php";
		}
	});
}


/*产品发布*/
function fabu_nh(data){
	data.action = "addnh";
	data.att = "附加的";
	data.state = 1;
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			location.href = "cpguanli.php";
		}
	});
}

/*产品发布*/
function fabu_mor(data){
	data.action = "addmor";
	data.att = "附加的";
	data.state = 1;
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			//$(document.body).html(data);
			//alert(data);
			location.href = "cpguanli2.php";
		}
	});
}

/*产品发布*/
function fabu_shh(data){
	data.action = "addshh";
	data.att = "附加的";
	data.state = 1;
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			//$(document.body).html(data);
			//alert(data);
			//location.href = "cpguanli3.php";
			location.href = "cpguanli3.php";
		}
	});
}

/*产品修改*/
function alter_nh(data){
	data.action = "modifynh";
	data.att = "附加的";
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			//alert(data);
			location.href = "cpguanli.php";
		}
	});
}

function alter_mor(data){
	data.action = "modifymor";
	data.att = "附加的";
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			//alert(data);
			location.href = "cpguanli2.php";
		}
	});
}

function alter_shh(data){
	data.action = "modifyshh";
	data.att = "附加的";
	//alert(data.title+'\n'+data.content+'\n'+data.qty+'\n'+data.commission+'\n'+data.img+'\n'+data.action+'\n'+data.att+'\n'+data.state);
	$.ajax({
		type:"post",
		url:"action.php",
		data:data,
		success:function(data){
			//alert(data);
			location.href = "cpguanli3.php";
		}
	});
}





