<?php
include 'include/tools.php';    
$POS="detail";
$title="网站广告管理";
$prefix = "adv";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";
include 'action/AdvAction.php';
$adv = new AdvAction($conn,$CID);
$adv->setUrl($redirect_url);
$rs = $adv->control();
$advid=filterParaAllByName("id");
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
    	
    	<table  >
        	<tr>
            	<td >
                <table >
                	<tr>
                	    <td width="48%">
                	                    广告名称：<input id="SRC" name="SRC" sname="SRC" value="<?php echo $rs["SRC"]?>" stype="upfile" updir="PHOTO"  style="height:23px; width:350px; border:1px #7f9db9 solid;"  type="text" />
                         </td>
                    	
                          
                    </tr>
                </table>
              </td>
            </tr>
            <?php 
            if($ifsys==2){
            ?>
                <tr>
                	<td >
                    	<table >
                        	<tr>
                            	<td width="48%">
                            		广告位置：<input id="SYWZ" name="SYWZ" sname="SYWZ"  value="<?php echo $rs["SYWZ"]?>" class="inputcss" type="text" style="width:200px;"  <?php echo $advid==""?"":"readonly";?>/>
                                </td>
                            </tr>
                            
                        </table>
                  </td>
                </tr>
            <?php } ?>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td align="left" width="48%">
                        		类&nbsp;&nbsp;&nbsp;&nbsp;型：<select style="height:27px; padding:3px 3px;width:150px;" id="TYPE" name="TYPE" sname="TYPE">
                                      <option value="图片" <?php echo $rs["TYPE"]=="图片"?"selected":""?>>图片</option>
                                      <option value="FLASH" <?php echo $rs["TYPE"]=="FLASH"?"selected":""?>>FLASH</option>
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
                        	        广告地址：<input id="URL" name="URL" sname="URL" value="<?php echo $rs["URL"]?>" class="inputcss" type="text" style="width:200px;" />
                        	        <font style="color:#F00;"><br>注：外网地址前以http://开头，如：http://www.eallcn.com
                        	        <br>&nbsp;&nbsp;&nbsp;&nbsp;网站内地址请以/开头，如：/xq/xq_list.php
                        	        </font>
                        	</td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td align="left" width="48%">
                        	        宽&nbsp;&nbsp;&nbsp;&nbsp;度：<input id="WIDTH" name="WIDTH" sname="WIDTH" <?php echo $ifsys!=2?"readonly":""?> value="<?php echo $rs["WIDTH"]?>" class="inputcss" type="text" style="width:80px;" />
                            </td>
                        </tr>
                        
                    </table>
              </td>
            </tr>
             <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td align="left" width="48%">
                        	        高&nbsp;&nbsp;&nbsp;&nbsp;度：<input id="HEIGHT" name="HEIGHT" sname="HEIGHT" <?php echo $ifsys!=2?"readonly":""?> value="<?php echo $rs["HEIGHT"]?>" class="inputcss" type="text"style="width:80px;" />
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
                          <table>
                          	<tr>
                            	<td align="left" width="48%"> 
                            	        显示顺序：<input id="TABORDER" name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text" style="width:80px;"  />
                            	</td>
                            </tr>
                          </table>
                          </td>
                          
                        </tr>
                        
                    </table>
                </td>
                
            </tr>
           <tr>
            	<td >
                	<table>
                    	<tr>
                        	<td nowrap >
                        	    备&nbsp;&nbsp;&nbsp;&nbsp;注：<input id="MEMO" name="MEMO" sname="MEMO" value="<?php echo $rs["MEMO"]?>" class="inputcss" type="text" style="width:200px;" />
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