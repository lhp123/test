<?php 
include 'include/tools.php';
$POS="detail";
$title = "用户配置";
$prefix = "pz_users";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/PzUserAction.php';
$dept = new PzUserAction($conn,$CID);
$dept->setUrl($redirect_url);
$rs = $dept->control();

include_once 'head.php';
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
    	
    	<table  width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%" > 
                    	                        用户类型：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" class="inputcss" type="text"   readonly  />
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
                        	       出售房源条数：<input id="MMFYNUM" name="MMFYNUM" sname="MMFYNUM" value="<?php echo $rs["MMFYNUM"]?>" class="inputcss" type="text"     />
                        	</td>
                            <td  width="48%">
                                                                          出售房源有效期  ：<input id="MMFYYXDATE" name="MMFYYXDATE" sname="MMFYYXDATE" value="<?php echo $rs["MMFYYXDATE"]?>" class="inputcss" type="text"     />
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
                        	      出售需求条数：<input id="MMXQNUM" name="MMXQNUM" sname="MMXQNUM" value="<?php echo $rs["MMXQNUM"]?>" class="inputcss" type="text"     />
                        	</td>
                            <td  width="48%">
                                                                        出售需求有效期：<input id="MMXQYXDATE" name="MMXQYXDATE" sname="MMXQYXDATE" value="<?php echo $rs["MMXQYXDATE"]?>" class="inputcss" type="text"     />
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
                        	      出租房源条数：<input id="ZLFYNUM" name="ZLFYNUM" sname="ZLFYNUM" value="<?php echo $rs["ZLFYNUM"]?>" class="inputcss" type="text"     />
                        	</td>
                            <td  width="48%">
                                                                        出租房源有效期：<input id="ZLFYYXDATE" name="ZLFYYXDATE" sname="ZLFYYXDATE" value="<?php echo $rs["ZLFYYXDATE"]?>" class="inputcss" type="text"     />
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
                        	      出租需求条数：<input id="ZLXQNUM" name="ZLXQNUM" sname="ZLXQNUM" value="<?php echo $rs["ZLXQNUM"]?>" class="inputcss" type="text"     />
                        	</td>
                            <td  width="48%">
                                                                        出租需求有效期：<input id="ZLFYYXDATE" name="ZLFYYXDATE" sname="ZLFYYXDATE" value="<?php echo $rs["ZLFYYXDATE"]?>" class="inputcss" type="text"     />
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