$.post("adminaction.php",{action:"gettype"},function(data){
		var datas = jQuery.parseJSON(data);
		if(datas.success==1){
			var arr = datas.data;
			for(var i=0;i<arr.length;i++){
				if(arr[i].pid==0){
					var li="<li data-role='list-divider'>"+arr[i].name+"</li><li data-icon='plus' name='"+arr[i].id+"' id='"+arr[i].id+"' class='plus'><a href='#'>添加小分类</a></li>";
					$("#lists").append(li);
					
				}else{
					var li="<li id='"+arr[i].id+"' class='altertype'><a href='#'>"+arr[i].name+"</a></li>";
					$(li).insertAfter("#"+arr[i].pid);
					
				}
				$(".plus").click(function(){
					$("#un").val("");
					var dat = {type:1,pid:$(this).attr("name")};
					$("#submits").attr("dat",dat);
					$("#popupMenu2").popup("open");
				
				});
				$(".altertype").click(function(){
					$("#un").val($(this).children().html());
					$("#popupMenu").popup("open");
				
				});
				
			}
			$("#lists").listview("refresh");
			$("#lists").addClass("ui-corner-top");
			$("#lists").addClass("ui-corner-bottom");
		}
	});
	$("#alter").click(function(){
		$("#popupMenu2").popup("open");
	});
	$("#addtype1").click(function(){
		$("#un").val("");
		var dat = {type:0};
		$("#submits").attr("dat",dat);
		$("#popupMenu2").popup("open");
	});
