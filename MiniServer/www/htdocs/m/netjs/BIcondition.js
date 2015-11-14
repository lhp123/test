
document.getElementById("begindate").valueAsDate=new Date();
	document.getElementById("enddate").valueAsDate=new Date();
	document.getElementById("beginmon").valueAsDate=new Date();
    var pid=GetRequest()["id"];
	var type=GetRequest()["type"];
	var select=GetRequest()["select"];
	switch (eval(select))
	{
	case 7:
		$("#enddate").css('display','none');
		$("#beginmon").css('display','none');
		$(".lab").css('display','none');
		
		$(function(){$("#summit").click(function(){
			var date=$.trim($("#begindate").val());
			if(date==""||date==undefined){
				alert("请输入日期");
				return;
			}
			location.href="shareBI.php?id="+pid+"&type="+type+"&select="+select+"&date="+date;
		});
		});
		break;
	case 9:
		$("#enddate").css('display','none');
		$("#begindate").css('display','none');
		$(".lab").css('display','none');
		$(function(){$("#summit").click(function(){
			var date=$.trim($("#beginmon").val());
			//alert(date);
			if(date==""||date==undefined){
				alert("请输入日期");
				return;
			}
			location.href="shareBI.php?id="+pid+"&type="+type+"&select="+select+"&date="+date;
		});
		});
		break;
	case 10:
		$("#beginmon").css('display','none');
		$(function(){$("#summit").click(function(){
			var begindate=$.trim($("#begindate").val());
			var enddate=$.trim($("#enddate").val());
			//alert(date);
			if(begindate==""||begindate==undefined||enddate==""||enddate==undefined){
				alert("请输入日期");
				return;
			}
			if(new Date(begindate).getTime()>new Date(enddate).getTime()){
				alert("日期间隔小于一天");
				return;
			}
			location.href="shareBI.php?id="+pid+"&type="+type+"&select="+select+"&begindate="+begindate+"&enddate="+enddate;
		});
		});
		break;
}