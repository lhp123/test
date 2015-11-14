<?php 
include 'include/tools.php';
$POS="detail";
$title = "小区价格";
$prefix = "dis_price";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/XqPriceAction.php';
$xqprice = new XqPriceAction($conn,$CID);
$xqprice->setUrl($redirect_url);
$rs = $xqprice->control();

include_once 'head.php';
$xqprice->setXqJson();

?>
<script type="text/javascript">
$(document).ready(function(){ 
    $("#PNAME").getUserOrXq({
        id   :$("#DISID"),
        json :xq
        });
});
</script>
<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
    
    <div id="main_right_main">
    <input  id ='json' type='hidden' value = "<?php echo $rs["js"]?>"/>
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $CID ?>" />
    	
    	<table  width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%" > 
                    	                        小区名称：<input id="PNAME" name="PNAME"  value="<?php echo $rs["PNAME"]?>" class="inputcss" type="text"     />
                    	                   <input  type="hidden" id="DISID" name="DISID" sname="DISID" value="<?php echo $rs["DISID"]?>" />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                            <td  width="48%">
                                 &nbsp;&nbsp; 类&nbsp;&nbsp;型:<select id="TYPE" name="TYPE" sname="TYPE" class="selectcss" style="width:100px;">
                                                                      <option value="出租" <?php echo $rs["TYPE"]=="出租"?"selected":""?>>出租</option>
                                                                      <option value="出售" <?php echo $rs["TYPE"]=="出售"?"selected":""?>>出售</option>
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
                          <td width="48%">
                                &nbsp;&nbsp;价&nbsp;&nbsp;格：<input id="AVGPRICE" name="AVGPRICE" sname="AVGPRICE" value="<?php echo $rs["AVGPRICE"]?>" class="inputcss" type="text" /> 
                               
                          </td>
                    </tr>
                </table>
              </td>
            </tr>
            
            
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="48%">
                        	       &nbsp;&nbsp;日&nbsp;&nbsp;期：<input id="P_DATE" name="P_DATE" sname="P_DATE" value="<?php echo $rs["P_DATE"]?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="inputcss" type="text"     />
                        	</td>
                        	
                        </tr>
                    </table>
              </td>
            </tr>
           
      </table>
      <div id="fy" style="text-align:center;">
      <table border="0" align="left" cellpadding="0" cellspacing="0">
      	<tr align="left">
      	   
        	<td  >
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
<?include 'tail.php';?>