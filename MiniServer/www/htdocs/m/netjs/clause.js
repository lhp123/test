$.post("action.php",{action:"getclause"},function(data){
  var datas = jQuery.parseJSON(data);
  if(datas.success==1){
	$("#content").html(datas.content);
 }
 
 
 });