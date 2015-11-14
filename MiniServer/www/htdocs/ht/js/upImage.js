 $(document).ready(function(){

var K = KindEditor.myready(); //获取 KindEditor对象
    // kindediter 编辑器  对带有type='kindeditor'属性的textarea使用编辑器
    
    K.create("#myform textarea[stype='kindeditor']", {
        allowFileManager : true,
        uploadJson : '/admin/kindeditor/php/upload_json.php?updir=KIND',
    });

    
   
    
    
    /* 对带有 stype='mupfile'或者stype='upfile'的input 添加上传图片和查看图片按钮  updir为上传目录 */
    $("#myform input[stype='mupfile'],#myform input[stype='upfile']").each(function (){
    	
        $(this).attr("readonly","readonly").after("<input other ='"+$(this).attr("name")+"' uptype='"+$(this).attr("stype")+"'  type='button' value='上传图片' style='background-color: Transparent; background-image:url(/admin/images/sc2.png); color:#FFF; width:77px; height:25px; border:0px; ' onmouseover=this.style.backgroundImage='url(/admin/images/sc1.png)' onmouseout=this.style.backgroundImage='url(/admin/images/sc2.png)' />"+
                "<input other ='"+$(this).attr("name")+"' stype='showPhoto' value='查看图片' name='' type='button' style='background-color: Transparent; color:#FFF; background-image:url(/admin/images/sc2.png); width:77px; height:25px; border:0px; ' onmouseover=this.style.backgroundImage='url(/admin/images/sc1.png)' onmouseout=this.style.backgroundImage='url(/admin/images/sc2.png)' />"+
                "<input other ='"+$(this).attr("name")+"' stype='delPhoto'  value='删除图片' name='' type='button' style='background-color: Transparent; color:#FFF; background-image:url(/admin/images/sc2.png); width:77px; height:25px; border:0px; ' onmouseover=this.style.backgroundImage='url(/admin/images/sc1.png)' onmouseout=this.style.backgroundImage='url(/admin/images/sc2.png)' />");
	    });
    
    //删除图片
    $("#myform input[stype='delPhoto']").click(function (){
    	objId = $(this).siblings("input[name='"+$(this).attr("other")+"']");
    	var arr= objId.val().trim()==""?[]:objId.val().trim().split(";");
    	if(arr.length>1){
    		$(this).siblings("input[stype='showPhoto']").trigger("click");
    	}else{
    		if(confirm("操作不可恢复,确认要删除图片吗?")){
    			objId.val("");
    		}
    	}
    });
    
    
   // 查看图片 
    
		$("#myform input[stype='showPhoto']").click(function() {
			objId = $(this).siblings("input[name='"+$(this).attr("other")+"']");
		    var arr= objId.val().trim()==""?[]:objId.val().trim().split(";");
		    var body = "";
		    var width,height;
		    
		    for(var i = 0;i<arr.length;i++ ){
		    	body = body + "<li style='float:left;list-style: none;padding-left:5px;'><a href='"+arr[i]+"' target='_blank'><img src='"+arr[i]+"' width='200px' height='150px' /></a><br><span style='float:right;margin-right:20px;'><a class='del' href='javascript:void(0);'>删除</a></span></li>";
	    	}
		    var num = arr.length;
		    if(num<=1){
		    	height = 240;
		    	width = 225;
		    }else if (num<=2){
		    	height=240;
		    	width = 450;
		    }else if (num<=4){
		    	height=400;
		    	width = 450;
		    }else if(num <=6){
		    	height=400;
		    	width = 675;
		    }else if(num <=9){
		    	height=560;
		    	width = 675;
		    }else{
		    	height=570;
		    	width = 860;
		    }
		    
				var dialog = K.dialog({
					width : width,
					height: height,
					title : '照片查看',
					body : '<div id=listphoto style="position:absolute;margin:10px;overflow-y:auto;">'+body+'</div>',
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
							$("#listphoto img").each(function (){
								result.push($(this).attr("src"));
							});
							objId.val(result.join(";"));
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
				$("#listphoto .del").click(function (){
					if(confirm("删除之后将无法恢复,确认删除吗?")) {
						$(this).parents("li").remove();
					}
				});
				
		});
   
    
    // 单个图片上传 
    
	$("#myform input[uptype='upfile']").click(function (){
		var otherobj =  $(this).siblings("input[name='"+$(this).attr("other")+"']");
		var editor = K.editor({
			allowFileManager : true,
			uploadJson : '/admin/kindeditor/php/upload_json.php?updir='+otherobj.attr("updir"),
		});
	   
	    console.log(editor);  //测试上传
	    editor.loadPlugin('image', function() {
	    	
			editor.plugin.imageDialog({
				showRemote : false,
				imageUrl : otherobj.val(),
				clickFn : function(url, title, width, height, border, align) {
					otherobj.val(url);
					editor.hideDialog();
				}
			});
		});
	});

    
    
    // 多图片上传 
       
	$("#myform input[uptype='mupfile']").click(function (){
	   var otherobj =  $(this).siblings("input[name='"+$(this).attr("other")+"']");
	   var arr= otherobj.val().trim()==""?[]:otherobj.val().trim().split(";");
	   if(arr.length>=12){
		   alert("图片数量已达到上限(12张)!");
		   return ;
	   }
	   var editor = K.editor({
			allowFileManager : true,
			uploadJson : '/admin/kindeditor/php/upload_json.php?updir='+otherobj.attr("updir"),
		});
	   
	   console.log(editor); //测试上传
	   editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(urlList) {
					var v = otherobj;
					
					K.each(urlList, function(i, data) {
						
						v.val(v.val()+";" + data.url);
					});
					
					if(v.val().indexOf(";")==0){
					    v.val(v.val().substr(1));
						}
					editor.hideDialog();
				}
			});
		});
	});
	
 });