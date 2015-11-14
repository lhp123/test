var type = GetRequest()["type"];
if(eval(type)==1){
	var action = "getnhlist";
}else if(eval(type)==2){
	var action = "getmorlist";
}else{
	var action = "getshhlist";
}
$.post("action.php", {action:action}, function(data){
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
					html +="<li><a data-ajax='false' href='register.php?pid="+arr[i].id+"&type="+arr[i].type+"'><img src='"+img+"' /><h2>"+title+"</h2><p>佣金："+arr[i].commission+"</p></a></li>";
				}
				
			$("#sharelinklist").append(html);
				$("#sharelinklist").listview("refresh");
				$("#sharelinklist").addClass("ui-corner-top");
				$("#sharelinklist").addClass("ui-corner-bottom");
				$(".share").click(function(){
					var url = $(this).attr("name");
					location.href=url;
				
				});
			}
		});