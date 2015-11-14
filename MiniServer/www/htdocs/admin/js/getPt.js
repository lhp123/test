 /**
     * 多选,配置项
     * $("#users").getUser({json:json,title:"标题"});
     */
    
    (function ($) {
        $.fn.extend({
            //插件名称 - dept
        	getPt: function (options) {

                //参数和默认值
                var defaults = {
                    json:[],
                    title:"",
                };
             function getBody(){
            	var o = options;
             	var body="<table id = 'usertable' border='0' cellpadding='0' cellspacing='0'>";
             	var col ;
             	var json = o.json;
             	var checked = false ;
             	if(length <=24){
             		col=5;
             	}else if(length<=48){
             		col=6;
             	}else  if(length<=80){
             		col=8;
             	}else { col=10;}
             	
             	
             	for(var i = 0; i<json.length; i++){
             		
             			if(i==0){
                 			body = body+ "<tr>";
                 		}else if(i%col==0&&i!=(length-1)){
                 			body = body+  "</tr><tr>";
                 		}
             			for(var j =0 ; j<selectjson.length; j++){
             				if(selectjson[j] == json[i].NAME){ checked = true ; break ;}
             			}
                 		
                 		body = body+ "<td nowrap align='left'><input  "+(json[i].NAME=="全选"?"onclick ='qx()' id='selectall'":"name='selectsub'")+" type='checkbox' "+(checked?"checked":"")+"  value='"+json[i].NAME+"'/><a href='javascript:void(0);' style='margin: 10px 10px;color:#0180B5;'>"+json[i].NAME+"</a></td>";
                 		checked = false;
                 		
                 		if(i!=0&&i==(length-1)){
                 			body= body+ "</tr>";
                 		}
             		
             		
             	}
             	body = body + "</table>";
             	body = "<div id=dialog style='position:absolute;margin:5px 5px;'>"+body+"</div>";
             	$("body").append(body);
             	$("#dialog").css({'display':'hidden'})
             	width = $("#dialog").width();
             	height= $("#dialog").height();
             	$("#dialog").remove();
             	return body;
             }
            
                function init(){
                	dialog = K.dialog({
    					width : (width+20)<200?200:(width+20),
    					height: height+80,
    					title : options.title,
    					body : body,
    					closeBtn : {
    						name : '关闭',
    						click : function(e) {
    							dialog.remove();
    						}
    					},
    					yesBtn : {
    						name : '确定',
    						click : function(e) {
    							var result = [];
    							$("#dialog table input:checked").each(function (){
    								result.push($(this).val());
    							});
    							_this.val(result.join(";")+";");
        						dialog.remove();
    						}
    					},
    					noBtn : {
    						name : '取消',
    						click : function(e) {
    							dialog.remove();
    						}
    					}
    					
    				});
                }
                
                function handle(){
                	selectjson = _this.val().split(";");
                	body = getBody();
                	init();
                }
                var _this = this;
                var options = $.extend(defaults, options);
                var dialog,width,height,body,selectjson;
                _this.click(handle);
                
                
        	}
        });
    })(jQuery);