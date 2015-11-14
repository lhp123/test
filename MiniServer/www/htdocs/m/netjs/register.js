$("#scroll").click(function(){	
	window.scrollTo(0,document.body.scrollHeight);
});
var type = GetRequest()["type"];
var pid = GetRequest()["pid"];
var invite = GetRequest()["in"];
$("#go").click(function(){
	if(type){
		var pids = pid;
		var types = type;
	}else{
		var pids = 15;
		var types = 1;
	}
	if(invite)
	location.href="joingroup.php?pid="+pids+"&type="+types+"&in="+invite;
	else
	location.href="joingroup.php?pid="+pids+"&type="+types;
});
$("#checkbox-0").click(function(){
	if($(this).attr("checked")!="checked"){
		$("#register").attr("disabled","true");
	}else{
		$("#register").removeAttr("disabled");
	}
});
$("#register").click(function(){
var phone = $.trim($("#mphone").val());
if(phone==""||phone==undefined){
	alert("请输入手机号");
	return;
}
if(!checkPhone(phone)){
	alert("请输入正确的手机号");
	return;
}
$.post("tempaction.php",{action:"addphone",phone:phone},function(data){
		if(type){
				var pids = pid;
				var types = type;
			}else{
				var pids = 15;
				var types = 1;
			}
	var datas = jQuery.parseJSON(data);
	if(datas.success==2){
		var puid = datas.puid;
		if(puid!=null&&puid!=""&&puid!=undefined){
			location.href="sharedetail.php?p="+base64encode(utf16to8(phone))+"&pid="+pids+"&type="+types+"&uid="+datas.puid;
		}else{
			location.href="sharedetail.php?p="+base64encode(utf16to8(phone))+"&pid="+pids+"&type="+types;
		}
		}else{
			location.href="sharedetail.php?p="+base64encode(utf16to8(phone))+"&pid="+pids+"&type="+types;
			}
		});
});
$.post("action.php",{action:"getclause"},function(data){
			var datas = jQuery.parseJSON(data);
		
		if(datas.success==1){
			var imgs = jQuery.parseJSON(datas.img);
			
			if(imgs != undefined &&imgs.length>0){
				$("#content").attr("src",imgs[0].img);
				$("img").lazyload({ 
					placeholder : "netimages/grey.gif", 
					effect      : "fadeIn",
					threshold : 200
				}); 
			}
		}
});