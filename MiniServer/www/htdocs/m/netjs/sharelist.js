var type=GetRequest()["type"];
$.post("action.php",{action:"getsharelist",type:type},function(data){
		var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				var arr = datas.data;
				var html = "";
				for(var i=0; i<arr.length; i++){
					var title=arr[i].pt;
					if(title.length>20){
						title = title.substr(0,19)+"...";
					}
					var qty=arr[i].qty;
					
					html +="<li><a class='share' href='#' name='allsharelink.php?id="+arr[i].uid+"&type="+type+"'>"+title+"<span class='ui-li-count'>"+qty+"</span></a></li>";
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