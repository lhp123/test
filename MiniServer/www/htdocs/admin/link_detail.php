<?php 
include 'include/tools.php';
$POS="detail";
$title="友情链接管理";
$prefix = "link";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/LinkAction.php';
$link = new LinkAction($conn,$CID);
$link->setUrl($redirect_url);
$rs = $link->control();

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
    	
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table >
                	<tr>
                	    <td> 
                	                链接图片：<input name="SRC" sname="SRC" value="<?php echo $rs["SRC"]?>" stype="upfile" updir="NEWS" style="height:23px; width:350px; border:1px #7f9db9 solid;"  type="text" />
                	     </td>
                    	
                          
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td >
                        	    链接地址：<input name="URL" sname="URL" value="<?php echo $rs["URL"]==""?"http://":$rs["URL"]?>" class="inputcss" type="text"  style="width:300px;" /> 注:链接请以htttp://开头
                        	</td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td align="left" width="700">
                        		链接名称：<input  name="MEMO" sname="MEMO" value="<?php echo $rs["MEMO"]?>" class="inputcss" type="text"  />
                            </td>
                        </tr>
                        
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                           <td align="left" width="700"> 
                                                                           显示顺序：<input  name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text" style="width:50px;"  />
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