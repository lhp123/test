$(function (){
	
	/*function list */
	$("#search .search").click(function(){
		$("#search").submit();
	}).mouseover(function(){
	    $(this).css("backgroundImage","url(/admin/images/search2.png)");
		   
	}).mouseout(function(){
		$(this).css("backgroundImage","url(/admin/images/search.png)");
	});
	
	$("#search select").change(function (){
		$("#search").submit();
	});
	$("#search select[stype='qujian']").change(function (){
		$(this).siblings("#up").val($(this).find("option:selected").attr("up"));
		$(this).siblings("#down").val($(this).find("option:selected").attr("down"));
		$("#search").submit();
	});
	
	$("#search input[type='text']").keydown(function (event){
		if ( event.which == 13 ) {
		    event.preventDefault();
		    $("#search").submit();
		  }
		}).focus();
	
	
	
	
	
	$("#myform > table > tbody > tr ").each(function (){
        $(this).children("td").removeClass("n_b");
        $(this).children("td").removeClass("n_y");
        
        if($(this).index()%2==0){
        	$(this).children("td").addClass("n_y");
	    }
	    if($(this).index()%2==1){
	    	   $(this).children("td").addClass("n_b"); 
	     }
	    //设置 td 下table css 样式
	    $(this).find("table").attr({'width':'100%','border':'0','cellpadding':'0','cellspacing':'0'});
	    
	    
	});
	$("#fy input").attr({
    	'style':'background-color: Transparent; color:#FFF;  background-image:url(/admin/images/sub1.png); width:86px; height:30px; line-height:30px; margin-top:8px; border:0px;',
    	'onmouseover':'this.style.backgroundImage="url(/admin/images/sub2.png)"',
    	'onmouseout':'this.style.backgroundImage="url(/admin/images/sub1.png)"'
    });
	  function submit() { 
	        
	    	$('#myform table.pr1 input:checkbox').each(
	    			function(){
	    				if(this.checked){
	    					$("#PRI1").val($("#PRI1").val()+";"+$(this).val());
	    				}	    				
	    			});
	    	$('#myform table.pr2 input:checkbox').each(
	    			function(){
	    				if(this.checked&&this.value!=""&&this.name!="RANGE"){
	    					$("#PRI2").val($("#PRI2").val()+";"+$(this).val());
	    				}
	    				if(this.checked&&this.name=="RANGE"){
							$("#myform table.pr2 select>option[name='"+$(this).val()+"']").each(
									function(){
										if(this.selected){
											$("#PRI2").val($("#PRI2").val()+";"+$(this).val());
										}
									}
							);
	    				}

	    			}
	    	);
	    	
	    	var param = [];
	    	$('#myform :input[sname]').each(function(){
	    		param.push($(this).attr('sname'));
	    	});
	    	$('#sname').val(param.join(';'));
	    	
	        return true; 
	    }
	  
	  
	  
	  
	    $("#myform input[type=submit]").bind("submit",submit); 
	    $("#myform   #submit").bind("click",submit); 


		$("#myform table a[name*='QUANXUAN_']").click(function(){
			var namepri=$(this).attr("name");
			namepri=namepri.split("_")[1];
			$("#myform table input[value*='"+namepri+"']:checkbox").each(function(){
				this.checked=true;
			});
		});

		$("#myform table a[name*='FANXUAN_']").click(function(){
			var namepri=$(this).attr("name");
			namepri=namepri.split("_")[1];
			$("#myform table input[value*='"+namepri+"']:checkbox").each(function(){
				this.checked=!this.checked;
			});		

		});
	
	
})