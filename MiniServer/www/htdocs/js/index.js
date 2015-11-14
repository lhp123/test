
//-------最新成交滚动-------start
function AutoScroll(obj){
    $(obj).find("ul:first").animate({
            marginTop:"-25px"
    },500,function(){
            $(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
    });
}
$(document).ready(function(){
setInterval('AutoScroll("#scrollDiv")',4500);
});
//-------最新成交滚动-------end


//indexsearchform查询-----start
$(document).ready(function(e) {	
	var indexSearchForm=$("#indexsearchform");
	
	indexSearchForm.find("#indexmohu").each(function (){
		$(this).val($(this).attr("title"));
	}).keydown(function(event){
		if ( event.which == 13) {
			event.preventDefault();
			indexSearchForm.find("#indexsearch").click();
		}
	}).focus(function(){
		if(indexSearchForm.find("#indexmohu").val()==indexSearchForm.find("#indexmohu").attr("title")){
			$(this).val("");
		}
	}).blur(function(){		
		if(indexSearchForm.find("#indexmohu").val()=="")
			$(this).val($(this).attr("title"));
	});
	
	indexSearchForm.find("#indexsearch").bind("click",function(){
		var v = indexSearchForm.find("#indexmohu").val();
		if(!(v==indexSearchForm.find("#indexmohu").attr("title") || v=="")){
			indexSearchForm.find("#indexmohu").val($.trim(v));
			indexSearchForm.submit();
		}
	});	
});

//indexsearchform查询-----end

//联想查询
$(function (){
	
	$("#xq_name").autocomplete("/action/Control.php?a=xq&action=searchByName", {  
		minChars: 1,
        //width : 300, // 提示的宽度，溢出隐藏  
        max : 10,// 显示数量  
        autoFill : false,  
        scroll : true, // 当结果集大于默认高度时是否使用卷轴显示  
        matchContains : true,  
        multiple :false,  
        mustMatch:true,
        delay: 400, 
        noRecord:"",
        formatItem: function(row, i, max) {  
            return '<span style="color:gray;padding-right:10px;"> ' + row.name + '</span> ';  
        },  
        formatMatch: function(row, i, max) {  
            return row.name + row.id;  
        },  
        formatResult: function(row) {  
            return row.id;  
        },  
        parse:function(data) {//解释返回的数据，把其存在数组里  
//            alert(data);
        	var array=eval(data);  
//        	var array=eval("("+data+")");  
            var parsed = [];  
            if(array == null)  
            {  
                return parsed;  
            }  
            for (var i = 0; i < array.length; i++) {  
                parsed[i] = {  
                    data: array[i],  
                    value: array[i].id,  
                    result: array[i].name  
                };  
            }  
            return parsed;  
        }  
    }).result(function(event, row, formatted) {  
                 if(row!==undefined){
                	 $(this).attr("xqid",row.id);
                     $(this).val(row.name);  
                     //alert($(this).attr("xqid"));
                 }
    			
     });
	
	
	$("#xq_price_search").click(function (){
		var xqid = $("#xq_name").attr("xqid");
		if(xqid!=""&&xqid!==undefined){
			var url = "/xq/xq_detail.php?xqid="+xqid+"#jgzs";
			//window.location.href=url;	
			window.open(url);
		}
		
	});

})





