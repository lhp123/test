$(document).ready(function(){
	
	
	/*控制列表上面的添加 按钮 样式*/
	$(".add").mouseover(function(){
	    $(this).css("backgroundImage","url(/admin/images/but2.png)");
		   
	}).mouseout(function(){
		$(this).css("backgroundImage","url(/admin/images/but1.png)");
	});
	
	$(".reset").click(function(){
		var flag = confirm("此功将有清空对应模块（如:部门/用户/小区）的显示顺序，且此操作不可逆!确认操作吗?");
		if(flag){
			window.location.href = "?action=resetTB";
		}
	});
	
	
	
	
	
	/*function list */
	$("#search .search").click(function(){
		$("#search").submit();
	}).mouseover(function(){
	    $(this).css("backgroundImage","url(/admin/images/search2.png)");
		   
	}).mouseout(function(){
		$(this).css("backgroundImage","url(/admin/images/search.png)");
	});
	
	$("#search select").change(function (){
		$("#search").submit();
	});
	$("#search select[stype='qujian']").change(function (){
		$(this).siblings("#up").val($(this).find("option:selected").attr("up"));
		$(this).siblings("#down").val($(this).find("option:selected").attr("down"));
		$("#search").submit();
	});
	
	$("#search input[type='text']").keydown(function (event){
		if ( event.which == 13 ) {
		    event.preventDefault();
		    $("#search").submit();
		  }
		}).focus();
	
	
	/* 列表隔行换色 双击事件 */
	$("#main_right_main_lb table").eq(0).find("span.db,span.db2,td").click(function(){
		
		$(this).parents("tr").css({'backgroundColor': '#BFBDBD'}).find("input:checkbox").prop("checked",true);
		$(this).parents("tr").siblings("tr").css({'backgroundColor': ''}).find("input:checkbox").prop("checked",false);
		
	}).end().find("tr:not('.fen')").dblclick(function(){
			$(this).children().find(".db").click();
	}).each(function(index){
		if(index != 0){
			if(index%2==0){
				$(this).addClass("n_b");
			}else{
				$(this).addClass("n_y");   
			}
			$(this).css({'height':'33px','line-height': '33px'});
			}
	    
	}).mouseover(function(){
			if($(this).index()!=0){
				$(this).attr("title","双击可修改或查看详情!");
				$(this).children("td").css({'fontWeight':'550','backgroundColor': 'rgba(189, 183, 183, 0.34)'});
			}
		    
		   
	}).mouseout(function(){
			if($(this).index()!=0){
				$(this).attr("title","");
				$(this).children("td").css({'fontWeight':'normal','backgroundColor': ''});
			}
	});
	
	
	/*
	 * 截取制定长度的字符串,英文一个字符为0.5,汉子为1
	 */
	function cut_str(str, len, hasDot){
		
		var newLength=0;
		var newStr="";
		var chineseRegex=/[^\x00-\xff]/g;
		var singleChar='';
		var strLength=str.replace(chineseRegex,'**').length;
		for(var i=0;i < strLength;i++){ 
			singleChar=str.charAt(i).toString();
			
			if(singleChar.match(chineseRegex) != null){ 
				newLength = newLength+1;
			}else{ 
				newLength = newLength+0.5;
			} 
			
			newStr+=singleChar;
			if(hasDot && newLength >len){ 
				newStr+='...';
			} 
			
			if(newLength >len){ 
				break;
			} 
		} 
		return newStr;
	}
	$("#main_right_main_lb > table").css({'tableLayout':'fixed'});
	$("#main_right_main_lb > table td ").each(function (){
		$(this).css({
			'word-break':'keep-all',
			'overflow':'hidden',
			'white-space':'nowrap',
			'text-overflow':'ellipsis'
			});
	});
	
	$("#main_right_main_lb > table td").each(function (){
		var tdLength = $(this).width();
		$(this).wrapInner("<span></span>");
		var span = $(this).find("span");
		var fontLength = span.width();
		
		if(fontLength>tdLength){
			span.attr("title",span.text());  
			
			// 下面是对超出<td>宽度的内容进行截取,现在没有截取,已屏蔽
			/* var fontSize = $(this).css("font-size");
			fontSize = fontSize.substr(0,fontSize.indexOf("px"));
			num = Math.ceil(tdLength / fontSize); 
			var text=span.text();
			text = cut_str(text,num,true);
			if(span.children().is("a")){
				span.find("a").text(text);
			}else{
				span.text(text); 
			} */
		}
	});
	
	
	
});