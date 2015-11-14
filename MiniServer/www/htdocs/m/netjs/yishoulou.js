		var product_num = 0;
		//localStorage.clear();
		if(localStorage.product_id){
			var cp_id = jQuery.parseJSON(localStorage.product_id);
		}else{
			var cp_id = new Array();
		}
		$(document).ready(function(){
			if(localStorage.num >= 0){
				if(localStorage.num == 0){
					//alert("test");
					$(".btn_box").find("i").css("display","none");
				}else{
					$(".btn_box").find("i").css("display","block");
					$(".btn_box").find("i").html(localStorage.num);
				}
			}else{
				$(".btn_box").find("i").css("display","none");
				localStorage.num = 0;
			}
			product_num = localStorage.num;
		});
		function $name(_this,class_name){
			return $(_this).parent().find(class_name);
		}
		function inArray(arr,value){
			for(var i=0;i<arr.length;i++){
				if(arr[i].id==value&&arr[i].type=="1"){
					return true;
				}
			}
			return false;
		}
		$.post("action.php", {action:"getnhlist"}, function(data){
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
					var comm = arr[i].commission;
					var comm2 = comm
					if(comm.length>10){
						comm = comm.substr(0,9)+"...";
					}
					html +="<a href='#'><div class='nav_list1'><img src='"+img+"' /><span class='list_info'><span class='list_title'><strong>"+title+"</strong></span><span class='list_title' id='t2' name='"+comm2+"'>佣金："+comm+"</span></span><label class='gouwuche' data1='"+img+"' data2='"+arr[i].title+"' name='"+arr[i].id+"'>确定信息</label></div></a>";
				}
				document.getElementById("nav").innerHTML=html;
				$(".gouwuche").click(function(){
					if(typeof(Storage) != "undefine"){
						if(!inArray(cp_id,$(this).attr("name"))){
							$(".btn_box").find("i").css("display","block");
							product_num++;
							$(".btn_box").find("i").html(product_num);
							var op = {id:$(this).attr("name"),type:1,img:$(this).attr("data1"),title:$(this).attr("data2")};
							cp_id.push(op);
							localStorage.product_id = JSON.stringify(cp_id);
							localStorage.num = product_num;`							
						}						

					}

					$(this).off("click");
			});
			$(".list_title").click(function(){
				alert($(this).attr("name"));
			
			});
			}
		});
