<?
include 'include/tools.php';
$POS="list";
$prefix = "pt_sub";
$page=$prefix."_list.php";
$title = "普通配置";

include 'action/PtSubAction.php';
$news = new PtAction($conn,$CID);
$ptype = filterParaByName("ptype");
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
                <td width="200" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>名称</strong></td>
                <td width="137" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>显示顺序</strong></td>
                <td width="109" height="35" align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php 
            
            $stmt = $listPage->query();
            
            while ( $rs = mysql_fetch_array ( $stmt ) ) {
                echo "<tr>";
                echo "<input type='hidden' name='id'  value='".$rs["ID"]."' />";
                echo "<input type='hidden' name='name' value='".$rs["NAME"]."' />";
                echo "<input type='hidden' name='taborder' value='".$rs["TABORDER"]."' />";
                echo "<td   class='table_x'>".$rs["NAME"]."</td>";
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
        <td><input  name="PTYPE" value="<?php echo $ptype ?>" type="text" readonly/></td>
    </tr>
    <tr>
        <td width="80px">类型:</td>
        <td><input  name="TYPE" value="<?php echo $type ?>" type="text" readonly/></td>
    </tr>
    <tr>
        <td>名称:</td>
        <td><input id="name" name="NAME" sname="NAME" type="text" /></td>
    </tr>
    <tr>
        <td>显示顺序:</td>
        <td><input id="taborder" name="TABORDER" sname="TABORDER" type="text"/></td>
    </tr>
    
</table>

</div>
<script type="text/javascript">
$(document).ready(function (){


    function dialog(){
        var _this = $(this);
        var dialog = $("#dialog");
        if(_this[0].tagName=="SPAN"){
            _this = $(this).parents("tr");
            }
        if(_this.is(".add")){
        	dialog.find("#id").attr('value',"");
            dialog.find("#name").attr('value',"");
            dialog.find("#taborder").attr('value',"");
            
         }else{
        	 var id = _this.find("input[name='id']").val();
             var name = _this.find("input[name='name']").val();
             var taborder = _this.find("input[name='taborder']").val();
             dialog.find("#id").attr('value',id);
             dialog.find("#name").attr('value',name);
             dialog.find("#taborder").attr('value',taborder);
             }
    	
        var body = $("#dialog").html();
        var K = KindEditor.myready();
		var dialog = K.dialog({
			width : 300,
			height: 200,
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
		$("#main_right_main_lb table tr .db3").click(function(){
			window.parent.location.href="pz_sub_list.php?type=<?php echo $type;?>";
		});
			
});

</script>
</body>
</html>