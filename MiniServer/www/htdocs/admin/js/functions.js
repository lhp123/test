// JQUERY CONFIGURATION FILE FOR BLACKADMINV2 

$(document).ready(function() {
 //NAVIGATION MENU
 
 

 //CLOSE NOTIFICATIONS BUTTON
	$(".close").click(
		function () {
			$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
				$(this).slideUp(400);
			});
			return false;
		}
	);
	


 // Check all the checkboxes when the head one is selected:
		
	$('.checkall').click(
		function(){
			$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
		}
	);
	
/*	
	
	//多选
function duoxuan(event){
		
	jsonname = event.data.jsonname;
	//alert(jsonname);
	var _this = $(this);
	var div = $("#showdiv");
	
	//画出div
	$('#showSelt').empty();
	var r = _this.val().split(";");
	//var jsonname = [{'name':'电视机'},{'name':'机顶盒遥控器2'},{'name':'机顶盒遥控器3'},{'name':'机顶盒遥控器4'},{'name':'机顶盒遥控器5'},{'name':'机顶盒遥控器6'},{'name':'机顶盒遥控器7'},{'name':'机顶盒遥控器11'},{'name':'机顶盒遥控器1'},{'name':'机顶盒遥控器10'}];
	var str="<tr>";
	var f = "";
		
	for(var i=1;i<=jsonname.length;i++){
		
		for(j=0;j<r.length;j++){
			
			f = jsonname[i-1].name==r[j]?"checked":"";
			if(f=="checked") break;
		}
		str +="<td width='nowrap' align='left' valign='middle' style='  line-height:35px; height:35px;'><input type='checkbox' "+f+" name='chk' value='"+jsonname[i-1].name+"' />"+jsonname[i-1].name+"</td>";
		if(i%5==0&i!=0){
			str+="</tr><tr>";
		}
	}
	str=str.substring(0,str.length-5);
	$('#showSelt').append(str);
	
	var h = ($(window).height()-div.height())/2;
	var w = ($(window).width()-div.width())/2;
	div.css({left:w,top:h});
	div.show();
//	$('#outerdiv').css({
//		width:$("#main_right_main").width(),
//		height:$("#main_right_main").height(),
//		left:$("#main_right_main").offset().left,
//		top:$("#main_right_main").offset().top
//	}).show();
	$('#outerdiv').show();
	
	var f = $("#showSelt input[type='checkbox']").size()== $("#showSelt input:checked").size()?true:false;
	$("#btnALL").attr("checked",f);
	
	$("#btnALL").click(function(){ 
			if(this.checked){ 
				$("#showSelt :checkbox").each(function(){this.checked=true;}); 
				$("#btnALL1").text("取消全选");
			}else{ 
				$("#showSelt :checkbox").each(function(){this.checked=false;}); 
				$("#btnALL1").text("全选");
			} 
		}); 
	$("#btnOK").click(function(){
		var result = new Array();
		$("#showSelt input:checked").each(function(i){
			result.push($(this).attr("value"));
		});
		_this.val(result.join(";"));
		div.hide();
		
	});
	$("#btnCLR").click(function(){
		$("#showSelt input:checked").each(function(i){
			$(this).attr("checked",false);
		});
	});
	
	
	
	$("#btnCLS").click(function(){
		div.hide();
		
	});
	
}
	
	
	//单选
function danxuan(event){
	var jsonname = event.data.jsonname;
	var otherId = event.data.otherId;
	writeDiv1($(this),jsonname,otherId);
}	
//$(document).click(function(e){
//	var mx = e.pageX;
//	var mY = e.pageY;
//	var x = seltdiv.offset().left;
//	var y = seltdiv.offset().top;
//	var w = seltdiv.width();
//	var h = seltdiv.height();
//	if(mx<x||mx>x+w||mY<y||mY>y+h){
//		seltdiv.hide();
//	}
	//alert($(this).find("#seltdiv"));
	
	
//});
var re1=[{'id':'12','name':'河西区'},{'id':'13','name':'南开区'},{'id':'14','name':'和平区'},{'id':'15','name':'河北区'},{'id':'16','name':'河东区'}];
var re2 = [{'id':'138577','name':'浦口道','pid':'12'},{'id':'138582','name':'南市','pid':'14'},{'id':'138579','name':'广开街','pid':'13'},{'id':'138580','name':'嘉陵道','pid':'13'},{'id':'138581','name':'兴南街','pid':'13'},{'id':'138583','name':'小白楼','pid':'14'},{'id':'138584','name':'体育馆','pid':'14'},{'id':'138585','name':'鸿顺里','pid':'15'},{'id':'138586','name':'江都路','pid':'15'},{'id':'138587','name':'程林街','pid':'16'},{'id':'138588','name':'大王庄','pid':'16'},{'id':'138589','name':'丁字沽','pid':'17'},{'id':'138590','name':'铃铛阁','pid':'17'},{'id':'138591','name':'大寺','pid':'18'},{'id':'138598','name':'珠江道','pid':'12'},{'id':'138593','name':'李七庄','pid':'18'},{'id':'138594','name':'八里台镇','pid':'19'},{'id':'138595','name':'双港镇','pid':'19'},{'id':'138596','name':'华明镇','pid':'20'},{'id':'138597','name':'军粮城','pid':'20'},{'id':'138599','name':'解放南路','pid':'12'}];
var re3 = [{'id':'1000001','name':'汇通大厦1','pid':'138579'},{'id':'1000002','name':'汇通大厦2','pid':'138579'},{'id':'1000003','name':'汇通大厦3','pid':'138579'},{'id':'1000004','name':'汇通大厦4','pid':'138583'},{'id':'1000005','name':'汇通大厦5','pid':'138583'},{'id':'1000006','name':'汇通大厦6','pid':'138583'}];
  
//小区      
function dis(e){
	var pid = ""
    if($('#RE1').val() ==""){
          alert("请先选择行政区！");
    }else if($('#RE2').val() ==""){
          alert("请先选择片区！");
    }
    var re2name = $('#RE2').val();
    for(i=0;i<re2.length;i++){
        if(re2[i].name == re2name){
       	  pid = re2[i].id;
       	  break;
          }
        }
        	  
    var re33 = new Array();
    for(i=0;i<re3.length;i++){
    	if(re3[i].pid == pid){
    		re33.push(re3[i]);
       	}
    }
    $("#DISNAME").val(re33[0].name);
    writeDiv1($(this),re33,"DISID");	
}
$("#DISNAME").bind('click',{jsonname:''},dis);

//片区
function ppd(e){
	var re22 = new Array();
	
		var re1name = $("#RE1").val();
	     var pid = ""
	     if(re1name ==""){
	         alert("请先选择行政区！");
	       }
	     for(i=0;i<re1.length;i++){
	       if(re1[i].name == re1name){
	    	   pid = re1[i].id;
	    	   break;
	         }
	  	  }
	     for(i=0;i<re2.length;i++){
	      	if(re2[i].pid == pid){
	      		re22.push(re2[i]);
	        	}
	      }
	$("#RE2").val(re22[0].name); //设置默认片区
	
    writeDiv1($(this),re22,"","DISNAME","click");	
    
}
$("#RE2").bind('click',{jsonname:''},ppd);


//行政区 或 部门
function re(event){
	//alert("ddd");
  writeDiv1($(this),re1,"","RE2","click");  
}

$("#RE1").bind('click',{jsonname:''},re);


          

	
          



function writeDiv1(_this,dataset,otherId,nextId,eventType){
	var seltdiv = $("#seltdiv");
  	seltdiv.empty();
  	var str = "";
  	

  	var m = dataset.length<16?3:(dataset.length>24?5:4);
  	if(otherId == undefined){
		for(i=1;i<=dataset.length;i++){
			str += "<a href='javascript:void(0);' type='links'  value='' style='width:40px;'>"+dataset[i-1].name+"</a>&nbsp;&nbsp;";
			if(i%m==0&i!=0){
				str += "<br />";
			}
		}
	}else{
		for(i=1;i<=dataset.length;i++){
			str += "<a href='javascript:void(0);' type='links' style='width:40px;' value='"+dataset[i-1].id+"'>"+dataset[i-1].name+"</a>&nbsp;&nbsp;";
			if(i%m==0&i!=0){
				str += "<br />";
			}
		}
	}
  	seltdiv.append(str);
  	seltdiv.css({left:_this.offset().left,top:_this.offset().top+_this.outerHeight()});
  	seltdiv.show();
  	$("a[type='links']").click(function(){
  		_this.val($(this).text());
  		if(otherId != undefined){
  			$("#"+otherId).val($(this).attr("value"));
  		}
  		seltdiv.hide();	
  		if(nextId != undefined&eventType!=undefined){
  			$("#"+nextId).trigger(eventType);
  		}
  	});	
}
          

var dept1 = [{'id':'1','name':'测试部门1','pid':''},{'id':'2','name':'测试部门2','pid':''},{'id':'3','name':'测试部门3','pid':''},{'id':'4','name':'测试部门4','pid':''},{'id':'5','name':'测试部门5','pid':'1'},{'id':'6','name':'测试部门6','pid':'1'},{'id':'7','name':'测试部门7','pid':'2'},{'id':'8','name':'测试部门8','pid':'1'},{'id':'9','name':'测试部门9','pid':'2'}];
//部门

function dept(){
	var currentV,currentN;
	var _this = $(this);
	var otherId = $('#DEPTID');
	var seltdiv = $("#seltdiv");
  	var str = "";
  	var m = 4;
  	var dataset = dept1;
  	seltdiv.empty();
  	str = "<table width='100%' cellpadding='0' cellspacing='0'><tr style='background:#008090;color:#fff; border-bottom:#CCC 1px solid;'><td align='left' id='seltdept' ></td><td align='right' valign='middle' style='  line-height:20px; height:20px;'><input value='确定'  type='button' ></td></tr></table>";
  	seltdiv.append(str);
  	str ="";
  	
  	var index =0;
  	for(i=1;i<=dataset.length;i++){
  		if(dataset[i-1].pid==""){
  			str += "<a href='javascript:void(0);' type='dept' style='width:40px;' value='"+dataset[i-1].id+"'>"+dataset[i-1].name+"</a>&nbsp;&nbsp;";
  			index++;
  			if(index%m==0){
  				str += "<br />";
  			}
  		}
  	}
  	str ="<div id ='deptdiv'>"+str+"</div>";
	seltdiv.append(str);  	
  	seltdiv.css({left:_this.offset().left,top:_this.offset().top+_this.outerHeight()});
  	seltdiv.show();
  	
  	$("#deptdiv a[type='dept']").bind('click',s);
  	function s(){
  		currentV = $(this).attr('value');
  		currentN = $(this).text();
  		$('#seltdept').append("<a id='p' style='color:#eee;' value='"+currentV+"'>"+currentN+"</a>");
  		var deptdiv = $("#deptdiv");
  		deptdiv.empty().hide();
  		str = "";
  		var index =0;
  		for(i=1;i<=dataset.length;i++){
  			if(dataset[i-1].pid==currentV){
  				str += "<a href='javascript:void(0);' type='dept' style='width:40px;' value='"+dataset[i-1].id+"'>"+dataset[i-1].name+"</a>&nbsp;&nbsp;";
  	  			index++
  				if(index%m==0){
  	  				str += "<br />";
  	  			}
  			}  			
  		}
  		//if(str ==""){str = "<font font-size ='9px'>已无下级部门！</font>";}
  		deptdiv.append(str); 
  		deptdiv.show();
  		$("#deptdiv a[type='dept']").bind('click',s);
  	}
  	
  	$('#seltdiv input').click(function(){
  		_this.val(currentN);
  		otherId.val(currentV);
  		seltdiv.hide();
  	});
}

$('#DEPTNAME').bind('click',dept);

*/




 

   // 表单提交 --修改添加 detail.php  
    $('#myform').submit(function() { 
        
    	$('#myform :checkbox').each(
    			function(){
    				v = this.checked?"1":"0";
    				$(this).val(v);
    			});
    	var param = [];
    	$('#myform [sname]').each(function(){
    		param.push($(this).attr('name'));
    	});
    	$('#sname').val(param.join(';'));
        return true; 
    }); 

 /*
//// pre-submit callback 
//function showRequest(formData, jqForm, options) { 
//	var n="",v="";
//	$('#myform :checkbox').each(function(){
//		n = $(this).attr("name");
//		
//		v = $(this).is(":checked")?"1":"0";
//		$(this).val(v);
//		//alert(n+v);
//		//formData.push({"name":n,"value":v});
//	});
//	formData = decodeURIComponent(formData,true);//一次转码
//    formData = encodeURI(encodeURI(formData)); //两次转码
//	//formData = encodeURI(formData);
//    var queryString = $.param(formData); 
//    alert('About to submit: \n\n' + queryString); 
//    return true; 
//} 
 
// post-submit callback 
//function showResponse(responseText, statusText)  { 
// 
//    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText);
//        
//} 



    var json = $('#json').val();
	//alert(json)
	eval(json);
	$('#json').val("");
//	$(document).bind('click',function(e){
//        var e = e || window.event; //浏览器兼容性
//        var elem = e.target || e.srcElement;
//        while (elem) { //循环判断至跟节点，防止点击的是div子元素
//            elem = $(elem);
//           
//        	if (elem.id || elem.id=='seltdiv'||elem.id=='showdiv'||elem.attr("type")=='text') {
//                return;
//            }
//            elem = elem.parentNode;
//        }
//        
//        $('#seltdiv').css('display','none'); //点击的不是div或其子元素
//        $('#showdiv').css('display','none'); //点击的不是div或其子元素
//    });
*/
});
	