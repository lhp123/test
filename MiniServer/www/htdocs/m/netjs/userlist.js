$.post("action.php",{action:"getusrlist"},function(data){
			//alert(data);
			var datas = jQuery.parseJSON(data);
			var html = "";
			if(datas.success == 1){
				var arr = datas.data;
				for(var i=0; i<arr.length; i++){
				html +="<li><a><h2>"+arr[i].usrname+"</h2><p>"+arr[i].name+"</p><p>"+arr[i].mphone+"</p></a><a href='#' class='action' data-rel='popup' data-transition='slideup' dat='"+arr[i].id+"'></a></li>";
				}
				$("#list_ul").append(html);
				$(".action").click(function(){
					var id = $(this).attr("dat");
					//alert(id);
					var url = "useradmin.php?id="+id;
					$("#alter").attr("href",url);
					$("#alter").attr("data-ajax","false");
					$("#del").attr("dat",id);
					$("#popupMenu").popup("open");
				});
				$("#list_ul").listview("refresh");
				$("#list_ul").addClass("ui-corner-top");
				$("#list_ul").addClass("ui-corner-bottom");
			}
		});
		$("#del").click(function(){
			if($(this).attr("dat")){
				//alert($(this).attr("dat"));
				if(confirm("确定删除此用户？")){
					var id = $(this).attr("dat");
					$.post("action.php",{action:"delusr",uid:id},function(data){
						var datas = eval("("+data+")");
						if(datas.success == 1){
							alert(datas.msg);
							location.reload();
						}
					});
				}
			}
		
		
		});