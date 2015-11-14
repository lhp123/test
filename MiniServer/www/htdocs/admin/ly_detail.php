<?php 
include 'include/tools.php';
$POS="detail";
$title = "留言管理";
$prefix = "ly";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/LyAction.php';
$wt = new LyAction($conn,$CID);
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
                    	        &nbsp;标&nbsp;&nbsp;题&nbsp;：<input id="TITLE" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>" class="inputcss" type="text"    noedit />
                    	</td>
                          <td width="48%">
                                                                              联系方式：<input id="TEL" name="TEL" sname="TEL" value="<?php echo $rs["TEL"]?>" class="inputcss" type="text"    noedit  />
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
                        	       留言方式：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="48%">
                                                                            留言日期：<input id="TSDATE" name="TSDATE" sname="TSDATE" value="<?php echo $rs["TSDATE"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                        </tr>
                    </table>
              </td>
            </tr>
               
           <tr>
           	  <td  style="height:220px;">
                	<table >
                    	<tr>
                       	  <td valign="top" align="left" width="">留言内容：</td>
                          <td valign="middle" >
                              <textarea id="CONTENT" name="CONTENT" sname="CONTENT"  style="width:650px; height:300px;border: 0;margin-top:10px;" noedit ><?php echo $rs["CONTENT"]?></textarea>
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