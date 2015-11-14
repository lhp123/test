<?php 
include '../include/tools.php';
$POS="detail";
$title="模块管理";
$prefix = "model";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";


$model = new ModelAction($conn, $CID);
$model->setUrl($redirect_url);
$rs = $model->control();

include_once '../head.php';

?>

<div id="main">
<?include '../menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
    <script type="text/javascript">
	$(function (){
		$("#LEVEL").change(function (){
			if($(this).val()=="1"){
				$("#myform tr.level").hide();
			}else if($(this).val()=="2"){
				$("#myform tr.level").show();
			};
			
		}).trigger("change");
	})
    </script>
    <div id="main_right_main">
    <input  id ='json' type='hidden' value = "<?php echo $rs["js"]?>"/>
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $rs["CID"]==""?$CID:$rs["CID"] ?>" />
    	
    	<table >
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%"> 
                    	           模块名称：<input name="NAME" sname="NAME" value="<?php echo $rs["NAME"]?>" class="inputcss" type="text"  style="width:270px;" />
                    	 </td>
                        
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%"> 
                    	           权限名称：<input name="PRINAME" sname="PRINAME" value="<?php echo $rs["PRINAME"]?>" class="inputcss" type="text"  style="width:270px;" />
                    	 </td>
                        
                    </tr>
                </table>
              </td>
            </tr>
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%"> 
                    	  &nbsp;&nbsp;等&nbsp;&nbsp;级：<select id="LEVEL" name="LEVEL" sname="LEVEL" class="selectcss">
                        	     		<option value="1"  <?php echo 1==$rs["LEVEL"]?"selected":""; ?>>一级</option>
                        	     		<option value="2"  <?php echo 2==$rs["LEVEL"]?"selected":""; ?>>二级</option>
                        	     	</select>
                    	 </td>
                        
                    </tr>
                </table>
              </td>
            </tr>
           
            <tr class="level">
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	   &nbsp;&nbsp;链&nbsp;&nbsp;接：<input  name="LINK" sname="LINK" value="<?php echo $rs["LINK"]?>" class="inputcss" type="text" style="width:300px;" />注:与代码相关,一般不要修改!
                        	</td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
             <tr class="level">
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	     一级标题：
                        	     <select name="PARENT" sname="PARENT" class="selectcss">
                        	     <option value="-1"  selected>-=请选择=-</option>
                        	     <?php 
                        	     	$arr = $model->getParents(true);
                        	     	foreach ($arr as $val){
										$a = split(";",$val );
										$value = $a[0];
										$name = $a[1];
                        	     ?>
                        	     		<option value="<?php echo $value;?>"  <?php echo $value==$rs["PARENT"]?"selected":""; ?>><?php echo $name;?></option>                        	     		
                        	     <?php }?>
                        	     </select>
                        	</td>                           
                        </tr>
                    </table>
              </td>
            </tr>
              
             <tr >
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	     显示顺序：<input  name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text"  />
                        	</td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
            
            
           
          
            
      </table>
      <div id="fy" style="text-align:center;">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
      	<tr>
        	<td valign="middle">
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	    <input  value="返回列表" type="button" onclick = "window.history.back();"/>
        	</td>
        </tr>
      </table>
       </form>	
    </div>        
      
      
      
    </div>
  </div>
  </div>
<?include '../tail.php';?>