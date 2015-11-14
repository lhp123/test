<?include_once 'INCLUDE.php'; ?>

<?include_once 'temhead.php';?> 
<link rel="stylesheet" href="netcss/jquery.mobile-1.4.5.min.css"/>
<script type="text/javascript" src="netjs/jquery.mobile-1.4.5.min.js"/>
<form>
<div>
<label>标题：</label>
<input id="title" name="title"  type="text" placeholder="请输入标题"/>
</div>


</form>

<div class="drop" id="drop" style="left:0px; bottom:0px;z-index:2;position: fixed;width:100%;">
	  <div>
<input type="hidden" value="save" name="act" id="act"/>
<img src="netimages/phone26.png" style="width:auto;float:left;margin:10px 0px 10px 10px;height:44px;"><input type="number" name="TEL" id="TEL" style="height:40px;margin:10px 0px 10px 0px;width:80%;font-size:1em;float:left;border:1px soild #000000;" placeholder="请先输入手机号" />
</div>
<a href="#" onclick="check();" style="width:80%;float:left;text-align:center; "  class="button green serif round">我要迷宫券</a>
</div>
<script type="text/javascript">

</script>


 </body>
</html>
