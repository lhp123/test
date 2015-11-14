 /**选择小区 
     * $("#xqname").getUserOrXq({id:$("#xqid"),json:xq});
     * 选择经纪人 
     * $("#users").getUserOrXq({id:$("#id"),json:users});
     */
    
    (function ($) {
        $.fn.extend({
            //插件名称 - dept
        	getUserOrXq: function (options) {

                //参数和默认值
                var defaults = {
                    id:$("#disid"),
                    json:null
                };
             function getBody(){
            	var o = options;
             	var body="<table id = 'usertable' border='0' cellpadding='0' cellspacing='0'>";
             	var col ;
             	var json = o.json;
             	var length = json.length;
             	
             	if(length <=24){
             		col=5;
             	}else if(length<=48){
             		col=7;
             	}else  if(length<=80){
             		col=9;
             	}else { col=14;}
             	
             	for(var i = 0; i<json.length; i++){
             		if(i==0){
             			body = body+ "<tr>";
             		}else if(i%col==0&&i!=(length-1)){
             			body = body+  "</tr><tr>";
             		}
             		
             		body = body+ "<td nowrap align='center'><a href='javascript:void(0);' style='margin: 10px 10px;color:#0180B5;'>"+json[i].NAME+"</a><input type='hidden' value='"+json[i].ID+"'></td>";
             		if(i!=0&&i==(length-1)){
             			body= body+ "</tr>";
             		}
             	}
             	body = body + "</table>";
             	body = "<div id=userdialog style='position:absolute;margin:5px 5px;'>"+body+"</div>";
             	$("body").append(body);
             	$("#userdialog").css({'display':'hidden'})
             	width = $("#userdialog").width();
             	height= $("#userdialog").height();
             	$("#userdialog").remove();
             	return body;
             }
            
                function init(){
                	dialog = K.dialog({
    					width : (width+20)<200?200:(width+20),
    					height: height+80,
    					title : '选择经纪人',
    					body : body,
    					closeBtn : {
    						name : '关闭',
    						click : function(e) {
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
                	var o = options;
                	var id = o.id;
                	$("#usertable").find(" td a").click(function (){
                		var n = $(this).text();
                		var v = $(this).siblings("input").val();
                		_this.val(n);
                		id.val(v);
                		dialog.remove();
                	});
                	
                }
                
                var options = $.extend(defaults, options);
                var dialog,width,height;
                var body = getBody();
                var _this = this;
                _this.click(function (){
                	init();
                	handle();
                });
                
        	}
        });
    })(jQuery);