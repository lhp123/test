
<div id="JIEJINGDIV">
<input ID='XQNAME' name='XQNAME' type='hidden'	value="<?=$_REQUEST["name"] ?>">
		
</div>
<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(function (){
	$("#JIEJINGDIV").css({
		width:$("#mapjj",parent.document).width(),
		height:$("#mapjj",parent.document).height()
		});
})
</script>
<script		src="http://map.soso.com/api/v2/main.js?key=a0e9b58abf9bc7fb9da6dfb9ede95171"></script>
<script src="/js/mapjj.js"></script>