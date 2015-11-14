	var type=GetRequest()["type"];
	var id=GetRequest()["id"];
		$.post("action.php",{action:"getmysharelink",type:type,id:id},function(data){
			//alert(data);
			var datas = jQuery.parseJSON(data);
			//alert(datas.data.length);
			if(datas.success==1){
			var arr = datas.data;
			for(var i=0;i<arr.length;i++){
				var state = "未确认";
				switch (eval(arr[i].state))
				{
				case 1:
					state = "未确认";
					break;
				case 2:
					state = "已确认";
					break;
				case 3:
					state = "已成交";
					break;
				case 4:
					state = "已提佣";
					break;
				}
				var phone = (arr[i].cphone).substr(0,3)+"****"+(arr[i].cphone).substr(7,4);
				var li = "<tr><td>"+phone+"</td><td>"+arr[i].usrname+"</td><td>"+arr[i].name+"</td><td>"+arr[i].title+"</td><td >"+arr[i].date+"</td><td>"+state+"</td></tr>";
				$("#sharelink").append(li);
				
			}
			$("#count").html(("共"+arr.length)+"名客户");
			$("#table-column-toggle" ).table( "refresh" );
			}
		});