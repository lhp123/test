<?php session_start();
if(!$_SESSION["usrname"]){
	header("location:login.php");
}
if($_SESSION["auth"]<>2&&$_SESSION["auth"]<>9){
	header("location:index11.php");
}
?>
<!doctype html>
<html >
 <head>
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<meta content="telephone=no" name="format-detection">
	<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/RegLogin.min.js"></script>
	<script type="text/javascript" src="netjs/plupload.full.min.js"></script>
	<link rel="stylesheet" href="netjs/themes/default/default.css" />
	<link rel="stylesheet" href="netjs/plugins/code/prettify.css" />
	<script charset="utf-8" src="netjs/kindeditor.js"></script>
	<script charset="utf-8" src="netjs/lang/zh_CN.js"></script>
	<script charset="utf-8" src="netjs/plugins/code/prettify.js"></script>
	 <script type="text/javascript" src="js/GlobalProvinces_main.js"></script>
<script type="text/javascript" src="js/GlobalProvinces_extend1.js"></script>
<script type="text/javascript" src="js/initLocation.js"></script>
	<title>首页</title>

		 <style>
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  padding: 20px;
  text-align: left;
  font-family: Lato;
  color: #000;
  background: #ffffff;
}

.tabs {
  width: 100%;
  float: none;
  list-style: none;
  position: relative;
  margin: 80px 0 0 10px;
  text-align: left;
}
.tabs li {
  float: left;
  display: block;
}
.tabs input[type="radio"] {
  position: absolute;
  top: -9999px;
  left: -9999px;
}
.tabs label {
  display: block;
  padding: 14px 21px;
  border-radius: 2px 2px 0 0;
  font-size: 20px;
  font-weight: normal;
  text-transform: uppercase;
  background: #eeeeee;
  cursor: pointer;
  position: relative;
  top: 4px;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.tabs label:hover {
  background: #eeeeee;
}
.tabs .tab-content {
  z-index: 2;
  display: none;
  overflow: hidden;
  width: 100%;
  font-size: 17px;
  line-height: 25px;
  padding: 25px;
  position: absolute;
  top: 53px;
  left: 0;
  text-align:center;
  background: #ffffff;
}
.tabs [id^="tab"]:checked + label {
  top: 0;
  padding-top: 17px;
  background: #dddddd;
}
.tabs [id^="tab"]:checked ~ [id^="tab-content"] {
  display: block;
}
  </style>
  	<style type="text/css">
			.ul_pics li{width:160px;height:200px;border:1px solid #ddd;padding:2px;text-align: center;margin:0 5px 5px 0;}
			.ul_pics li .img{width: 160px;height: 140px;display: table-cell;vertical-align: middle;}
            .ul_pics li img{max-width: 160px;max-height: 140px;vertical-align: middle;}
			.ul_pics li div textarea{width: 100%;vertical-align: middle;}
            .progress{position:relative;padding: 1px; border-radius:3px; margin:60px 0 0 0;} 
            .bar {background-color: green; display:block; width:0%; height:20px; border-radius:3px; } 
            .percent{position:absolute; height:20px; display:inline-block;top:3px; left:2%; color:#fff } 
			.bianji input{width:60%;font-size:1.5em;}
			.bianji {margin-top:1em;}
        </style>
 </head>
 <body >
 	


<ul class="tabs">
		<li>
		<input type="radio" name="tabs" id="tab1" checked />
		<label for="tab1">一手楼</label>
			<div class="tab-content" id="tab-content1">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">佣&nbsp;&nbsp;金：</span>
						<input type="text" name="comm" id="comm1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">数&nbsp;&nbsp;量：</span>
						<input type="number" name="cpnum" id="cpnum1" />	
					</div>
					<div class="bianji">
						<span class="inputTip">对外佣金：</span>
						<input type="text" name="commw" id="commw1" />	
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
						<span class="inputTip">产品图片：</span>
						<div>
						<ul id="ul_pics1" class="ul_pics clearfix">
						</ul>
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
					<input type="button" name="button" id="tj_btn1" value="提交内容" />
					</div>
				</div>
		</li>
		<li>
		<input type="radio" name="tabs" id="tab2" />
			<label for="tab2">周全</label>
			<div  class="tab-content" id="tab-content2">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">佣&nbsp;&nbsp;金：</span>
						<input type="text" name="comm" id="comm2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">对外佣金：</span>
						<input type="text" name="commw" id="commw2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">按钮文字：</span>
						<input type="text" name="btnwords" id="btnwords2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">直拨电话：</span>
						<input type="text" name="tel" id="tel2" />	
					</div>
					<div class="bianji">
						<span class="inputTip">产品图片：</span>
						<div>
						<ul id="ul_pics2" class="ul_pics clearfix"></ul>
						</div>
						<div>
						<input type="button"  id="btn2" value="选择图片" style="margin-top:30px;" />
						</div>
					</div>
					<div style="margin:0 auto; width:60%;">
						<span class="inputTip">产品描述：</span>
						
						<textarea name="content2" id="content2" style="width:100%;height:400px;visibility:hidden;"></textarea>
					</div>
					<div class="bianji">
					<input type="button" name="button" id="tj_btn2" value="提交内容" />
					</div>
				</div>
			</li>
			<li>
			<input type="radio" name="tabs" id="tab3" />
			<label for="tab3">二手楼</label>
			<div class="tab-content" id="tab-content3">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">面&nbsp;&nbsp;积：</span>
						<input type="number" name="area" id="area3" />	
					</div>
					<div class="bianji">
                <span class="inputTip">户&nbsp;&nbsp;型：</span>
                    <select id="H_SHI" class="jsqinput08" name="H_SHI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;室&nbsp;
			 <select id="H_TING" class="jsqinput08" name="H_TING">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select>&nbsp;厅&nbsp;
			 <select id="H_WEI" class="jsqinput08" name="H_WEI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;卫
			</div>
					<div class="bianji">
						<span class="inputTip">朝&nbsp;&nbsp;向：</span>
						<select id="DIRECTION" class="jsqinput07" name="DIRECTION">
			<option   class="weituo_border" style="height:30px;"  />向东</option>
			<option  class="weituo_border" style="height:30px;"  />向西</option>
			<option   class="weituo_border" style="height:30px;"  />向南</option>
			<option  class="weituo_border" style="height:30px;"  />向北</option>
			<option   class="weituo_border" style="height:30px;"  />东南</option>
			<option   class="weituo_border" style="height:30px;"  />东西</option>
			<option   class="weituo_border" style="height:30px;"  />东北</option>
			<option   class="weituo_border" style="height:30px;"  />西北</option>
			<option   class="weituo_border" style="height:30px;"  />西南</option>

			</select> 
					</div>
					<div class="bianji">
						<span class="inputTip">年&nbsp;&nbsp;代：</span>
						<input type="number" name="age" id="age3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">装&nbsp;&nbsp;修：</span>
						<input type="text" name="ren" id="ren3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">楼&nbsp;&nbsp;层：</span>
						<input type="text" name="floor" id="floor3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">价&nbsp;&nbsp;格：</span>
						<input type="text" name="price" id="price3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">周边配套：</span>
						<input type="text" name="support" id="support3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">交通路线：</span>
						<select id="sheng" name="province" disabled="true" hidden="hidden" >
	  		 
					</select > 
					
					<select id="shi" name="city" class="jsqinput06">
					 
					</select > 市
					
					<select id="xian" name="country" class="jsqinput06">
				 
					</select> 县/区<br/>
					
					 <select id="xiang" name="street" class="jsqinput06" style="margin:10px auto;">
						 
					</select> 镇/街<br/>
					<input type="text" name="LINKST" id="LINKST" class="jsqinput03" />
					</div>
					<div class="bianji">
						<span class="inputTip">佣&nbsp;&nbsp;金：</span>
						<input type="text" name="comm" id="comm3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">对外佣金：</span>
						<input type="text" name="commw" id="commw3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">按钮文字：</span>
						<input type="text" name="btnwords" id="btnwords3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">直拨电话：</span>
						<input type="text" name="tel" id="tel3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">产品图片：</span>
						<div>
						<ul id="ul_pics3" class="ul_pics clearfix"></ul>
						</div>
						<div>
						<input type="button"  id="btn3" value="选择图片" style="margin-top:30px;" />
						</div>
					</div>
					<div style="margin:0 auto; width:60%;">
						<span class="inputTip">产品描述：</span>
						<textarea name="content3" id="content3" style="width:100%;height:400px;visibility:hidden;"></textarea>
					</div>
					<div class="bianji">
					<input type="button" name="button" id="tj_btn3" value="提交内容" />
					</div>
				</div>
				</li>
	</ul>

	<script type="text/javascript">
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
	</script>
 </body>
</html>