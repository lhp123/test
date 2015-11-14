<?
include '../include/tools.php';
$POS="pri";
$prefix = "pri";
$page=$prefix."_list.php";
$redirect_url = "role_list.php";
$detail = $prefix."_detail.php";
$title = "角色管理";

$pri = new PriAction($conn, $CID);
$pri->setUrl($redirect_url);
$action = filterParaAllByName("action");
// echo $action=="save";
if($action=="search"){
	$rs =  $pri->add();
	$cur_pri1 = $rs["PRI1"];
	$cur_pri2 = $rs["PRI2"];
}elseif($action=="save"){
	echo $pri->save();
	return ;
}
include '../head.php';
?>


<div id="main">
  <?include '../menu.php';?>
  <div id="main_right">
    <?php echo_title1 ($title);?>  
    <div id="main_right_main">
    
    <form id= "search" action="<?php echo $page?>" method="get">
      <input type="hidden" name="action" value="search"/>
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>	
      		<td width="5%">           	  
            </td>
      			<td width="100%" style="height:40px;line-height:40px;">      			
      			&nbsp;&nbsp;角色名称：&nbsp;<b><?php echo filterParaByName("rolename")?></b>
      			<input type="hidden" name="rolename" value="<?php echo filterParaByName("rolename")?>" >              
            </td>
        </tr>
      </table>
      </form>	
      
            
      <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $rs["CID"]==""?$CID:$rs["CID"] ?>" />
    	<input type="hidden" name="PRI1" sname="PRI1" id="PRI1"/>
    	<input type="hidden" name="PRI2" sname="PRI2" id="PRI2"/>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">        	
        	<?php 
        		$modelParent = $model->getParents(true);
        		$modelList = $model->getAllModel();
//         		print_r($modelList);
        		foreach ($modelParent as $key=>$val){					
					$a = explode(";", $val);
					$name = $a[1];
					$pri1 = $a[2];
        	?>
        	<tr>
            	<td>
                <table class = "pr1">
                	<tr>
                    	<td width="48%"> 
                    	 <input name="NAME"  value="<?php echo $pri1; ?>" <?php echo ifHasPri($cur_pri1,$pri1,"checked");?> type="checkbox"  />&nbsp;<?php echo $name ?>
                    	 【<a href="javascript:void(0);" name="QUANXUAN_<?php echo $pri1;?>">全选</a>】
                    	 【<a href="javascript:void(0);" name="FANXUAN_<?php echo $pri1;?>">反选</a>】
                    	 </td>                        
                    </tr>
                </table>
              </td>
            </tr>
            <?php 
            	$arr = $modelList[$name];            	
            	foreach($arr as $m=>$v){        
//  echo "<br><br>;".$cur_pri2.";"."<br>;".$v.";(".(strpos(";".$cur_pri2.";",";".$v.";")>0).")"; 	
//  echo "<br><br>;".$v.";(".(strpos(";".$cur_pri2.";",";".$v.";")>0).")";
            ?>
		            <tr>
		            	<td >
		                <table class = "pr2">
		                	<tr>
		                		<td width="10%"> 		                    	         
		                    	 </td>
		                    	<td width="20%">
		                    		&nbsp;<?php echo $m;?>
		                    	 </td>
		                  <?php  if($name=="个人信息管理"){ ?>
		                    	 <td width="70%">
		                    	 	<?php echo_pri_but("M", $v,$cur_pri2);?>
		                    	 </td>
		                  <?php  }elseif($name=="网站管理"){ ?>  
		                  		<td width="70%">
		                  			 <?php  
		                  			 if($m=="网站信息设置"){
		                  			 	echo_pri_but("M", $v,$cur_pri2);
		                  			 }
		                  			 else if($m=="网站优化"){
										echo_pri_but("VAM", $v,$cur_pri2);
									 }
									 else if($m=="网站广告管理"){
									 	echo_pri_but("VM", $v,$cur_pri2);
									 }
									 else if($m=="留言管理"){
									 	echo_pri_but("VD", $v,$cur_pri2);
									 }
		                  			 else{
										echo_pri_but("VAMD", $v,$cur_pri2);
									 }
		                  			 ?>		                    	 	
		                    	 </td>
		                  <?php  }elseif($name=="配置管理"){ ?>  
		                  		<td width="70%">
		                  			 <?php  
		                  			 if($m=="用户配置"){
										echo_pri_but("V", $v,$cur_pri2);
									 }else{
										echo_pri_but("VAMD", $v,$cur_pri2);
									 }
		                  			 ?>		                    	 	
		                    	 </td>
		                  <?php  }elseif($name=="人事管理"){ ?>  
		                  		<td width="70%">
		                  			 <?php  
		                  			 if($m=="用户管理"){
		                  			 	echo_pri_but("VD", $v,$cur_pri2);
		                  			 }else{
										echo_pri_but("VAMD", $v,$cur_pri2);
									 }
		                  			 ?>		                    	 	
		                    	 </td> 
		                  <?php  }elseif($name=="权限管理"){ ?>  
		                  		<td width="70%">
		                  			 <?php  
		                  			 if($m=="角色管理"){
		                  			 	echo_pri_but("VAMD", $v,$cur_pri2);
		                  			 }										
		                  			 ?>		                    	 	
		                    	 </td>  
		                  <?php }elseif($name=="房源管理"){?> 
		                  		<td width="70%">
		                  			<?php 
		                  			if($m=="房源委托信息"||$m=="需求委托信息"||$m=="预约楼盘登记"){
										echo_pri_but("VD", $v,$cur_pri2);
		                  			}else{
			                  			echo_pri_but("A", $v,$cur_pri2);
			                  			echo_pri_but_range("VMD", $v,$cur_pri2);
		                  			}
		                  			?>
		                    	 </td>		                  
		                  <?php }?>
		                    </tr>
		                </table>
		              </td>
		            </tr>  					
  					<?php }?>  					
<?php }?>	  
           
          
            
      </table>
      
      
      
      <div id="fy" style="text-align:center;">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
      	<tr>
        	<td valign="middle">
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	</td>
        </tr>   
      </table>  
      </div>
    </form>
    
  </div>
</div>

<?include '../tail.php';?>

