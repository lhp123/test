$(document).ready(function (){

//利率生成
json = lilv;
$("select[name='rate']").append(function(index){
	var  html ="";
	for(var i = 0;i<json.length;i++){
		html = html+"<option value="+i+" "+(json[i].default==1?"selected":"") +">"+json[i].name+"</option>";
	}
	return html;				
});
$("select[name='rate'],select[name='anjieyear'],select[name='dktype']").change(function (){
	var rate_sy = $("input[name='rate_sy']");  //商业利率
	var rate_gjj = $("input[name='rate_gjj']");//公积金利率
	var index = $("select[name='rate'] option:selected").val();
	var store = json[index];
	var anjieyear = parseInt($("select[name='anjieyear'] option:selected").val());
	var dktype = $("select[name='dktype'] option:selected").val();

	var sy_r,gjj_r,year_down,year_up,years, arr;
	arr = store["sy"];
	for(var i=0;i<arr.length;i++){
		years = arr[i]["year"].split("-");  
		year_down = parseInt(years[0]);
		year_up   = parseInt(years[1]);
		if(anjieyear>year_down&&anjieyear<=year_up){
			sy_r = arr[i].lv;
			//alert("商业 year_down :"+year_down+" anjieyear: "+anjieyear+"year_up:"+year_up +" gjj_r :"+sy_r);
			break;
		}
	}
	
	arr = store["gjj"];
	for(var i=0;i<arr.length;i++){
		years = arr[i]["year"].split("-");  
		year_down = parseInt(years[0]);
		year_up   = parseInt(years[1]);
		
		if(anjieyear>year_down&&anjieyear<=year_up){
			
			gjj_r = arr[i].lv;
			//alert("公积金 year_down :"+year_down+" anjieyear: "+anjieyear+"year_up:"+year_up +" gjj_r :"+gjj_r);
			break;
		}
	}
	
	if(dktype =="sydk"){
		rate_sy.val(sy_r);
	}else if(dktype =="gjj"){
		rate_gjj.val(gjj_r);
	}else if(dktype =="zuhe"){
		rate_sy.val(sy_r);
		rate_gjj.val(gjj_r);
	}
}).trigger("change");



//开始计算 
$("#submit").click(function (){
    if(check()){
    	$.post('?action=jsdk',$("#myform").serialize(),function (data){
        	 result(eval("("+data+")"));}
      	 );
     }
});
//重新填写
$("#reset").click(function (){
  
	$("#myform").trigger("reset");
	$("input[name='hkfs']").trigger("change");
	$("select[name='dktype']").trigger("change");
	$("input[name='jstype']").trigger("change");
});




$("input[name='danjia'],input[name='fyarea'],input[name='total'],input[name='total_sy'],input[name='total_gjj'],input[name='rate_sy'],input[name='rate_gjj']").keyup(function (event){
		
		var v =$(this).val();
		if(!v.match(/^[\+\-]?\d*?\.?\d*?$/)){
			$(this).val("");
		}
	  
		//利用event.keyCode实现输入限制，让文本框里只能输入money
		//if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39)&&!(event.keyCode==190))   
		//if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))   
		//event.returnValue=false; //不让非数字显示 
});

//还款方式控制
var hkfs =	$("input[name='hkfs']");
	hkfs.change(function (){
	if(hkfs.filter(":checked").val()=="bx"){
	    $(".hkfs_bj").addClass("display");	
		$(".hkfs_bx").removeClass("display");	
	}else {
		$(".hkfs_bj").removeClass("display");	
		$(".hkfs_bx").addClass("display");
	}
});

//贷款方式控制
$("select[name='dktype']").change(function (){
	
	var val = $(this).find("option:selected").val();
	if(val=="gjj"||val=="sydk"){
		$("input[name='jstype']").closest("tr").removeClass("display");
		$("input[name='danjia']").closest("table").closest("tr").removeClass("display");
		$("input[name='total_sy']").closest("tr").addClass("display");
		$("input[name='total_gjj']").closest("tr").addClass("display");
		if(val=="gjj"){
			$("input[name='rate_gjj']").closest("tr").removeClass("display");
			$("input[name='rate_sy']").closest("tr").addClass("display");
		}else if(val=="sydk"){
			$("input[name='rate_gjj']").closest("tr").addClass("display");
			$("input[name='rate_sy']").closest("tr").removeClass("display");
		}
	}else if(val=="zuhe"){
		$("input[name='jstype']").closest("tr").addClass("display");
		$("input[name='danjia']").closest("table").closest("tr").addClass("display");
		$("input[name='total_sy']").closest("tr").removeClass("display");
		$("input[name='total_gjj']").closest("tr").removeClass("display");

		$("input[name='rate_gjj']").closest("tr").removeClass("display");
		$("input[name='rate_sy']").closest("tr").removeClass("display");
	}
});

//计算方式控制
var jstype = $("input[name='jstype']");
 jstype.change(function (){
	if(jstype.filter(":checked").val()=="mianji"){
	    $(".jstype_zonge").addClass("display");	
		$(".jstype_mianji").removeClass("display");	
	}else{
		$(".jstype_zonge").removeClass("display");	
		$(".jstype_mianji").addClass("display");	
	}
});

//表单提交数据验证
function check (){
    var val;
    var hkfs = $("input[name='hkfs']:checked").val(); //还款方式
    var dktype = $("select[name='dktype'] option:selected").val(); //贷款类别
    var jstype = $("input[name='jstype']:checked").val(); //计算方式
    if(hkfs==""){
    	alert("请选择还款方式");
    	return false;
    }
    var dktype = $("select[name='dktype'] option:selected").val(); //贷款类别
    if(val==""){
    	alert("请选择贷款类别");
    	return false;
    }else if(dktype=="gjj"||dktype=="sydk"){ 
        
    	var jstype = $("input[name='jstype']:checked").val();
        if(jstype=="mianji"){
        	val = $("input[name='danjia']").val();                   
        	if(val==""){
        		alert("请填写单价");
        		return false;
        	}
        	val = $("input[name='fyarea']").val();
        	if(val==""){ 		
            	alert("请填写面积");    		
            	return false;
        	}
        }else if(jstype=="zonge"){
        	val = $("input[name='total']").val();
        	if(val==""){
        		alert("请填写贷款总额");
        		return false;
        	}
        }
        
        var rate_sy = $("input[name='rate_sy']").val();
        var rate_gjj = $("input[name='rate_gjj']").val();
		if(dktype=="gjj"){
			if(rate_gjj==""){
				alert("请填写公积金利率");
				return false;
			}
		}else if(dktype=="sydk"){
			if(rate_sy==""){
				alert("请填写商业贷款利率");
				return false;
			}
		}
    }else if(dktype=="zuhe"){
        var total_sy = $("input[name='total_sy']").val();
        var total_gjj = $("input[name='total_gjj']").val();
        var rate_sy = $("input[name='rate_sy']").val();
        var rate_gjj = $("input[name='rate_gjj']").val();
        if(total_sy==""){
        	alert("请填写商业贷款金额");
        	return false;
        }
        if(total_gjj==""){
        	alert("请填写公积金贷款金额");
        	return false;
        }
        if(rate_sy==""){
        	alert("请填写商业贷款利率");
        	return false;
        }
        if(rate_gjj==""){
        	alert("请填写公积金贷款利率");
        	return false;
        }
    }
    
    return true;
}	

//返回数据处理
function result(data){
	var result =  data;
	$("#result_fwprice").html(result["result_fwprice"]);
	$("#result_dktotal").html(result["result_dktotal"]);
	$("#result_total").html(result["result_total"]);
	$("#result_lx").html(result["result_lx"]);
	$("#result_month").html(result["result_month"]);
	$("#result_monthfirst").html(result["result_monthfirst"]);
	var val = $("input[name='hkfs']:checked").val();
	if(val=="bx"){
		$("#result_monthmoney").html(result["result_monthmoney"]);	
		$("#result_monthmoney2").html("");	
	}else if(val=="bj"){
		$("#result_monthmoney").html("");
		$("#result_monthmoney2").html(result["result_monthmoney2"]);
	}
	
	
	
}	    

});