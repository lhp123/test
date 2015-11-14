<!doctype html>
<html >
 <head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/plupload.full.min.js"></script>
	<script type="text/javascript" src="netjs/demo1.min.js"></script>

				<div class="bj_fabu"> 
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">佣金：</span>
						<input type="text" name="cpprice" id="cpprice1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">数 量：</span>
						<input type="text" name="cpnum" id="cpnum1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">产品图片：</span>
						<ul id="ul_pics" class="ul_pics clearfix"></ul>
						<input type="button"  id="btn" value="选择图片" />
						<input type="hidden"  id="imgurl"/>
					</div>
					<div class="bianji">
						<span class="inputTip">产品描述：</span>
						<textarea name="content1" id="content1" style="width:700px;height:400px;visibility:hidden;"></textarea>
					</div>
				</div>

</body>
	<script type="text/javascript">
		var uploader = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'btn', // 上传按钮
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
                        //if ($("#ul_pics1").children("li").length > 30) {
                       //     alert("您上传的图片太多了！");
                       //     uploader.destroy();
                      //  } else {
                       //     var li = '';
                       //     plupload.each(files, function(file) { //遍历文件
                       //         li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
                       //     });
                      //      $("#ul_pics1").append(li);
                            uploader.start();
                        //}
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
						// var percent = file.percent;
                     //   $("#" + file.id).find('.bar').css({"width": percent + "%"});
                      //  $("#" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = JSON.parse(info.response);
                      //  $("#" + file.id).html("<div class='img'><img src='" + data.pic + "'/><input type='button' alt='"+file.id+"' onclick='del(this)' name='"+data.pic+"' value='删除'></div>");
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader.init();
			</script>
</html>