<?php 
include '../include/tools.php';
$POS="detail";
$title="角色管理";
$prefix = "role";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";


$role = new RoleAction($conn,$CID);
$role->setUrl($redirect_url);
$rs = $role->control();

$roleid=filterParaAllByName("id");
include_once '../head.php';

?>

<div id="main">
<?include '../menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
    
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
                    	           角色名称：<input id="NAME" name="NAME" sname="NAME" value="<?php echo $rs["NAME"]?>" class="inputcss" type="text"  style="width:270px;" <?php echo $roleid==""?"":"readonly";?>/>
                    	 </td>                        
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	   角色类型： <select name="TYPE" sname="TYPE" style="height:27px; padding:3px 3px;width:90px;">
		                  					<option value="">角色选择</option>
	                        	    		<option value="管理员"  <?php echo "管理员"==$rs["TYPE"]?"selected":""; ?>>管理员</option>
	                        	    		<option value="系统用户"  <?php echo "系统用户"==$rs["TYPE"]?"selected":""; ?>>系统用户</option>
	                        	    		<option value="注册用户"  <?php echo "注册用户"==$rs["TYPE"]?"selected":""; ?>>注册用户</option>
                 					</select>
                        	</td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	     &nbsp;备&nbsp;&nbsp;注&nbsp;：<input  name="MEMO" sname="MEMO" value="<?php echo $rs["MEMO"]?>" class="inputcss" type="text"  />
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