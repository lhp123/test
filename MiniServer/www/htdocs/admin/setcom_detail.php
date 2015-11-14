<?php 
include 'include/tools.php';
$POS="detail";
$title="网站信息设置";
$prefix = "setcom";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_detail.php?action=add";


include 'action/ComAction.php';
$com = new ComAction($conn,$CID);
$com->setUrl($redirect_url);
$rs = $com->control();

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
    	
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%"> 
                    	        公司标题：<input id="TITLE1" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    	<td width="48%"> 
                    	        公司地址：<input id="ADDRESS" name="ADDRESS" sname="ADDRESS" value="<?php echo $rs["ADDRESS"]?>" class="inputcss" type="text" size="40"  />
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
                    	        公司名称：<input id="CNAME" name="CNAME" sname="CNAME" value="<?php echo $rs["CNAME"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    	<td width="48%"> 
                    	        名称简写：<input id="NAMEJX" name="NAMEJX" sname="NAMEJX" value="<?php echo $rs["NAMEJX"]?>" class="inputcss" type="text" size="40"  />
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
                    	        公司电话：<input id="TEL" name="TEL" sname="TEL" value="<?php echo $rs["TEL"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    	<td width="48%"> 
                    	        公司备案：<input id="BEIAN" name="BEIAN" sname="BEIAN" value="<?php echo $rs["BEIAN"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td> 
                    	        公司邮箱：<input id="YX" name="YX" sname="YX" value="<?php echo $rs["YX"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    	<td >
                    	         公司网址：<input id="WZ" name="WZ" sname="WZ" value="<?php echo $rs["WZ"]?>" class="inputcss" type="text" size="40"  />
                    	 </td>
                </table>
              </td>
            </tr>
             <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="50%"> 
                    	        版权所有：<input id="BANQUAN" name="BANQUAN" sname="BANQUAN" value="<?php echo $rs["BANQUAN"]?>" class="inputcss" type="text" size="40"  />
                    	</td>
                    	<td > 
                    	        版权所有(eng)：<input id="BANQUAN2" name="BANQUAN2" sname="BANQUAN2" value="<?php echo $rs["BANQUAN2"]?>" class="inputcss" type="text"  style="width:240px;"/>
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
                    	        所 属 市：<input id="CITYNAME" name="CITYNAME" sname="CITYNAME" value="<?php echo $rs["CITYNAME"]?>" class="inputcss" type="text" size="40"  />
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
                    	    &nbsp;QQ&nbsp;客服：
                    	    <?php 
                    	    $QQ = explode(";",$rs["QQ"]);
                    	    for($i=0;$i<5;$i++){
                                echo $QQ[i];
                    	        echo "<input type='text' name='QQ[]' value='".$QQ[$i]."' style='width:120px;'/> ";
                    	    }
                    	    ?>
                    	</td>
                    	
                    </tr>
                </table>
              </td>
            </tr>
             <tr>
              <td>
                <table >
                	<tr> 
                	    <td>
                	                手机二维码：<input id="MBLERWM" name="MBLERWM" sname="MBLERWM" type="upfile" value="<?php echo $rs["MBLERWM"]?>" readonly stype="upfile" updir="ERWM" style="height:23px; width:350px; border:1px #7f9db9 solid;"  type="text" />
                	   </td>
                    </tr>
                </table>
              </td>
            </tr>
             <tr>
              <td>
                <table >
                	<tr> 
                	    <td>
                	        pad二维码&nbsp;：<input id="PADERWM" name="PADERWM" sname="PADERWM" type="upfile" value="<?php echo $rs["PADERWM"]?>" readonly stype="upfile" updir="ERWM" style="height:23px; width:350px; border:1px #7f9db9 solid;"  type="text" />
                	    </td>
                    </tr>
                </table>
              </td>
            </tr>
             <tr>
              <td>
                <table >
                	<tr> 
                	    <td>
                	                微信二维码：<input id="WXERWM" name="WXERWM" sname="WXERWM" type="upfile" value="<?php echo $rs["WXERWM"]?>" readonly stype="upfile" updir="ERWM" style="height:23px; width:350px; border:1px #7f9db9 solid;"  type="text" />
                	     </td>
                    </tr>
                </table>
              </td>
            </tr>
          <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>企业概况：</td>
                    	<td><textarea id="JIANJIE" name="JIANJIE"  stype='kindeditor' cols="" rows="" style="width:400px; height:200px;"><?php echo $rs["JIANJIE"]?></textarea>
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap> 企业文化：</td>
                    	<td><textarea id="WENHUA" name="WENHUA" stype='kindeditor'  cols="" rows="" style="width:400px; height:200px;"><?php echo $rs["WENHUA"]?></textarea>
                    	 </td>
                    </tr>
                </table>
              </td>
            </tr>
             <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>企业荣誉：</td>
                    	<td></td><td><textarea id="RONGYU" name="RONGYU"  stype='kindeditor' cols="" rows="" style="width:400px; height:200px;"><?php echo $rs["RONGYU"]?></textarea>
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>  联系我们：</td>
                    	<td>
                    	   <textarea id="LXWM" name="LXWM" stype='kindeditor'  cols="" rows="" style="width:400px; height:150px;"><?php echo $rs["LXWM"]?></textarea>
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
        	<?php if(ifHasPriL2("1WZGL_2WZXX_3XG")){?>
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	<?php }?>
        	   <!--  <input  value="返回列表" type="button" onclick = "window.history.back();"/>  -->
        	</td>
        </tr>
      </table>
       </form>	
    </div>    	
      
      
    </div>
  </div>
  </div>
<?include 'tail.php';?>