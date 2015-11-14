<?php 
include 'include/tools.php';
$POS="detail";
$title = "需求委托信息";
$prefix = "xqwt";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/XqWtAction.php';
$wt = new XqWtAction($conn,$CID);
$wt->setUrl($redirect_url);
$rs = $wt->control();

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
                    	                        联&nbsp;系&nbsp;人：<input id="LINKNAME" name="LINKNAME" sname="LINKNAME" value="<?php echo $rs["LINKNAME"]?>" class="inputcss" type="text"    noedit />
                    	</td>
                          <td width="48%">
                                  &nbsp;&nbsp;电&nbsp;&nbsp;话：<input id="LINKTEL" name="LINKTEL" sname="LINKTEL" value="<?php echo $rs["LINKTEL"]?>" class="inputcss" type="text"    noedit  />
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
                        	        委托类型：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="48%">
                                                                            委托日期：<input id="WTDATE" name="WTDATE" sname="WTDATE" value="<?php echo $rs["WTDATE"]?>" class="inputcss" type="text"   noedit  />
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
                        	        有效日期：<input id="IP" name="IP" sname="IP" value="<?php echo $rs["IP"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                        	<td  width="48%">
                        	        访&nbsp;问&nbsp;IP：<input id="YXQZ_DATE" name="YXQZ_DATE" sname="YXQZ_DATE" value="<?php echo $rs["YXQZ_DATE"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                        </tr>
                    </table>
              </td>
            </tr>
           
               
           <tr>
           	  <td  style="height:220px;">
                	<table >
                    	<tr>
                       	  <td valign="top" align="left" width="">&nbsp;&nbsp;备&nbsp;&nbsp;注：</td>
                          <td valign="middle" >
                              <textarea id="MEMO" name="MEMO" sname="MEMO"  style="width:650px; height:300px;border: 0;margin-top:10px;" noedit ><?php echo $rs["MEMO"]?></textarea>
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
        	<input value="返回列表" type="button" onclick="window.location.href='<?php echo $redirect_url?>';"  />
        	</td>
        </tr>
      </table>
       </form>	
    </div>  
   
    
    
    

      	
      
      
      
      
      
    </div>
  </div>
  </div>
<?include 'tail.php';?>