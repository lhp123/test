$.post("action.php",{action:"getalllist"},function(data){
		var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				var arr = datas.data;
				var html = "";
				for(var i=0; i<arr.length; i++){
					var imgs = jQuery.parseJSON(arr[i].img);
					if(imgs.length>0){
						var img=imgs[0].img;
					}else{
						var	img = "netimages/louf.png";
					}
					var title=arr[i].title;
					if(title.length>10){
						title = title.substr(0,9)+"...";
					}
					var type="";
					if(arr[i].type==1){
						type="一手楼";
					}else if(arr[i].type==2){
						type="周全";
					}else if(arr[i].type==3){
						type="二手楼";
					}
					var state="";
					if(arr[i].state==1){
						state="审核中";
					}else if(arr[i].state==2){
						state="发布";
					}else if(arr[i].state==3){
						state="锁定";
					}else if(arr[i].state==4){
						state="注销";
					}
					html +="<li><a data-ajax='false' href='selectBI.php?id="+arr[i].id+"&type="+arr[i].type+"'><img src='"+img+"' /><h2>"+title+"</h2><p>类型："+type+"</p><p>状态："+state+"</p></a></li>";
				}
				document.getElementById("lists").innerHTML=html;
				$("#lists").listview("refresh");
			}
		});