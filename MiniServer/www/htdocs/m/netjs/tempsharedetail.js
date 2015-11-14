function GetRequests(){ 
	var url = location.search; //获取url中"?"符后的字串 
	var theRequest = new Object(); 
	if (url.indexOf("?") != -1) { 
		var str = url.substr(1); 
		strs = str.split("&"); 
		for(var i = 0; i < strs.length; i ++) { 
			theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]); 
		} 
	} 
	return theRequest; 
}
$(function(){
	var pid=GetRequests()["pid"];
	var type=GetRequests()["type"];
	var uid=GetRequests()["uid"];
	//alert(GetRequests()["p"]);
	var phone=utf8to16(base64decode(GetRequests()["p"]));
	
	$("#act").val(pid);
	$("#act2").val(type);
	$("#act3").val(phone);
	$.ajax({
		 url:"action.php",
		 type:"post",
		 data:{action:"getsharedetail",id:pid,type:type},
		 error: function(){  
				// alert('Error loading XML document');  
			 },
		success: function(data,status){//如果调用php成功    
				 //alert(data);//解码，显示汉字
				 //alert("test");
				var data2=jQuery.parseJSON(data);

				if(data2.success==1){
					document.title=data2.title;
					var imgs = jQuery.parseJSON(data2.img);
					$("#urlshort").attr("src",imgs[0].img);
					document.getElementById("title").innerHTML="<span>"+data2.title+"</span>";
					//alert(data2.content);
					$("#test").append(data2.content);
					document.getElementById("btnw").innerHTML=data2.btnwords;
					document.getElementById("btnw").data=data2.tel;
					//alert(data2.btnwords);
					$("img").lazyload({ 
					placeholder : "netimages/grey.gif", 
					effect      : "fadeIn",
					threshold : 200
					});
					var arr = document.getElementById("test").getElementsByTagName("img");
					for(var i=0;i<arr.length;i++){
						arr[i].setAttribute("pid",(i+""));
					}
					$(".msKeimgBox img").click(function(){
						//alert($(this).attr("pid"));
						var its = [];
						var arrs = document.getElementById("test").getElementsByTagName("img");
						for(var i=0;i<arrs.length;i++){
							var w = 850;
							var h = 500;
							if($(arrs[i]).attr("width")){
								w = parseInt($(arrs[i]).attr("width"),10);
							}
							if($(arrs[i]).attr("height")){
								h = parseInt($(arrs[i]).attr("height"),10)
							}
							var ops={src:$(arrs[i]).attr("src"),w:w,h:h};
							//arrs[i].attr("src");
							its.push(ops);
						}
						var index = parseInt($(this).attr("pid"),10);
						openPhotoSwipe(index,its);
						//alert("test");
					});

				}else{
					//alert(data2.msg);
					//alert(GetRequest()["pid"].substr(9));
				}
		}
	});
	if(uid){
		var uids = uid;
	}else{
		var uids = 205;
	}
	$.post("action.php", {action:"getcountip",uid:uids,pid:pid,type:type}, function(data){
		var data2=jQuery.parseJSON(data);
		$("#countbro").append(("<p>阅读 "+data2.qty+"</p>"));
	});
});