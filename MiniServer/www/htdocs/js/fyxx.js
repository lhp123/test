	$(function (){
			$("#fyjs_fypj").find("span.pjnr").each(function (){
				var that = $(this);
				if(that.height()>200){
					that.css({
						'height':'200px',
						'overflow': 'hidden',
						
						}).after("<p class='more' >↓查看更多</p>");
					
				}
				
				that.parent().on("click","p.more",function (){
					
					that.css({
						'height':'',
						'overflow': ''
							});
					that.after("<p class='less'>↑收起</p>");
					$(this).remove();
					});
				that.parent().on("click","p.less",function (){
					
					that.css({
						'height':'200px',
						'overflow': 'hidden',
							});
					
					that.after("<p class='more' >↓查看更多</p>");
					$(this).remove();
					});
			});
			
				
				$("#fyjs_fypj").find("ul li:gt(1)").hide();
				$("div.ckqb a").click(function (){
					$("#fyjs_fypj").find("ul li").show();
					$(this).parent().remove();
					});
				
			
			
		
			
			
		})