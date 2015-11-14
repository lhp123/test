

<?include_once 'temhead.php';?> 
<link rel="stylesheet" href="netcss/jquery.mobile-1.4.5.min.css"/>

<script type="text/javascript" src="netjs/plupload.full.min.js"></script>
<style type="text/css">
			.ul_pics li{float:left;width:160px;height:160px;border:1px solid #ddd;padding:2px;text-align: center;margin:0 5px 5px 0;}
            .ul_pics li .img{width: 80%;display: table-cell;vertical-align: middle;}
            .ul_pics li img{width: 100%;vertical-align: middle;}
			.ul_pics li div textarea{width: 100%;vertical-align: middle;}
            .progress{position:relative;padding: 1px; border-radius:3px; margin:60px 0 0 0;} 
            .bar {background-color: green; display:block; width:0%; height:20px; border-radius:3px; } 
            .percent{position:absolute; height:20px; display:inline-block;top:3px; left:2%; color:#fff } 
			input{width:80%;font-size:1.5em;}
			textarea{font-size:1.5em;}
			div{margin-top:1em;}
 </style>
<body>
<div id="title">
<label>标题：</label><br/>
<input id="titleval" name="title"  type="text" placeholder="请输入标题"/>
</div>
<div id="attach">
<label>图片：</label><br/>
<div id="ul_pics" class="ul_pics clearfix"></div>
</div>
<div id="phone">
<label>电话：</label><br/>
<input id="phoneval" name="phone"  type="text" placeholder="请输入电话"/>
</div>
<div id="tips">
<label>点击后提示语：</label><br/>
<input id="tipsval" name="tips"  type="text" placeholder="请输入点击后提示语"/>
</div>
<div id="footer">
<label>页脚：</label><br/>
<input id="footerval" name="footer"  type="text" placeholder="请输入页脚"/>
</div>
<div id="bv">
<label>按钮文字：</label><br/>
<input id="btnval" name="bv"  type="text" placeholder="请输入按钮文字"/>
</div>
<div>
<input type="button"  value="提交" id="summit" onclick="check()" style="margin-bottom:10%;"/>
</div>
<div class="container" style="left:0px; bottom:0px;z-index:2;position: fixed;width:100%;">
<input type="button" value="上传图片" id="btn"/>
</div>
</div>

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
                        if ($("#ul_pics").children("li").length > 30) {
                            alert("您上传的图片太多了！");
                            uploader.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
                                li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
                            });
                            $("#ul_pics").append(li);
                            uploader.start();
                        }
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
                 var percent = file.percent;
                        $("#" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = JSON.parse(info.response);
                        $("#" + file.id).html("<div class='img'><img src='" + data.pic + "'/><textarea rows=5 placeholder='填写图文内容' ></textarea><input type='button' alt='"+file.id+"' onclick='del(this)' name='"+data.pic+"' value='删除'></div>");
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader.init();

function check(){
	var title=document.getElementById("titleval").value;
	var phone=document.getElementById("phoneval").value;
	var bv=document.getElementById("btnval").value;
	var tips=document.getElementById("tipsval").value;
	var footer=document.getElementById("footerval").value;
	if(title==""){
		alert("请填写标题");
		return;
	}
	if(bv==""){
		alert("请填写按钮文字");
		return;
	}
	var op=[];
	var divs = document.getElementById("ul_pics").getElementsByTagName("div");
	if(divs.length>0){
		for(var i=0;i<divs.length;i++){
			var text = (divs[i].getElementsByTagName("textarea"))[0].value;
			text = text.replace(/\n|\r|\t/g,'<br />');
			//alert(text);
			var jn = {img:(divs[i].getElementsByTagName("img"))[0].src,content:text};
			op.push(jn);
		}
	//	alert(JSON.stringify(op));
	}
	else{
		alert(divs.length);
	}
	///alert(op.length);
	$.ajax({
	 url:"lyajax.php",
	 type:"post",
	 data:{act:"temsave",title:title,phone:phone,button:bv,footer:footer,tips:tips,content:JSON.stringify(op)},
	 error: function(){  
            // alert('Error loading XML document');  
         },
	success: function(data,status){//如果调用php成功    
             //alert(data);//解码，显示汉字
			 var data2=jQuery.parseJSON(data);
			// alert("添加成功");
			 window.location.href=data2.link;
     }
	});
}
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
				document.getElementById("ul_pics").removeChild(rc);
			}else{
				alert("删除不成功");
			}
     }
	});
	
}


</script>


 </body>
</html>
