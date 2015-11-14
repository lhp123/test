$(document).ready(function(e) {
	
	var main = $("#main");
	main.find(".main_box").mouseover(function (){
		//alert($(this).html());
		$(this).css({'backgroundColor':'#f5f5f5'});
		$(this).find("#ckx2").show();		
		$(this).find("#ckx").show();
		
	}).mouseout(function (){
		$(this).css({'backgroundColor':'#fff'});
		$(this).find("#ckx2").hide();
		var o = $(this).find("#ckx").find("input[type='checkbox']").get(0);
		if(o&&!o.checked)
			$(this).find("#ckx").hide();
	});
	
	var main = $("#jjr_list_main");
	main.find(".jjr_list_box").mouseover(function (){
		//alert($(this).html());
		$(this).css({'backgroundColor':'#f5f5f5'});		
	}).mouseout(function (){
		$(this).css({'backgroundColor':'#fff'});
	});
	
	/*带有css为changeColor的div 指上去变色*/
	$("div.changeColor").mouseover(function (){
		$(this).css({'background-color': '#f5f5f5'});
	}).mouseout(function (){
		$(this).css({'background-color': ''});
	});
	
	/*房源列表 复选框控制*/
	$("#main input[type='checkbox']").each(function(){
		$(this).get(0).checked=false;
	});
	$(".four").find("input[type='checkbox']").click(function(){
		var obj=$("#apDiv2");
		obj.attr("style","display:block;");
		var curfycount=obj.find("#db_fylist li").length-1;
		obj.find("#fydbgo_but").show();		
		if(($(this).get(0)).checked){
			if(curfycount>=4){
				alert("对比房源最多不能超过4条！");
				($(this).get(0)).checked=false;
				return;
			}			
			var index_num=$(this).attr("index_num");
			var infostr="<li id='db_fy_"+$(this).attr("fyid")+"'><table border='0' cellpadding='2' cellspacing='0'><tr>";
			infostr+="<td><img src='/images/fwimg.jpg' width='85' height='66' /></td>";
			infostr+="<td style='line-height:18px;'><span class='blu'><a href='#'>"+($("#db_title_"+index_num).get(0)).outerHTML+"</a></span><br />";
			infostr+=$("#db_area_"+index_num).text()+" &nbsp;&nbsp;<span class='blu'>"+$("#db_price_"+index_num).text()+"</span><br />"+$("#db_housetype_"+index_num).text()+"</td></tr>";
			infostr+="<tr><td align='center'><a id='del_"+index_num+"' val='db_fy_"+$(this).attr("fyid")+"' style='color:#C00;'>删除</a></td><td></td>";
			infostr+="</tr></table><input type='hidden' name='fyid[]' value='"+$(this).attr("fyid")+"'></li>";
			obj.find("#db_fylist").append(infostr);		
			obj.find("#db_count").text(curfycount+1);
			var content0=$("#db_title_"+index_num).text();
			if(content0.length>9){
				$(".blu #db_title_"+index_num).text(content0.substr(0,9));
				$(".blu #db_title_"+index_num).attr("title",content0);
			}else{
				$(".blu #db_title_"+index_num).text(content0);
				$(".blu #db_title_"+index_num).attr("title",content0);
			}
		}
		else{
			obj.find("#db_fy_"+$(this).attr("fyid")).remove();
			obj.find("#db_count").text(curfycount-1);
		}
		
		
		$("#apDiv2 a[id='del_"+index_num+"']").click(function(){
			var obj=$("#apDiv2");			
			var fycount=obj.find("#db_fylist li").length-1;
			obj.find("#db_count").text(fycount-1);
			obj.find("#fydbgo_but").show();
			if((fycount-1)==0){
				obj.find("#fydbgo_but").hide();
			}		
			$("#"+$(this).attr("val")).remove();
			$("#main input:checked[fyid='"+$(this).attr("val").replace("db_fy_","")+"']").removeAttr("checked");
			
		});
	});	
	/*房源列表 复选框控制*/		

	
	/*房源列表页对比框 关闭按钮*/
	$("#db_close").click(function(){
		$("#apDiv2").attr("style","display:none;");
	});
	
	
	
});
