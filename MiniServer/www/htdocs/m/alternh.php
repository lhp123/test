<?
include_once "alterhead.php";

?>
	<script>
	var auth = '<?php echo $_SESSION["auth"] ?>';
function GetUrlParamter(name){
			var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if(r!=null)return  unescape(r[2]); return null;
		}
		var list_id = GetUrlParamter("id");
		$.post("action.php",{action:"getadmindetail",id:list_id,type:"1"},function(data){
			//alert(data);
			var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				$("#cpname1").val(datas.title);
				$("#comm1").val(datas.commission);
				$("#comm2").val(datas.comm2);
				$("#btnwords1").val(datas.btnwords);
				$("#tel1").val(datas.tel);
				if(auth==2){
					document.getElementById("comm1").disabled="disabled";
					document.getElementById("comm2").disabled="disabled";
					document.getElementById("state1").disabled="disabled";
				}
				$("#cpnum1").val(datas.qty);
				//alert(datas.img);
				var imgs = jQuery.parseJSON(datas.img);
				//alert(datas.state);
				switch(eval(datas.state)){
					case 1:
						//alert(datas.state);
						document.getElementById("sh").selected="selected";
						break;
					case 2:
						document.getElementById("fb").selected="selected";
						break;
					case 3:
						document.getElementById("sd").selected="selected";
						break;
					case 4:
						document.getElementById("zx").selected="selected";
						break;
				}
				if(imgs.length>0){
				var li = "<li id='def' name='ul_pics1'><div class='img'><img src='"+imgs[0].img+"'/><input type='button' alt='def' onclick='del(this)' name='"+imgs[0].img+"' value='删除'></div>";
				$("#ul_pics1").append(li);
				}
				$("#content1").val(datas.content);
				
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
			
			}
		});



	</script>
 </head>
 <body style="text-align:center;">

<div id="tabs1-html" class="bj_fabu">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">佣&nbsp;&nbsp;金：</span>
						<input type="text" name="comm" id="comm1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">外部佣金：</span>
						<input type="text" name="comm" id="comm2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">按钮文字：</span>
						<input type="text" name="btnwords" id="btnwords1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">直拨电话：</span>
						<input type="text" name="tel" id="tel1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">数&nbsp;&nbsp;量：</span>
						<input type="number" name="cpnum" id="cpnum1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">状&nbsp;&nbsp;态：</span>
						<select id="state1"  name="state">
							<option id="fb" value="2" style="height:30px;"  />发布</option>
							<option id="sh" value="1" style="height:30px;"  />审核中</option>
							<option id="sd" value="3" style="height:30px;"  />锁定</option>
							<option id="zx" value="4" style="height:30px;"  />注销</option>
					</select>	
					</div>
					<div class="bianji">
						<span class="inputTip">产品图片：</span>
						<div>
						<ul id="ul_pics1" class="ul_pics clearfix"></ul>
						</div>
						<div>
						<input type="button"  id="btn1" value="选择图片" style="margin-top:30px;" />
						</div>
					</div>
					<div style="margin:0 auto; width:60%;">
						<span class="inputTip">产品描述：</span>
						<textarea name="content1" id="content1" style="width:100%;height:400px;visibility:hidden;"></textarea>
					</div>
					<div class="bianji">
					<input type="button"  id="pre_btn1" value="预览" />
					</div>
					<div class="bianji">
					<input type="button" name="button" id="tj_btn1" value="提交内容" />
					</div>
				</div>

</body>
<script type="text/javascript">
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
$("#pre_btn1").click(function(){
	//var id=$(this).attr("name");
	window.open("preview.php?id="+list_id+"&type=1");


});
//var uid= '<?php echo $_SESSION["uid"] ?>';
$("#tj_btn1").click(function(){
			var pid = GetUrlParamter("id");
			var title =  $.trim($("#cpname1").val());
			var commission = $.trim($("#comm1").val());
			var comm2 = $.trim($("#comm2").val());
			var btnwords = $.trim($("#btnwords1").val());
			var tel = $.trim($("#tel1").val());
			var qty = $.trim($("#cpnum1").val());
			var state = $.trim($("#state1").val());
			var content = $.trim($("#content1").val());
			var op=[];
			var divs = document.getElementById("ul_pics1").getElementsByTagName("li");
			if(divs.length>0){
				for(var i=0;i<divs.length;i++){
					var jn = {img:(divs[i].getElementsByTagName("input"))[0].name};
					op.push(jn);
					}
			}
			//alert(JSON.stringify(op));
			if(title==""||qty==""||content==""||btnwords==""||tel==""){
				alert("请填入内容");
				return;
			}else{
				//alert(op+"");
				var data = {title:title,content:content,commission:commission,qty:qty,img:JSON.stringify(op),state:state,pid:pid,comm2:comm2,btnwords:btnwords,tel:tel};
				alter_nh(data);
			}
		});
</script>
</html>