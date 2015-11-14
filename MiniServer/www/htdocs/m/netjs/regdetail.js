
$(function(){
$("#summit").click(function(){
		var age = $.trim($("#select-native-1 option:selected").val());
		var industry = $.trim($("#select-native-2 option:selected").val());
		var addr = $.trim($("#select-native-3 option:selected").val());
		$.post("action.php",{action:"addfulldetail",age:age,industry:industry,addr:addr},function(data){
			var datas = jQuery.parseJSON(data);
			if(datas.success==1){
				location.href = "QR.php";
			}else{
				alert(datas.msg);
			}
		
		});
	
	});
	});