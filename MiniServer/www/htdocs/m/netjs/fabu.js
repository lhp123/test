var auth =  '<?php echo $_SESSION["auth"] ?>';
	$(function(){initLocation({sheng:"sheng",shi:"shi",xian:"xian",xiang:"xiang",sheng_val:"广东",shi_val:"广州",xian_val:"广州市",xiang_val:"--"});
	if(auth!=9){
		document.getElementById("comm1").disabled="disabled";
		document.getElementById("comm2").disabled="disabled";
		document.getElementById("comm3").disabled="disabled";
		document.getElementById("commw1").disabled="disabled";
		document.getElementById("commw2").disabled="disabled";
		document.getElementById("commw3").disabled="disabled";
	}
	
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

			var uploader2 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'btn2', // 上传按钮
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
                        if ($("#ul_pics2").children("li").length > 0) {
                            alert("您上传的图片太多了！");
                            uploader2.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
                                li += "<li id='" + file['id'] + "' name='ul_pics1'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
								
                            });
                            $("#ul_pics2").append(li);
                            uploader2.start();
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
            uploader2.init();

			var uploader3= new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'btn3', // 上传按钮
                url: "ajax.php", //远程上传地址
                filters: {
                    max_file_size: '1mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                    mime_types: [//允许文件上传类型
                        {title: "files", extensions: "jpg,png,gif"}
                    ]
                },
                multi_selection: true, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        if ($("#ul_pics3").children("li").length > 30) {
                            alert("您上传的图片太多了！");
                            uploader3.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
                                li += "<li id='" + file['id'] + "' name='ul_pics1'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
								
                            });
                            $("#ul_pics3").append(li);
                            uploader3.start();
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
            uploader3.init();

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


		$("#tj_btn1").click(function(){
			var title =  $.trim($("#cpname1").val());
			var commission = $.trim($("#comm1").val());
			var comm2 = $.trim($("#commw1").val());
			var btnwords = $.trim($("#btnwords1").val());
			var tel = $.trim($("#tel1").val());
			var qty = $.trim($("#cpnum1").val());
			var content = $.trim($("#content1").val());
			var op=[];
			var divs = document.getElementById("ul_pics1").getElementsByTagName("li");
			if(divs.length>0){
				for(var i=0;i<divs.length;i++){
					var jn = {img:(divs[i].getElementsByTagName("input"))[0].name};
					op.push(jn);
					}
			}
			if(title==""||qty==""||content==""||btnwords==""||tel==""){
				alert("请填入内容");
				return;
			}else{
				//alert(op+"");
				var data = {title:title,content:content,commission:commission,qty:qty,img:JSON.stringify(op),comm2:comm2,btnwords:btnwords,tel:tel};
				fabu_nh(data);
			}
		});
		$("#tj_btn2").click(function(){
			var title =  $.trim($("#cpname2").val());
			var commission = $.trim($("#comm2").val());
			var content = $.trim($("#content2").val());
			var comm2 = $.trim($("#commw2").val());
			var btnwords = $.trim($("#btnwords2").val());
			var tel = $.trim($("#tel2").val());
			var op=[];
			var divs = document.getElementById("ul_pics2").getElementsByTagName("li");
			if(divs.length>0){
				for(var i=0;i<divs.length;i++){
					var jn = {img:(divs[i].getElementsByTagName("input"))[0].name};
					op.push(jn);
					}
			}
			if(title==""||content==""||btnwords==""||tel==""){
				alert("请填入内容");
				return;
			}else{
				alert(JSON.stringify(op));
				var data = {title:title,content:content,commission:commission,img:JSON.stringify(op),comm2:comm2,btnwords:btnwords,tel:tel};
				fabu_mor(data);
			}
		});
		$("#tj_btn3").click(function(){
			var title =  $.trim($("#cpname3").val());
			var commission = $.trim($("#comm3").val());
			var content = $.trim($("#content3").val());
			var comm2 = $.trim($("#commw3").val());
			var btnwords = $.trim($("#btnwords3").val());
			var tel = $.trim($("#tel3").val());
			var layout =  $.trim($("#H_SHI").val())+"室"+$.trim($("#H_TING").val())+"厅"+$.trim($("#H_WEI").val())+"卫";
			var area = $.trim($("#area3").val());
			var orientation = $.trim($("#DIRECTION").val());
			var age = $.trim($("#age3").val());
			var renaration = $.trim($("#ren3").val());
			var orientation = $.trim($("#DIRECTION").val());
			var floor = $.trim($("#floor3").val());
			var price = $.trim($("#price3").val());
			var supporting = $.trim($("#support3").val());
			var traffic = $.trim($("#sheng").val())+"省"+$.trim($("#shi").val())+"市"+$.trim($("#xian").val())+$.trim($("#xiang").val())+$.trim($("#LINKST").val());
			var op=[];
			var divs = document.getElementById("ul_pics3").getElementsByTagName("li");
			if(divs.length>0){
				for(var i=0;i<divs.length;i++){
					var jn = {img:(divs[i].getElementsByTagName("input"))[0].name};
					op.push(jn);
					}
			}
			if(title==""||content==""||area==""||age==""||renaration==""||orientation==""||floor==""||price==""||supporting==""||btnwords==""||tel==""){
				alert("请填入内容");
				return;
			}else{
				var data = {title:title,content:content,commission:commission,img:JSON.stringify(op),layout:layout,area:area,orientation:orientation,floor:floor,price:price,supporting:supporting,traffic:traffic,renaration:renaration,age:age,comm2:comm2,btnwords:btnwords,tel:tel};
				fabu_shh(data);
			}
		});
		
	</script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
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
			prettyPrint();
		});
		KindEditor.ready(function(K) {
			var editor2 = K.create('textarea[name="content2"]', {
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
			prettyPrint();
		});
		KindEditor.ready(function(K) {
			var editor3 = K.create('textarea[name="content3"]', {
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
			prettyPrint();
		});