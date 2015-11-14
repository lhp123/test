/**
   *  选择区域插件 
   * 调用$("id").getRe({
  	 	re1: $("#RE1"), //必写
        re1id: $("#RE1ID"),
        re2: $("#RE2"),
        re2id: $("#RE2ID")
   * });
   */ 
   
   
    (function ($) {
        $.fn.extend({
            //插件名称 - getRe
        	getRe: function (options) {

                //参数和默认值
                var defaults = {
                    re1: $("#RE1"),
                    re1id: $("#RE1ID"),
                    re1json:re1,
                    re2: $("#RE2"),
                    re2id: $("#RE2ID"),
                    re2json:re2
                };

                var options = $.extend(defaults, options);
                
                function init(){
                	var o = options;
                	var str="";
                	//行政区
                	var selected = o.re1.attr("selt");
                	for (var i= 0 ; i<o.re1json.length;i++){
                		str  = "<option id='"+o.re1json[i].ID+"' value='"+o.re1json[i].NAME+"' "+(selected==o.re1json[i].NAME?"selected":"")+" >"+o.re1json[i].NAME+"</option>";
                		o.re1.append(str);
                		str = "";
                	}
                	
                	//片区
                	var seltRe1id = o.re1.find("option:selected").attr("id");	
                	if(o.re2.length > 0){
                		selected = o.re2.attr("selt") ;
                    	for (var i= 0 ; i<o.re2json.length;i++){
                    		if(seltRe1id == o.re2json[i].PID){
                    			str  = "<option id='"+o.re2json[i].ID+"' value='"+o.re2json[i].NAME+"' "+(selected==o.re2json[i].NAME?"selected":"")+"  >"+o.re2json[i].NAME+"</option>";
                    			o.re2.append(str);
                        		str = "";
                    		}
                    	}
                    	
                    	o.re2.change(function(){
                    		o.re2id.val(o.re2.find("option:selected").attr("id"));
                    	});
                	}
                	
                	o.re1.change(function(){
                		o.re1id.val(o.re1.find("option:selected").attr("id"));
                		var seltRe1id = o.re1.find("option:selected").attr("id");
                		
                		if(o.re2.length > 0){
                			o.re2.empty();
                    		for (var i= 0 ; i<o.re2json.length;i++){
                        		if(seltRe1id == o.re2json[i].PID){
                        			str  = "<option id='"+o.re2json[i].ID+"' value='"+o.re2json[i].NAME+"' >"+o.re2json[i].NAME+"</option>";
                        			o.re2.append(str);
                            		str = "";
                        		}
                        	}
                    		o.re2.trigger("change");
                		}
                		
                	});
                	
                	
                }
                
                
                init();
        	}
        	
          
                
        });
    })(jQuery);
