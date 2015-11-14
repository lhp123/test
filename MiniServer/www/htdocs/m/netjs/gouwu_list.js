
		var product_id;
		var product_num;
		if(typeof(Storage) !== "undefine"){
			if(localStorage.num !== "undefine"){
				product_num = localStorage.num;
				product_id = localStorage.product_id;
			}
			localStorage.id = $(this).attr("name");
		}
		function inArray(arr,value1,value2){
			for(var i=0;i<arr.length;i++){
				if(arr[i].id==value1&&arr[i].type==value2){
					return i;
				}
			}
			return false;
		}
		Array.prototype.del=function(n) {  //n表示第几项，从0开始算起。
			//prototype为对象原型，注意这里为对象增加自定义方法的方法。
			if(n<0)  //如果n<0，则不进行任何操作。
			 return this;
			else
			return this.slice(0,n).concat(this.slice(n+1,this.length));
			/*
			  concat方法：返回一个新数组，这个新数组是由两个或更多数组组合而成的。
			  　　　　　　这里就是返回this.slice(0,n)/this.slice(n+1,this.length)
			 　　　　　　组成的新数组，这中间，刚好少了第n项。
			  slice方法： 返回一个数组的一段，两个参数，分别指定开始和结束的位置。
			*/
		}
		
		if(product_id){
			
		var data = jQuery.parseJSON(product_id);
			for(var i=0; i<data.length; i++){
				//alert(data[i].id);
					$.post("action.php", {action:"getdetail",id:data[i].id,type:data[i].type}, function(data){
						//alert(data);
						var datas = jQuery.parseJSON(data);
						var li="";
						if(datas.success == 1){
							
							var imgs = jQuery.parseJSON(datas.img);
							if(imgs.length>0){
								var img=imgs[0].img;
							}else{
								var	img = "netimages/louf.png";
							}
							var title=datas.title;
								if(title.length>5){
								title = title.substr(0,6)+"...";
							}
							var comm = datas.commission;
							var comm2 = comm;
							if(comm.length>10){
								comm = comm.substr(0,9)+"...";
							}
							li+="<a href='#'><div class='nav_list1'><img src='"+img+"'/><span class='list_info'><span class='list_title'><strong>"+title+"</strong></span><span class='list_title' id='t2' name='"+comm2+"'>佣金："+comm+"</span></span><label class='del' name='"+datas.pid+"' alt='"+datas.type+"'>删&nbsp;&nbsp;除</label></div></a>";
							//alert(datas.type);
							$("#nav").append(li);
							$(".list_title").click(function(){
								alert($(this).attr("name"));
							});
							$(".del").click(function(){
								var cp_id = jQuery.parseJSON(localStorage.product_id);
								var index = inArray(cp_id,$(this).attr("name"),$(this).attr("alt"));
								var cp_id = cp_id.del(index);
								localStorage.product_id = JSON.stringify(cp_id);
								$(this).parent().parent().remove();
								localStorage.num--;
							});

						}

					});	
					
			}
		}