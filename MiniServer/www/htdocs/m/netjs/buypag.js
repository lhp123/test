function ram(str){
		if(str.length<9){
			str += Math.floor(Math.random()*10);
			return ram(str);
		}else{
			return str;
		}
	}
		var session_uid = $("#sess_uid").html();
		//var session_uid = "3";
		var session_mp = $("#sess_mp").html();
		if(typeof(Storage) !== "undefine"){
			var	product_num = localStorage.num;
			var	product_id = jQuery.parseJSON(localStorage.product_id);
			var li ="";
			for(var i=0;i<product_id.length;i++){
				var urldet = "http://www.dtdc007.com/m/sharedetail.html?uid="+ram("")+""+session_uid+"&pid="+ram("")+""+product_id[i].id+"&type="+ram("")+""+product_id[i].type;
				li += "<li><div>"+urldet+"</div><a href='#' style='width:70%;text-align:center;' data1='"+urldet+"' data2='http://www.dtdc007.com/m/"+product_id[i].img+"' data3='"+product_id[i].title+"' class='button button-green sharebtn1'><span>分享给朋友</span></a><a href='#' style='width:70%;text-align:center;' data1='"+urldet+"' data2='http://www.dtdc007.com/m/"+product_id[i].img+"' data3='"+product_id[i].title+"' class='button button-red sharebtn2'><span>分享朋友圈</span></a></li>";
				
			}
			$("#link_add").append(li);
			localStorage.clear();
		}
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
		'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
	$(".sharebtn1").click(function(){
		var url = $(this).attr("data1");
		var img = $(this).attr("data2");
		var title = $(this).attr("data3");
		//alert($(this).attr("data1"));
		wx.onMenuShareAppMessage({
      title: title,
      link: url,
      imgUrl: img,
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      }
    });
	alert('请点击浏览器右上角的“发送给朋友”');
	});
	

$(".sharebtn2").click(function(){
		var url = $(this).attr("data1");
		var img = $(this).attr("data2");
		var title = $(this).attr("data3");
		//alert($(this).attr("data1"));
		wx.onMenuShareTimeline({
      title: title,
      link: url,
      imgUrl: img,
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      }
    });
	alert('请点击浏览器右上角的“分享到朋友圈”');
	});
	wx.error(function (res) {

});
  });