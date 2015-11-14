(function ($) {
    $.fn.extend({
        roll : function (options){

            var  defaults  = {
                box       : ".box", //盒子
                boxtype   : "div",  //盒子类型,div span img
                pre       : ".pre", //上
                next      : ".next",//下
                rolltype  : "left" , // 滚动方向 left ,right 
                speed     : 1000*5,  // 滚动速度
				movelook  : true,    // 自动滚动 
            }

            var options = $.extend(defaults, options);

            var  container = $(this);
			
            container.css({'position':'relative','overflow':'hidden'});

            var  box  = container.find(options.box);

            var  num = box.children(options.boxtype).length ;
			 
            var  width = box.children(options.boxtype).outerWidth(true);
			
			var  offset = width;

			
			var realnum = Math.floor(container.width() /width)-1;


            var  rolltype = options.rolltype;

            var  AutoPlayObj = null;
            
            var  movelook = false;

            function  autorun (){
				if(options.movelook){
					 if(rolltype=="right"){
					box.find(options.boxtype+":first").animate({
						marginLeft:width+"px"
					},300,function(){
							$(this).css({marginLeft:"-="+width+"px"}).parent().find(options.boxtype+":last").insertBefore(this);
					});
				}
				if(rolltype=="left"){
					box.find(options.boxtype+":eq("+realnum+")").animate({
						marginRight:width+"px"
					},200,function(){
							$(this).css({marginRight:"-="+width+"px"}).parent().find(options.boxtype+":first").insertAfter(box.find(options.boxtype+":last"));
					});
				}
					
					}
               
				
            }

            function run (type){
                 if(type=="right"){
					box.find(options.boxtype+":first").animate({
						marginLeft:width+"px"
					},300,function(){
							$(this).css({marginLeft:"-="+width+"px"}).parent().find(options.boxtype+":last").insertBefore(this);
					});
				}
				if(type=="left"){
					box.find(options.boxtype+":eq("+realnum+")").animate({
						marginRight:width+"px"
					},100,function(){
						$(this).css({marginRight:"-="+width+"px"}).parent().find(options.boxtype+":first").insertAfter(box.find(options.boxtype+":last"));
					});
				}
            }

            function init (){
                if(rolltype =="left"||rolltype =="right"){
                    if(container.width()<offset*num){
                        AutoPlayObj = setInterval(autorun, options.speed);
                       
                    }else {
                    	 movelook = true;
                    }
                }else{
                    if(container.height()<offset*num){
                        AutoPlayObj = setInterval(autorun, options.speed);
                        
                    }else {
                    	 movelook = true;
                    }
                   
                }



                container.parent().find(options.pre+","+options.next).mouseover(function (){
                    clearInterval(AutoPlayObj);
                }).mouseout(function (){
                	if(!movelook){
                		AutoPlayObj = setInterval(autorun, options.speed);
                	}
                });
                container.parent().find(options.pre).click(function (){
					run("left")
                });

                container.parent().find(options.next).click(function (){
                	run("right")
                });

            }

            init();

        }
    })
})(jQuery)
