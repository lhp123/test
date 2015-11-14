$.post("action.php", {action:"checklogin"}, function(data){
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
		}
	});