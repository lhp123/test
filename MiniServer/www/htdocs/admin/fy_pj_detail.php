<?php 
include 'include/tools.php';
$POS="detail";
$prefix = "fy_pj";
$title = "房源评价管理";
$fyid = filterParaAllByName("fyid");

$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php?action=lists&fyid=".$fyid;

include 'action/FyPjAction.php';
$fypj = new FyPjAction($conn,$CID);
$fypj->setUrl($redirect_url);
$rs = $fypj->control();

include_once 'head.php';
//$fypj->setDeptJson();
//$fypj->setXqJson();
$fypj->setUserJson();

?>
<div id="main">
<?include_once 'menu.php';?>
  <div id="main_right">
  	<?php echo_title1 ($title);?>
    
 <div id="main_right_main">
    <script type="text/javascript">
    $(document).ready(function(){
    	$("#myform").getRe({
   		 re1: $("#RE1"),
         re2: $("#RE2"),
        	});
   	   /*$("#DISNAME").getUserOrXq({
      		id   :$("#DISID"),
      		json:xq,
      		title:'选择小区',
          	pname:$("#RE2"),
          	ppname:$("#RE1")
	        });
        */
      	$("#USERNAME").getUserOrXq({
          	id:$("#USERID"),
          	json:users,
          	title:'选择经纪人'
          	});
      });
    </script>    
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $rs["CID"]==""?$CID:$rs["CID"] ?>" />
    	<input type="hidden" name="FK_FYID" sname="FK_FYID" value="<?php echo $rs["FK_FYID"]==""?$fyid:$rs["FK_FYID"] ?>" />
    	<!-- fyid参数只用于保存返回url之后,不做数据库保存 -->
    	<input type="hidden" name="fyid"  value="<?php echo $rs["FK_FYID"]==""?$fyid:$rs["FK_FYID"] ?>" />
    	
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table>
                	<tr>
                    	<td width="32%">
                    	  &nbsp;标&nbsp;&nbsp;题&nbsp;：<input id="TITLE" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>"  type="text" class="inputcss" style="width:180px;" />
                    	</td>
                    	
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
           	  <td  style="height:220px;">
                	<table >
                    	<tr>
                       	  <td valign="top" align="left">房源描述：</td>
                          <td valign="middle" ><textarea id="CONTENT" name="CONTENT"  stype="kindeditor"  style="width:600px; height:180px;"><?php echo $rs["CONTENT"]?></textarea>
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
        		<?php //if(checkPriL2($prixg, getUserid())){?>
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	    <?php //}?>
        	    <input id="goback" value="返回列表" type="button" onclick = "window.history.back();"/>
        	
        	</td>
        </tr>
      </table>
       </form>	
    </div>  

      	
      
      
      
      
      
    </div>
  </div>
  </div>
<?include_once 'tail.php';?>