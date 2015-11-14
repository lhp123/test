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
		$.post("action.php",{action:"getadmindetail",id:list_id,type:"3"},function(data){
			//alert(data);
			var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				$("#cpname3").val(datas.title);
				$("#comm3").val(datas.commission);
				$("#area3").val(datas.area);
				$("#age3").val(datas.age);
				$("#ren3").val(datas.renaration);
				$("#floor3").val(datas.floor);
				$("#price3").val(datas.price);
				$("#support3").val(datas.supporting);
				$("#comm2").val(datas.comm2);
				$("#btnwords1").val(datas.btnwords);
				$("#tel1").val(datas.tel);
				if(auth==2){
					document.getElementById("comm3").disabled="disabled";
					document.getElementById("state1").disabled="disabled";
					document.getElementById("comm2").disabled="disabled";
				}
				//alert(datas.img);
				var imgs = jQuery.parseJSON(datas.img);
				//alert(imgs.length);
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
				if(datas.orientation=="向东")
					document.getElementById("ea").selected="selected";
				else if(datas.orientation=="向西")
					document.getElementById("we").selected="selected";
				else if(datas.orientation=="向南")
					document.getElementById("so").selected="selected";
				else if(datas.orientation=="向北")
					document.getElementById("no").selected="selected";
				else if(datas.orientation=="东南")
					document.getElementById("es").selected="selected";
				else if(datas.orientation=="东北")
					document.getElementById("en").selected="selected";
				else if(datas.orientation=="西北")
					document.getElementById("wn").selected="selected";
				else if(datas.orientation=="西南")
					document.getElementById("ws").selected="selected";
				if(imgs.length>0){
					var li ="";
					for(var i=0;i<imgs.length;i++){
					li += "<li id='"+i+"' name='ul_pics1'><div class='img'><img src='"+imgs[i].img+"'/><input type='button' alt='"+i+"' onclick='del(this)' name='"+imgs[i].img+"' value='删除'></div>";
				}
				//alert(li);
				$("#ul_pics3").append(li);
				}else{
					//alert(imgs.length);
				}
				var s = (datas.layout).substr(0,1);
				var t = (datas.layout).substr(2,1);
				var w = (datas.layout).substr(4,1);
				switch(eval(s)){
					case 0:
						//alert(datas.state);
						document.getElementById("s0").selected="selected";
						break;
					case 1:
						//alert(datas.state);
						document.getElementById("s1").selected="selected";
						break;
					case 2:
						document.getElementById("s2").selected="selected";
						break;
					case 3:
						document.getElementById("s3").selected="selected";
						break;
					case 4:
						document.getElementById("s4").selected="selected";
						break;
					case 5:
						document.getElementById("s5").selected="selected";
						break;
				}
				switch(eval(t)){
					case 0:
						//alert(datas.state);
						document.getElementById("t0").selected="selected";
						break;
					case 1:
						//alert(datas.state);
						document.getElementById("t1").selected="selected";
						break;
					case 2:
						document.getElementById("t2").selected="selected";
						break;
					case 3:
						document.getElementById("t3").selected="selected";
						break;
					case 4:
						document.getElementById("t4").selected="selected";
						break;
					case 5:
						document.getElementById("t5").selected="selected";
						break;
				}
				switch(eval(w)){
					case 0:
						//alert(datas.state);
						document.getElementById("w0").selected="selected";
						break;
					case 1:
						//alert(datas.state);
						document.getElementById("w1").selected="selected";
						break;
					case 2:
						document.getElementById("w2").selected="selected";
						break;
					case 3:
						document.getElementById("w3").selected="selected";
						break;
					case 4:
						document.getElementById("w4").selected="selected";
						break;
					case 5:
						document.getElementById("w5").selected="selected";
						break;
				}
				var sheng = (datas.traffic).substr(0,2);
				var shi = (datas.traffic).substr(3,2);
				var xian = (datas.traffic).substr(6,3);
				var xiang = (datas.traffic).substr(9,2);
				var street =  (datas.traffic).substr(11);
				$(function(){initLocation({sheng:"sheng",shi:"shi",xian:"xian",xiang:"xiang",sheng_val:sheng,shi_val:shi,xian_val:xian,xiang_val:xiang});});
				$("#support3").val(datas.supporting);

				$("#LINKST").val(street);
				$("#content3").val(datas.content);
				
			var editor1 = KindEditor.create('textarea[name="content3"]', {
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
 <div class="bj_fabu" id="tabs1-css">
					<div class="bianji">
						<span class="inputTip">产品名称：</span>
						<input type="text" name="cpname" id="cpname3" />	
					</div>
					<div class="bianji">
						<span class="inputTip">状&nbsp;&nbsp;态：</span>
						<select id="state1"  name="state">
							<option id="fb" value="2" style="height:30px;"  />发布</option>
							<option id="sh" value="1" style="height:30px;"  />审核中</option>
							<option id="sd" value="3" style="height:30px;"  />锁定</option>
							<option id="zx" value="4" style="height:30px;"  />注销</option>
					</select>
					<div class="bianji">
						<span class="inputTip">面&nbsp;&nbsp;积：</span>
						<input type="number" name="area" id="area3" />	
					</div>
					<div class="bianji">
                <span class="inputTip">户&nbsp;&nbsp;型：</span>
                    <select id="H_SHI" class="jsqinput08" name="H_SHI">
			<option id="s0"  class="weituo_border" style="height:30px;"  />0</option>
			<option id="s1"  class="weituo_border" style="height:30px;"  />1</option>
			<option id="s2" class="weituo_border" style="height:30px;"  />2</option>
			<option id="s3"  class="weituo_border" style="height:30px;"  />3</option>
			<option id="s4" class="weituo_border" style="height:30px;"  />4</option>
			<option id="s5"  class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;室&nbsp;
			 <select id="H_TING" class="jsqinput08" name="H_TING">
			<option id="t0"  class="weituo_border" style="height:30px;"  />0</option>
			<option id="t1"  class="weituo_border" style="height:30px;"  />1</option>
			<option id="t2" class="weituo_border" style="height:30px;"  />2</option>
			<option id="t3"  class="weituo_border" style="height:30px;"  />3</option>
			<option id="t4" class="weituo_border" style="height:30px;"  />4</option>
			<option id="t5"  class="weituo_border" style="height:30px;"  />5</option>
			</select>&nbsp;厅&nbsp;
			 <select id="H_WEI" class="jsqinput08" name="H_WEI">
			<option id="w0"  class="weituo_border" style="height:30px;"  />0</option>
			<option id="w1"  class="weituo_border" style="height:30px;"  />1</option>
			<option id="w2" class="weituo_border" style="height:30px;"  />2</option>
			<option id="w3"  class="weituo_border" style="height:30px;"  />3</option>
			<option id="w4" class="weituo_border" style="height:30px;"  />4</option>
			<option  id="w5" class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;卫
			</div>
					<div class="bianji">
						<span class="inputTip">朝&nbsp;&nbsp;向：</span>
						<select id="DIRECTION" class="jsqinput07" name="DIRECTION">
			<option id="ea"  class="weituo_border" style="height:30px;"  />向东</option>
			<option id="we" class="weituo_border" style="height:30px;"  />向西</option>
			<option id="so"  class="weituo_border" style="height:30px;"  />向南</option>
			<option id="no" class="weituo_border" style="height:30px;"  />向北</option>
			<option id="es"  class="weituo_border" style="height:30px;"  />东南</option>
			<option  id="ew" class="weituo_border" style="height:30px;"  />东西</option>
			<option  id="en" class="weituo_border" style="height:30px;"  />东北</option>
			<option  id="wn" class="weituo_border" style="height:30px;"  />西北</option>
			<option  id="ws" class="weituo_border" style="height:30px;"  />西南</option>

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
						<span class="inputTip">产品图片：</span>
						<div style="width:100%;">
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
					<input type="button"  id="pre_btn1" value="预览" />
					</div>
					<div class="bianji">
					<input type="button" name="button" id="tj_btn3" value="提交内容" />
					</div>
				</div>
<script type="text/javascript">

var uploader1 = new plupload.Uploader({//创建实例的构造方法
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
						
                        if ($("#ul_pics3").children("li").length > 0) {
                            alert("您上传的图片太多了！");
                            uploader1.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
								
                                li += "<li id='" + file['id'] + "' name='ul_pics1'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
								
                            });
                            $("#ul_pics3").append(li);
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
						
						
                        $("#" + file.id).html("<div class='img'><img src='" + data.pic + "'/><input type='button' alt='"+file.id+"' onclick='del(this)' name='"+data.pic+"' value='删除'></div>");
						//alert(data.pic);
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
	window.open("preview.php?id="+list_id+"&type=3");
});

$("#tj_btn3").click(function(){
			var pid = GetUrlParamter("id");
			var state = $.trim($("#state1").val());
			var title =  $.trim($("#cpname3").val());
			var commission = $.trim($("#comm3").val());
			var content = $.trim($("#content3").val());
			
			var layout =  $.trim($("#H_SHI").val())+"室"+$.trim($("#H_TING").val())+"厅"+$.trim($("#H_WEI").val())+"卫";
			var area = $.trim($("#area3").val());
			var orientation = $.trim($("#DIRECTION").val());
			var age = $.trim($("#age3").val());
			var renaration = $.trim($("#ren3").val());
			var orientation = $.trim($("#DIRECTION").val());
			var floor = $.trim($("#floor3").val());
			var price = $.trim($("#price3").val());
			var supporting = $.trim($("#support3").val());
			var comm2 = $.trim($("#comm2").val());
			var btnwords = $.trim($("#btnwords1").val());
			var tel = $.trim($("#tel1").val());
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
				var data = {title:title,content:content,commission:commission,img:JSON.stringify(op),layout:layout,area:area,orientation:orientation,floor:floor,price:price,supporting:supporting,traffic:traffic,renaration:renaration,age:age,pid:pid,state:state,comm2:comm2,btnwords:btnwords,tel:tel};
				//alert(JSON.stringify(data));
				alter_shh(data);
			}
		});
</script>

</body>
</html>