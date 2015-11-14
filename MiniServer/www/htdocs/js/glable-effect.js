cityname = "天津市";
function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('#gotop').click(function(){
		$(document).scrollTop(0);	
	})
});

$(window).scroll(function(e){
	b();		
})
function getBg(num){
		for(var id = 0;id<=8;id++)
		{
			if(id==num)
			{
				document.getElementById("mynav"+id).className="current";
			}
			else
			{
				document.getElementById("mynav"+id).className="";
			}
		}
	}

function setValue(obj,vdownn,vdown,vupn,vup){
	if(document.getElementById(vdownn)){
		document.getElementById(vdownn).value=vdown;
	}
	if(document.getElementById(vupn)){
		document.getElementById(vupn).value=vup;
	}
}
$(document).ready(function(e){
	$("li,input[type='button'],area").focus(function(){
		this.blur();
	});
	$("a,area").attr("href",function(){
		if(this.href.indexOf("#")==this.href.length-1||this.href==""){
			this.href="javascript:void(0)";
		}
	});
	

	
	
	
	
	
});

function changeTab(tabid,selectedClass){
	$("#"+tabid+">ul:eq(0)>li").click(function(){		
		$("#"+tabid+">ul:eq(0)>li").removeClass(selectedClass);
		$(this).addClass(selectedClass);
		$("#"+tabid+">div>div").attr("style","display:none;");
		$("#"+tabid+">div>div:eq("+$(this).index()+")").attr("style","display:block;");
	});
}
