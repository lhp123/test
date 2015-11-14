$(function (){

var change = false;
$("#dengji").click(function (){
		if(!change){
			alert("您你提交,不需要重复提交");
			return ;
		}
		if(dengji_check()){
		
			$.getJSON("/action/Control.php?a=lp&action=dengji",$("#myform").serializeArray(),function (result){
				
				if(result.flag=="1"){
					alert(result.message);
					change = false;
				}else{
					alert(result.message);
				}
				
				
			})
		}
});	
$("#myform").find("textarea[name='CONTENT'],input[name]").change(function (){
	change = true;
})
	 function dengji_check(){
		if($("textarea[name='CONTENT']").val()==""){
			alert("请填写留言内容");
			return false;
		}
		if($("input[name='KHNAME']").val()==""){
			alert("请填写客户名称");
			return false;
		}
		if($("input[name='SHOUJI']").val()==""){
			alert("请填写手机号码");
			return false;
		}
		if($("input[name='EMAIL']").val()==""){
			alert("请填写电子邮件");
			return false;
		}
		if($("input[name='YZBM']").val()==""){
			alert("请填写邮政编码");
			return false;
		}
		if($("input[name='TXDZ']").val()==""){
			alert("请填写通讯地址");
			return false;
		}
		return true;
	 }

})