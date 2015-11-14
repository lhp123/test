$(function(){
	var pid=GetRequest()["id"];
	var type=GetRequest()["type"];
	$.ajax({
		 url:"action.php",
		 type:"post",
		 data:{action:"getpreviewdetail",id:pid,type:type},
		 error: function(){  
				// alert('Error loading XML document');  
			 },
		success: function(data,status){//如果调用php成功    
				 //alert(data);//解码，显示汉字
				 //alert("test");
				var data2=jQuery.parseJSON(data);

				if(data2.success==1){
					document.getElementById("title").innerHTML="<span>"+data2.title+"</span>";
					//alert(data2.content);
					$("#test").append(data2.content);

				}else{
					//alert(data2.msg);
					//alert(GetRequest()["pid"].substr(9));
				}
		}
	});
});