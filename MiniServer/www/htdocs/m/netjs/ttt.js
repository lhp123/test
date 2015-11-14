
$(function(){function tes(){
  $.post("action.php",{action:"addinvitedetail",inveitecode:createinvitedCode()},function(data){
	//alert(data);
	var datas = jQuery.parseJSON(data);
	if(datas.success==0){
		tes();
	}
	else{
		//alert(datas.success);
	}
});
}
 $("#test").click(function(){
	$("#tt").val(createinvitedCode());
	tes();
});

});