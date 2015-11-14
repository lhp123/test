function checkadminlogin(mode){
	$.post("action.php",{action:"checkadminlogin",mode:mode},function(data){
		var datas = jQuery.parseJSON(data);
		if(datas.success==0){
			var ua = navigator.userAgent;
			var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
			isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
			isAndroid = ua.match(/(Android)\s+([\d.]+)/),
			isMobile = isIphone || isAndroid;
			if(isMobile) {
				if(typeof(Storage) !== "undefine"){
					if(localStorage.user != "undefined"){
						var username = localStorage.user;
						$.post("action.php", {action:"autologin",username:username}, function(data){
							var datas = jQuery.parseJSON(data);
							if(datas.success==1){
								location.reload();
							}else{
								location.href="login.php";
							}
						});
				}else{
					location.href="login.php";
				}

			}else{
				location.href="login.php";
			}
		}else{
			location.href="login.php";
		}
		}else if(datas.success==2){
			if(eval(mode)==1){
				location.href="houtai.php";
			}else if(eval(mode)==6){
				location.href="houtaiadmin.php";
			}else{
				location.href="index11.php";
			}
		}
	
	});
}