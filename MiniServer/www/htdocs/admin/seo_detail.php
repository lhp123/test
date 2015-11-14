<?php 
include 'include/tools.php';
$POS="detail";
$title="网站优化";
$prefix = "seo";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/SeoAction.php';
$seo = new SeoAction($conn,$CID);
$seo->setUrl($redirect_url);
$rs = $seo->control();

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
                    	<td width="38"> 
                    	        模块类型：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" <?php echo $ifsys!=2?"readonly":""?> class="inputcss" type="text" />
                    	</td>
                          
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="60" >
                        	        模块名称：<input id="POSITION" name="POSITION" sname="POSITION" value="<?php echo $rs["POSITION"]?>" <?php echo $ifsys!=2?"readonly":""?> class="inputcss" type="text"  />
                        	</td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
              <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="60" >
                        	        内容类型：<input id="NAME" name="NAME" sname="NAME" value="<?php echo $rs["NAME"]?>" <?php echo $ifsys!=2?"readonly":""?> class="inputcss" type="text"  />
                        	</td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
            
               
           <tr>
           	  <td>
                	<table >
                    	<tr>
                       	  <td valign="top" align="left">内&nbsp;&nbsp;&nbsp;&nbsp;容：</td>
                          <td valign="middle" >
                                  <textarea id="CONTENT" name="CONTENT" sname="CONTENT"  cols="" rows=""   style="width:650px; height:150px;margin-top:10px;"><?php echo $rs["CONTENT"]?></textarea>
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
   
    
    
    
<!-- <div id="outerdiv" style="position:absolute;top:0;left:0;background:rgba(0,0,0,0.7);width:100%;height:100%;display:none;">     -->    
<div id="showdiv" style="display:none;  position:absolute;  border:#CCC 1px solid; background:#fafafa; " >
<table width="100%" cellpadding="0" cellspacing="0">
	<tr style="background:#0080b5; border-bottom:#CCC 1px solid;">
		<td align="left"><input type="checkbox" id="btnALL" /><span id="btnALL1">全选</span></td>
    	<td align="right" valign="middle" style="  line-height:35px; height:35px;">
    	
    	<input type='button' value='确定' id="btnOK" />
        <input type='button' value='清空' id="btnCLR" />
        <input type='button' value='关闭' id="btnCLS" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="showSelt">
</table>
</div>
<div id = "seltdiv" style="display:none;  position:absolute;  font-size:14px;border:#CCC 1px solid; background:#fafafa; "></div>
  
      	
      
      
      
      
      
    </div>
  </div>
  </div>
<?include 'tail.php';?>