<?php 

/**
 * 列表页面 的title_box1 
 * @param unknown_type $title
 * @param unknown_type $prefix
 * @param unknown_type $flag
 */
function echo_title_box1($title,$prefix,$params="",$flag = "1",$ifpri=1){
    echo "<div id='title_box1'>
      	<div id='title_box1_left'>
        <table border='0' cellpadding='0' cellspacing='0'>
        	<tr>
            	<td valign='middle'><img src='".$GLOBALS["adminpath_"]."images/ico2.png' width='16' height='20' style='margin-right:10px;'/></td>
                <td valign='middle'>".$title."</td>
            </tr>
        </table></div>
        <div id='title_box1_right'>";
        if($flag =="1"&&$ifpri){
        	echo " <input value='增加' type='button' onclick=location.href='".$prefix."_detail.php?action=add".$params."' class='add' />";
        }
       echo" </div>
      </div>
      <div id='line_zw'></div>";
}



function echo_title1 ($title){
    echo "	<div id='wz'><!-- <a href='javascript:void(0);'>后台首页</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href='javascript:void(0);'>".$title."</a> --></div>
    <div id='title1'>
   	  <div id='title_box1'>
      	<div id='title_box1_left'>
        <table border='0' cellpadding='0' cellspacing='0'>
        	<tr>
            	<td valign='middle'><img src='".$GLOBALS["adminpath_"]."images/ico3.png' width='22' height='22' style='margin-right:10px;' /></td>
                <td valign='middle'>".$title."详情</td>
            </tr>
        </table></div>
      </div> 
    <div id='line_zw'></div></div>";
    
}

/**
 * 权限选择框
 * VAMD
 * V 查看
 * A 添加
 * M 修改
 * D 删除
 * @param unknown_type $buts
 */
function echo_pri_but($buts,$pri2,$pri2all=""){
	$buts=strtoupper($buts);
	for($i=0;$i<strlen($buts);$i++){
		if($buts[$i]=="V"){
			echo "<input name='NAME'  value='".$pri2."_3CK' ".ifHasPri($pri2all,$pri2."_3CK","checked")." type='checkbox'/>查看";				
		}	
		if($buts[$i]=="A"){
			echo "<input name='NAME'  value='".$pri2."_3TJ' ".ifHasPri($pri2all,$pri2."_3TJ","checked")." type='checkbox'/>添加";
		}
		if($buts[$i]=="M"){
			echo "<input name='NAME'  value='".$pri2."_3XG' ".ifHasPri($pri2all,$pri2."_3XG","checked")." type='checkbox'/>修改";				
		}
		if($buts[$i]=="D"){
			echo "<input name='NAME'  value='".$pri2."_3SC' ".ifHasPri($pri2all,$pri2."_3SC","checked")." type='checkbox'/>删除";
		}
	}
}

/**
 * 权限选择框
 * VMD
 * V 查看
 * M 修改
 * D 删除
 * @param unknown_type $buts
 */
function echo_pri_but_range($buts,$pri2,$pri2all=""){
	$buts=strtoupper($buts);
	for($i=0;$i<strlen($buts);$i++){
		if($buts[$i]=="V"){
			echo "<input name='RANGE'  value='".$pri2."_3CK' ".ifHasPriMohu($pri2all,$pri2."_3CK","checked")." type='checkbox'/>查看";
			echo "<select class='selectcss'>";
			echo "<option name='".$pri2."_3CK' value='".$pri2."_3CKBR' ".ifHasPri($pri2all,$pri2."_3CKBR","selected")." >本人</option>";
			echo "<option name='".$pri2."_3CK' value='".$pri2."_3CKSY' ".ifHasPri($pri2all,$pri2."_3CKSY","selected")." >所有</option>";
			echo "</select>";
		}
		if($buts[$i]=="M"){
			echo "<input name='RANGE'  value='".$pri2."_3XG' ".ifHasPriMohu($pri2all,$pri2."_3XG","checked")." type='checkbox'/>修改";
			echo "<select class='selectcss'>";
			echo "<option name='".$pri2."_3XG' value='".$pri2."_3XGBR' ".ifHasPri($pri2all,$pri2."_3XGBR","selected")." >本人</option>";
			echo "<option name='".$pri2."_3XG' value='".$pri2."_3XGSY' ".ifHasPri($pri2all,$pri2."_3XGSY","selected")." >所有</option>";
			echo "</select>";
		}
		if($buts[$i]=="D"){
			echo "<input name='RANGE'  value='".$pri2."_3SC' ".ifHasPriMohu($pri2all,$pri2."_3SC","checked")." type='checkbox'/>删除";
			echo "<select class='selectcss'>";
			echo "<option name='".$pri2."_3SC' value='".$pri2."_3SCBR' ".ifHasPri($pri2all,$pri2."_3SCBR","selected")." >本人</option>";
			echo "<option name='".$pri2."_3SC' value='".$pri2."_3SCSY' ".ifHasPri($pri2all,$pri2."_3SCSY","selected")." >所有</option>";
			echo "</select>";
		}
	}
}

?>