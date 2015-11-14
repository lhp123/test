$(document).ready(function(){
	
	/*detail js*/
	
	/* tr 隔行变色*/
    $("#myform > table > tbody > tr ").each(function (){
        $(this).children("td").removeClass("n_b");
        $(this).children("td").removeClass("n_y");
        
        if($(this).index()%2==0){
        	$(this).children("td").addClass("n_y");
	    }
	    if($(this).index()%2==1){
	    	   $(this).children("td").addClass("n_b"); 
	    }
	    //设置 td 下table css 样式
	    $(this).find("table").attr({'width':'100%','border':'0','cellpadding':'0','cellspacing':'0'});
	    
	    
	    //使带有 noedit 的input 和textarea 不可编辑
	    $(this).find(":input[noedit]").css({
       		'border':'0',
       		'backgroundColor':$(this).children("td").css('backgroundColor')
	    	}).attr('readonly',1);
	    $(this).find("textarea[noedit]").css({            
	    	'resize': 'none',
	   		'outline': 'none'
	    	});
	    
	});
    
    $("#fy input").attr({
    	'style':'background-color: Transparent; color:#FFF;  background-image:url(/admin/images/sub1.png); width:86px; height:30px; line-height:30px; margin-top:8px; border:0px;',
    	'onmouseover':'this.style.backgroundImage="url(/admin/images/sub2.png)"',
    	'onmouseout':'this.style.backgroundImage="url(/admin/images/sub1.png)"'
    });
    
   
     /*
      * 自动给没有id的表单元素赋予name的值
      */
     
    $("#myform :input").each(function(){
    	if($(this).attr("id")==null){
    		$(this).attr("id",$(this).attr("name"));
    	}
    	
    });
    
    $("#myform td > input[stype='select']").each(function (){
    	var parentTd = $(this).closest("td");
    	var selt = $(this).attr("selt");
    	var name = $(this).attr("name");
    	var sname = $(this).attr("sname");
    	var id = $(this).attr("id");
    	var style = $(this).attr("style");
    	var json = eval($(this).attr("json")==null?$(this).attr("name"):$(this).attr("json"));
    	var str = "";
    	str = str + "<select id='"+id+"' name='"+name+"' sname='"+sname+"' class='selectcss' style='"+style+"'>";
    	str = str + "<option  value=''>请选择</option>";
    	for(var i = 0; i<json.length;i++){
    		str = str + "<option  value='"+json[i].NAME+"' "+ (json[i].NAME==selt?"selected":"")+"  >"+json[i].NAME+"</option>";
    	}
    	str = str + "</select>";
    	$(str).insertAfter($(this));
    	$(this).remove();
    	
    });
    
    
    /*checkbox  将选中的一组复选框 放进 同一<td>中的 <input type='hidden'>*/
   /*
    $("#myform td > :checkbox").click(function(){
	    var result = [];
	    if($(this).prop("checked")){
            result.push($(this).attr("value"));
            }
        $(this).siblings(":checkbox").each(function (){
        	var s = $(this).attr("value");
            if($(this).prop("checked")){
                result.push($(this).attr("value"));
	            }
	        });
        
        $(this).siblings("input:hidden").val(result.join(";"));
        
	    });
    */
    
 // 表单提交 --修改添加 detail.php  
    function submit() { 
        
    	$('#myform :checkbox').each(
    			function(){
    				v = this.checked?"1":"0";
    				$(this).val(v);
    			});
    	var param = [];
    	$('#myform :input[sname]').each(function(){
    		param.push($(this).attr('sname'));
    	});
    	$('#sname').val(param.join(';'));
    	
        return true; 
    }
    $("#myform input[type=submit]").bind("submit",submit); 
    $("#myform   #submit").bind("click",submit); 
    
    
    
    K = KindEditor.myready(); //获取 KindEditor对象(全局)
    // kindediter 编辑器  对带有type='kindeditor'属性的textarea使用编辑器
    K.create("#myform textarea[stype='kindeditor']", {
        allowFileManager : true,
        uploadJson : '/admin/kindeditor/php/upload_json.php?updir=image',
    });
    
    if($("#myform input[stype='map']").length>0){
    	$('<script type="text/javascript"	src="http://api.map.baidu.com/getscript?v=1.2&ak=&services=true&t=20130716024057"></script>').appendTo("head");
		$('<script type="text/javascript"	src="/admin/js/map.js"></script>').appendTo("head");
		$("#myform input[stype='map']").attr({
			'style':'background-color: Transparent; color:#FFF;  background-image:url(/admin/images/sub1.png); width:86px; height:30px; line-height:30px; margin-top:8px; border:0px;',
	    	'onmouseover':'this.style.backgroundImage="url(/admin/images/sub2.png)"',
	    	'onmouseout':'this.style.backgroundImage="url(/admin/images/sub1.png)"'
		});
	}
    
    if($("#myform input[stype='mupfile'],#myform input[stype='upfile']").length>0){
		$('<script type="text/javascript"	src="/admin/js/upImage.js"></script>').appendTo("head");
	}
    
    
    
    
    
    
    
});