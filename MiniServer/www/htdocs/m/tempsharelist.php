<html>
<head>
	<meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
	<meta charset="utf-8"> 
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
	<meta content="yes" name="apple-mobile-web-app-capable"> 
	<meta content="black" name="apple-mobile-web-app-status-bar-style"> 
	<meta content="telephone=yes" name="format-detection">
	<link rel="stylesheet" type="text/css" href="netcss/jquery.mobile-1.4.5.min.css" />
	<script src="netjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"></script>
	<script type="application/javascript" src="netjs/tools.js"> </script>
</head>
<body>
<div data-role="page" >
<div data-role="header"><a href="houtai.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-home" data-ajax="false">主页</a><span class="ui-title"></span></div>
  <div data-role="content">
    <ul data-role="listview" data-inset="true" id="sharelinklist">
    </ul>
  </div>

</div>
<script>
var type=GetRequest()["type"];
$.post("tempaction.php",{action:"gettempsharelist",type:type},function(data){
		var datas = jQuery.parseJSON(data);
			if(datas.success == 1){
				var arr = datas.data;
				var html = "";
				for(var i=0; i<arr.length; i++){
					var title=arr[i].title;
					if(title.length>20){
						title = title.substr(0,19)+"...";
					}
					var qty=arr[i].qty;
					
					html +="<li><a class='share' href='#' name='tempsharelink.php?id="+arr[i].pid+"&type="+type+"'>"+title+"<span class='ui-li-count'>"+qty+"</span></a></li>";
				}
				$("#sharelinklist").append(html);
				$("#sharelinklist").listview("refresh");
				$("#sharelinklist").addClass("ui-corner-top");
				$("#sharelinklist").addClass("ui-corner-bottom");
				$(".share").click(function(){
					var url = $(this).attr("name");
					location.href=url;
				
				});
			}
			
		});
</script>
</body>
</html>