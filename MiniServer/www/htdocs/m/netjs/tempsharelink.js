$(function(){
	var auth = $("#auth").val();
var state=0;
 var type=GetRequest()["type"];
 var id=GetRequest()["id"];
		$.post("tempaction.php",{action:"getlink",type:type,id:id},function(data){
			var datas = jQuery.parseJSON(data);
			if(datas.success==1){
			var arr = datas.data;
			for(var i=0;i<arr.length;i++){
				var li = "<tr><td><a data-ajax='false' href='tel:"+arr[i].cphone+"'>"+arr[i].cphone+"</a></td><td><a data-ajax='false' href='tel:"+arr[i].mphone+"'>"+arr[i].mphone+"</a></td><td>"+arr[i].usrname+"</td><td>"+arr[i].name+"</td><td>"+arr[i].title+"</td><td>"+arr[i].createtime+"</td>";
				if(arr[i].state==1){
					li += "<td><button class='confirm' id='"+arr[i].id+"' name='"+arr[i].state+"' >确认</button></td></tr>";
				}else{
					if((auth==4||auth==9)&&arr[i].state==2){
						li += "<td><button class='confirm' id='"+arr[i].id+"' name='"+arr[i].state+"' >成交</button></td></tr>";
					}else if(arr[i].state==2){
						li += "<td>已确认</td></tr>";
					}else if((auth==5||auth==9)&&arr[i].state==3){
						li += "<td><button class='confirm' id='"+arr[i].id+"' name='"+arr[i].state+"' >提佣</button></td></tr>";
					}else if(arr[i].state==4){
						li += "<td>已提佣</td></tr>";
					}
					else{
						li += "<td>已成交</td></tr>";
					}
				}
				$("#sharelink").append(li);
			}
				$(".confirm").click(function(){
			//alert($(this).attr("name"));
			$.post("tempaction.php",{action:"tempcomstat",id:$(this).attr("id"),state:$(this).attr("name")},function(data){
				var datas = jQuery.parseJSON(data);
				if(datas.success==1){
					location.reload();
				}
			});
			});
		$("#count").html(("共"+arr.length)+"名客户");
		$("#table-column-toggle" ).table( "refresh" );
			}
		});
});