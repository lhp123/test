$(document).ready(function(e) {
		  var searchform = $("#searchform");
		  var search1 = $("#search1");
		  searchform.find("select").change(function (){
			  checkJjrMohu();
			  searchform.submit();
		  });
			  
		  
		  /*re1 , re2 js*/
		  searchform.find(".dd2[stype='re'] a").click(function (event){
			  	
				  var index = $(this).index();
				  
				  if(index == 0){
					  checkJjrMohu();
					  searchform.find("#re1").val("");
					  searchform.find("#re2").val("");
					  searchform.submit();
				  }
				  $(this).parents("dl").find(".dd2 a").each(function (){
					  var index2 = $(this).index();
					  //alert("index:"+index);
					 // alert("index2:"+index2);
					  var aa = $(this).parents("dl").find("#aa"+index2);
					  if(index !=index2){
						  aa.hide(); 
					  }else{						  
						  if(aa.is(":visible")){
							  aa.hide();
						  }else{
							 // alert(search1.offset().left);
							 // alert(search1.find(".dd1").width());
							  var l = event.pageX - search1.offset().left - search1.find(".dd1").width();
							  
							  aa.find(".apDiv1").css({'left':l}).end().show();
						  }
					}
			 });
				 
			searchform.find(".all_area2 a").click(function(event){
				checkJjrMohu();
				 if($(this).text() =="不限"){					
					 searchform.find("#re1").val($(this).attr("value"));
					 searchform.find("#re2").val("");
				 }else{
					 searchform.find("#re1").val($(this).parents(".all_area2").find("a").first().attr("value"));
					 searchform.find("#re2").val($(this).text());
				 }
				 
				 searchform.submit();
			 }); 
		  });
		  
		  /*qujian  js*/
			searchform.find("dd.dd2[stype='qujian'] a").click(function (){
				//alert("ddd");
				$(this).siblings("#down").val($(this).attr("down"));
				$(this).siblings("#up").val($(this).attr("up"));				

				searchform.submit();
			});
			
			/*dan js*/
			searchform.find("dd.dd2[stype='dan'] a[stype!='paixu']").click(function (){
				$(this).siblings("#dan").val($(this).attr("value"));
				searchform.submit();
			});
			
			/*orderby js*/
			searchform.find("dd.dd2[stype='dan'] a[stype='paixu']").click(function (){
				$(this).siblings("#dan").val($(this).attr("value"));
				var order=$(this).attr("value").split(";");
				searchform.find("#ordern").val(order[0]);	
				searchform.find("#ordert").val(order[1]);
				searchform.submit();
			});
			
			/*dan js*/
			searchform.find("dd.dd2[stype='dan'] a").click(function (){
				$(this).siblings("#dan").val($(this).attr("value"));
				searchform.submit();
			});
			
			/* checkbox js*/
			searchform.find("dd.dd2[stype='dan'] :checkbox").change(function (){
				searchform.find("dd.dd2[stype='dan'] :checkbox").each(function (){
					if($(this).prop("checked")){
						$(this).val(1);
					}
				});
				searchform.submit();	
			});
			
			/*head mohu js*/		
			var mohustr="请输入城区，商圈或小区名......";
			$("#headmohu").keydown(function(event){
				if ( event.keyCode == 13) {
					event.preventDefault();
					if(!($("#headmohu").val()==mohustr || $("#headmohu").val()=="")){
						$("#headsearch").click();
					}
				}
			});
			$("#headmohu").focus(function(){
				if($("#headmohu").val()==mohustr){
					$(this).val("");
				}
			});
			$("#headmohu").blur(function(){		
				if($("#headmohu").val()=="")
					$(this).val(mohustr);
			});
			$("#headsearch,#headsearch_fy").click(function(){		
				var url=""
				var m = $(this).val();
				if(m=="找二手房"){
					url="/mmfy_list.php";
				}else if(m=="找租房"){
					url="/zlfy_list.php";
				}else if(m=="找楼盘"){
					url="/lpdl/lpdl_list.php";
				}else if(m=="找小区"){
					url="/xq/xq_list.php";
				}		
				var mohuval=$.trim($("#headmohu").val());
				if(!(mohuval==mohustr || mohuval=="")){
					if(url.indexOf("mohu")>=0){
						var arr_url=url.split("mohu=");
						url=arr_url[0];
						if(arr_url[1]=="" || arr_url[1].indexOf("&")<0){
							url=url+"mohu="+mohuval;
						}else{
							var arr_url_1=arr_url[1].split("&");
							url=url+"mohu="+mohuval+"&"+arr_url_1[1];
						}
					}else{
						if(url.indexOf("?")>=0) 
							url=url+"&mohu="+mohuval;
						else
							url=url+"?mohu="+mohuval;
					}
					window.location.href=url;	
				}
			});
			
			
			
			$("#search_box2 input[name='mohu']").each(function(){
				if($(this).val()=="")
					$(this).val($(this).attr("title"));
			}).focus(function(){
				if($(this).val()==$(this).attr("title")){
					$(this).val("");
				}
			}).blur(function(){
				if($(this).val()==""){
					$(this).val($(this).attr("title"));
				}
			});
			
			$("#search_box2 input[type='button']").click(function(){
				checkJjrMohu();
				searchform.submit();
			});
			
			function checkJjrMohu(){
				  $mohu_text=$("#search_box2 input[name='mohu']");
				  if($mohu_text.val()==$mohu_text.attr("title")){
					  $mohu_text.val("");
				  }
			}
		  
	  });