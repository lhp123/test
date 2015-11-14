$(function(){
$.post("action.php",{action:"getclause"},function(data){
			var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				$("#cpname1").val(datas.title);
				var imgs = jQuery.parseJSON(datas.img);
				if(imgs != undefined &&imgs.length>0){
				var li = "<li id='def' name='ul_pics1'><div class='img'><img src='"+imgs[0].img+"'/><input type='button' alt='def' onclick='del(this)' name='"+imgs[0].img+"' value='删除'></div>";
				$("#ul_pics1").append(li);
				}
				$("#content1").val(datas.content);
				$("#summit").attr("mode","1");
				$("#summit").attr("pid",datas.id);
				}else{
				$("#summit").attr("mode","0");
				}
			var editor1 = KindEditor.create('textarea[name="content1"]', {
				cssPath : 'netjs/plugins/code/prettify.css',
				uploadJson : 'upload_json.php',
				fileManagerJson : 'file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					self.sync();
				},
				afterBlur : function() {
					var self = this;
					self.sync();
				}
			});
			

		});

var uploader1 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'btn1', // 上传按钮
                url: "ajax.php", //远程上传地址
                filters: {
                    max_file_size: '1mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                    mime_types: [//允许文件上传类型
                        {title: "files", extensions: "jpg,png,gif"}
                    ]
                },
                multi_selection: false, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        if ($("#ul_pics1").children("li").length > 0) {
                            alert("您上传的图片太多了！");
                            uploader1.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
                                li += "<li id='" + file['id'] + "' name='ul_pics1'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
								
                            });
                            $("#ul_pics1").append(li);
                            uploader1.start();
                        }
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
						 var percent = file.percent;
                        $("#" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = JSON.parse(info.response);
						//alert(data.pic);
                        $("#" + file.id).html("<div class='img'><img src='" + data.pic + "'/><input type='button' alt='"+file.id+"' onclick='del(this)' name='"+data.pic+"' value='删除'></div>");
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader1.init();
			function del(e){
	var pic = e.name;
	var id = e.alt;
	$.ajax({
	 url:"lyajax.php",
	 type:"post",
	 data:{act:"del",df:pic},
	 error: function(){  
            // alert('Error loading XML document');  
         },
	success: function(data,status){//如果调用php成功    
             //alert(data);//解码，显示汉字
			 var data2=jQuery.parseJSON(data);
			// alert("添加成功");
			//alert(data2.success);
			if(data2.success==1){
				var rc =document.getElementById(e.alt);
				//alert(rc.name);
				rc.parentNode.removeChild(rc);
			}else{
				alert("删除不成功");
			}
     }
	});
	
}

$("#summit").click(function(){
var mode = $(this).attr("mode");
var title = $.trim($("#cpname1").val());
var content = $.trim($("#content1").val());
var op=[];
var divs = document.getElementById("ul_pics1").getElementsByTagName("li");
if(divs.length>0){
	for(var i=0;i<divs.length;i++){
		var jn = {img:(divs[i].getElementsByTagName("input"))[0].name};
		op.push(jn);
	}
}
if(eval(mode)==0){
	$.post("action.php",{action:"addclause",title:title,content:content,img:img},function(data){
	var datas = jQuery.parseJSON(data);
	if(datas.success==1){
		alert("success");
		location.reload();
	}else{
		alert("fail");
	}
	});
}else{
	var id= $(this).attr("pid");
	$.post("action.php",{action:"alterclause",title:title,content:content,img:JSON.stringify(op),id:id},function(data){
	var datas = jQuery.parseJSON(data);
	if(datas.success==1){
		alert("success");
		location.reload();
	}else{
		alert("fail");
	}
	});

}

});
});
