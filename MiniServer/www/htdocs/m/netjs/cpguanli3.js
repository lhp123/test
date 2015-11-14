var auth = $("#auth").val();
		$.post("action.php", {action:"getadminshhlist"}, function(data){//alert(data);
			var datas = jQuery.parseJSON(data);
			var html = "";
			if(datas.success == 1){
				var arr = datas.data;
				
				for(var i=0; i<arr.length; i++){
					var imgs = jQuery.parseJSON(arr[i].img);
					if(imgs.length>0){
						var img=imgs[0].img;
					}else{
						var	img = "netimages/louf.png";
						}
						html +="<li><div class='list_box'><a href='#'><div class='box_1'><img src='"+img+"' /><div class='list_p'><p class='list_p1'>"+arr[i].title+"</p><p class='list_p2'>内部佣金："+arr[i].commission+"</p><p class='list_p3'>外部佣金："+arr[i].comm2+"</p></div><label class='alter' name='"+arr[i].id+"'>修&nbsp;&nbsp;改</label>";
						if(auth==9){
							html += "<label class='del' name='"+arr[i].id+"'>删&nbsp;&nbsp;除</label>";
						}
						html+="</div></a></div></li>";
				}

			}else{
					html += "<a href='fabu.php'>暂时没有数据</a>";
				}
				document.getElementById("list_ul").innerHTML=html;
					$(".alter").click(function(){
				//alert("test");
				var list_id = $(this).attr("name");
				location.href = "altershh.php?id="+list_id;
			});
			$(".del").click(function(){
				if(auth == 9){
					var list_id = $(this).attr("name");
					$.post("action.php",{action:"delshh",pid:list_id},function(data){
						var datas = eval("("+data+")");
						if(datas.success == 1){
							alert(datas.msg);
						}
					});
					$(this).parents("li").remove();
				}
			});
		
		});