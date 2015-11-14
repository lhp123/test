<?
include 'include/tools.php';
$POS="list";
$prefix = "qj";
$page=$prefix."_list.php";
$title = "普通配置";

include 'action/QjAction.php';
$news = new QjAction($conn,$CID);
$type = filterParaByName("type");
$news->setUrl($page."?type=".$type);
$action = filterParaByName("action");
if($action=="save"||$action=="del"){
    return $news->control();
}else {
    $listPage = $news->control();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/lbcss.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/list.js" type="text/javascript"></script>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>

</head>

<body style="background:#FFFFFF;width:auto;" id="main_right_main_lb" >
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
                <td width="150" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>名称</strong></td>
                <td width="80" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>上限</strong></td>
                <td width="80" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>下限</strong></td>
                <td width="70" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>显示顺序</strong></td>
                <td width="150" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php 
            
            $stmt = $listPage->query();
            
            while ( $rs = mysql_fetch_array ( $stmt ) ) {
                echo "<tr>";
                echo "<input type='hidden' name='id'  value='".$rs["ID"]."' />";
                echo "<input type='hidden' name='memo' value='".$rs["MEMO"]."' />";
                echo "<input type='hidden' name='up' value='".$rs["UP"]."' />";
                echo "<input type='hidden' name='down' value='".$rs["DOWN"]."' />";
                echo "<input type='hidden' name='taborder' value='".$rs["TABORDER"]."' />";
                echo "<td   class='table_x'>".$rs["MEMO"]."</td>";
                echo "<td   class='table_x'>".$rs["UP"]."</td>";
                echo "<td   class='table_x'>".$rs["DOWN"]."</td>";
                echo "<td   class='table_x'>".$rs["TABORDER"]."</td>";
                echo "<td   class='table_x'>";
                if(ifHasPriL2("1PZGL_2PTPZ_3XG")){
                	echo "<A href='javascript:void(0);'><span class='db2'>修改</span></a>&nbsp;&nbsp;";
                }                
                if(ifHasPriL2("1PZGL_2PTPZ_3SC")){
                	echo "<a href='".$detail."?action=del&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删除</A>";
                }
                echo "</td>" ;        
                echo "</tr>";
            }
            
            ?>
        </table>
       <?php $listPage->getPageBar3();?>

<div id="dialog" style="display:none;">

<table >
    <input type="hidden" id="sname" name="sname"/>
    <input id="id" name="id"  type="hidden"/>
    <tr>
        <td width="80px">类型:</td>
        <td><input name="TYPE" value="<?php echo $type ?>" type="text" readonly/></td>
    </tr>
    <tr>
        <td>名称:</td>
        <td><input id="memo" name="MEMO" sname="MEMO" type="text" value="dfddff"/></td>
    </tr>
    <tr>
        <td>上限:</td>
        <td><input id="up" name="UP" sname="UP" type="text" value="dfddff"/></td>
    </tr>
    <tr>
        <td>下限:</td>
        <td><input id="down" name="DOWN" sname="DOWN" type="text" value="dfddff"/></td>
    </tr>
    <tr>
        <td>显示顺序:</td>
        <td><input id="taborder" name="TABORDER" sname="TABORDER" type="text"/></td>
    </tr>
    
</table>

</div>
<script type="text/javascript">
$(document).ready(function (){

	function  dialog(){
	     var _this = $(this);
	     var dialog = $("#dialog");
	        if(_this[0].tagName=="SPAN"){
	            _this = $(this).parents("tr");
	          }
	        if(_this.is(".add")){
	        	dialog.find("#id").attr('value',"");
		        dialog.find("#memo").attr('value',"");
		        dialog.find("#up").attr('value',"");
		        dialog.find("#down").attr('value',"");
		        dialog.find("#taborder").attr('value',"");
		        }else{
		        	var id   = _this.find("input[name='id']").val();
			        var memo = _this.find("input[name='memo']").val();
			        var up   = _this.find("input[name='up']").val();
			        var down = _this.find("input[name='down']").val();
			        var taborder = _this.find("input[name='taborder']").val();

			        dialog.find("#id").attr('value',id);
			        dialog.find("#memo").attr('value',memo);
			        dialog.find("#up").attr('value',up);
			        dialog.find("#down").attr('value',down);
			        dialog.find("#taborder").attr('value',taborder);
			        }  
	        
	        var body = $("#dialog").html();
	        var K = KindEditor.myready();
			var dialog = K.dialog({
				width : 300,
				height: 250,
				title : '修改详细',
				body : '<div id=listphoto style="position:absolute;margin:10px;overflow-y:auto;"><form id="myform" >'+body+'</form></div>',
				closeBtn : {
					name : '关闭',
					click : function(e) {
						dialog.remove();
					}
				},
				yesBtn : {
					name : _this.is(".add")?'添加':'修改',
					click : function(e) {
						var param = [];
						$('#myform :input[sname]').each(function(){
				    		param.push($(this).attr('sname'));
				    	});
				    	$('#myform #sname').val(param.join(';'));
						$.post("<?php echo $page?>?action=save", $("#myform").serialize(),
								   function(data){
								       dialog.remove();
							           self.location.reload();
								 });
						
					}
				},
				noBtn : {
					name : '关闭',
					click : function(e) {
						dialog.remove();
					}
				}
			});
		}
	$("#main_right_main_lb table tr").bind('dblclick',dialog);
	$("#main_right_main_lb table tr .db2").bind('click',dialog);	
	$(".add",parent.document).attr("onclick","").bind("click",dialog);		
			
});

</script>
</body>
</html>