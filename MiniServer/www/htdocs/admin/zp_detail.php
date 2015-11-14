<?php 

include 'include/tools.php';
$POS="detail";
$title="智能招聘";
$prefix = "zp";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";


include 'action/ZpAction.php';
$zp = new ZpAction($conn,$CID);
$zp->setUrl($redirect_url);
$rs = $zp->control();

include 'head.php';
?>
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
    	<table >
        	<tr>
            	<td>
                <table>
                	<tr>
                    	<td width="48%"> 招聘标题：<input id="TITLE" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>" class="inputcss" type="text"  /></td>
                       <td align="left" width="48%">
                        		招聘类型：<select id="TYPE" name="TYPE" sname="TYPE"   class="selectcss"  onchange = 'selectDis();'/>
                        		                <option value= '' >请选择招聘类型</option>
                        		    <?php 
                        		        $stmt = mysql_query("SELECT * FROM PZ_PROFILE WHERE TYPE='招聘类型' and CID = '".$CID."'",$conn);
                        		        while ($rs_TYPE = mysql_fetch_array($stmt)){
                                             echo "<option value='".$rs_TYPE ["NAME"]."'".($rs_TYPE["NAME"]==$rs["TYPE"]?"selected":"").">".$rs_TYPE['NAME']."</option>";   
                                        }
                        		    ?>
                        		</select>
                            </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table>
                    	<tr>
                        	<td width="48%" >
                        	        发布时间：<input id="FBDATE" name="FBDATE" sname="FBDATE" value="<?php echo $rs["FBDATE"]?>" onClick="WdatePicker()" class="inputcss" type="text"  />
                        	 </td>
                            <td width="48%" >
                                                                        有效期至：<input id="YXDATE" name="YXDATE" sname="YXDATE" value="<?php echo $rs["YXDATE"]?>" onClick="WdatePicker()" class="inputcss" type="text" style="width:80px;"  />
                            </td>
                        </tr>
                    </table>
              </td>
            </tr>
         
               
           <tr>
           	  <td>
                	<table>
                    	<tr>
                       	  <td valign="top" align="left">岗位职责：</td>
                          <td valign="middle" ><textarea id="DUTY" name="DUTY"  cols="" rows="" stype='kindeditor' style="width:650px; height:200px;"><?php echo $rs["DUTY"]?></textarea>
                          </td>
                          
                        </tr>
                        
                    </table>
                </td>
                
            </tr>
             <tr>
           	  <td>
                	<table>
                    	<tr>
                       	  <td valign="top" align="left">任职要求：</td>
                          <td valign="middle" >
                                  <textarea id="ZIGE" name="ZIGE"   stype='kindeditor' style="width:650px; height:200px;"><?php echo $rs["ZIGE"]?></textarea>
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
<?include 'tail.php';?>