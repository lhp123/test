 /*
     * 选择新闻类型 
     * 用法:$("newtype").getNewsType({
     * 		subname: $("#SUBTYPE"),
     *      newsjson:newstype
     * });
     */
    (function ($) {
        $.fn.extend({
            //插件名称 - getRe
        	getNewsType: function (options) {

                //参数和默认值
                var defaults = {
                	 subname: $("#SUBTYPE"),
               		 newsjson:newstype
                };

                var options = $.extend(defaults, options);
                var _this = this;
                function init(){
                	var o = options;
                	var str="";
                	var selt = _this.attr("selt");
                	var json = o.newsjson;
                	var subname = o.subname;
                	//新闻大类 去重
                	var typejson = new Array();
                	var flag ;
                	
                	for(var i= 0 ; i<json.length;i++){
                		flag =true;
                		for(var j= 0 ; j<typejson.length&&flag;j++){
                    		if(typejson[j]==json[i].TYPE){
                    			flag = false;
                    		}
                    	}
                		if(flag){
                			typejson.push(json[i].TYPE);
                		}
                	}
                	
                	for (var i= 0 ; i<typejson.length;i++){
                		
                    	str  = str + "<option  value='"+typejson[i]+"' "+(selt==typejson[i]?"selected":"")+" >"+typejson[i]+"</option>";
                	}
                	_this.append(str);
                	
                	
                	//新闻子类
                	var selected = _this.find("option:selected").attr("value");	
                	str = "";
                	var subselt = subname.attr("selt") ;
                	for (var i= 0 ; i<json.length;i++){
                		if(selected == json[i].TYPE&&json[i].NAME!=""){
                			str  = str + "<option value='"+json[i].NAME+"' "+(subselt==json[i].NAME?"selected":"")+"  >"+json[i].NAME+"</option>";
                			
                    		
                		}
                	}
                	subname.append(str);
                   //新闻大类  change事件	
                    	_this.change(function(){
                    		
                    		var selt = _this.find("option:selected").attr("value");
                    			subname.empty();
                        		for (var i= 0 ; i<json.length;i++){
                            		if(selt == json[i].TYPE&&json[i].NAME!=""){
                            			str  = "<option value='"+json[i].NAME+"' >"+json[i].NAME+"</option>";
                            			subname.append(str);
                                		str = "";
                            		}
                            	}
                    	});
                    	               	
                	}
                	
                
                init();
        	}
        	
          
                
        });
    })(jQuery);  