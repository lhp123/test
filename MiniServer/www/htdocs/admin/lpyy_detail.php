<?php 
include 'include/tools.php';
$POS="detail";
$title = "预约楼盘登记";
$prefix = "lpyy";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";
include_once 'head.php';
include 'action/LpyyAction.php';
$plyy = new LpyyAction($conn,$CID);
$plyy->setUrl($redirect_url);
$rs = $plyy->control();

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
                    	<td width="33%" >
                    	             楼盘名称：<input id="LPNAME" name="LPNAME" sname="LPNAME" value="<?php echo $rs["LPNAME"]?>" class="inputcss" type="text"    noedit />
                    	</td>
                       <td width="66%">
                          <input id="IF_TG" name="IF_TG" sname="IF_TG" <?php echo $rs["IF_TG"]=="1"?"checked":""?> value="<?php echo $rs["IF_TG"]?>" type="checkbox" noedit />团购
                          <input id="IF_GY" name="IF_GY" sname="IF_GY" <?php echo $rs["IF_GY"]=="1"?"checked":""?> value="<?php echo $rs["IF_GY"]?>" type="checkbox"  noedit/>购邮寄楼书给我
                          <input id="IF_DZYJ" name="IF_DZYJ" sname="IF_DZYJ" <?php echo $rs["IF_DZYJ"]=="1"?"checked":""?> value="<?php echo $rs["IF_DZYJ"]?>" type="checkbox" noedit />电子邮寄联系
                          <input id="IF_TEL" name="IF_TEL" sname="IF_TEL" <?php echo $rs["IF_TEL"]=="1"?"checked":""?> value="<?php echo $rs["IF_TEL"]?>" type="checkbox" noedit />电话联系
                          <input id="IF_XC" name="IF_XC" sname="IF_XC" <?php echo $rs["IF_XC"]=="1"?"checked":""?> value="<?php echo $rs["IF_XC"]?>" type="checkbox" noedit />现场看房
                       </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="33%">
                        	    &nbsp;&nbsp;姓&nbsp;&nbsp;名：<input id="KHNAME" name="KHNAME" sname="KHNAME" value="<?php echo $rs["KHNAME"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="33%">
                                &nbsp;&nbsp;性&nbsp;&nbsp;别：<input id="SEX" name="SEX" sname="SEX" value="<?php echo $rs["SEX"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                             <td  width="33%">
                                 &nbsp;&nbsp;年&nbsp;&nbsp;龄：<input id="AGE" name="AGE" sname="AGE" value="<?php echo $rs["AGE"]?>" class="inputcss" type="text"   noedit  />
                             </td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="33%">
                        	    &nbsp;&nbsp;手&nbsp;&nbsp;机：<input id="SHOUJI" name="SHOUJI" sname="SHOUJI" value="<?php echo $rs["SHOUJI"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="33%">
                                &nbsp;&nbsp;Q&nbsp;&nbsp;Q&nbsp;&nbsp;：<input id="QQ" name="QQ" sname="QQ" value="<?php echo $rs["QQ"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                             <td  width="33%">
                                 &nbsp;&nbsp;邮&nbsp;&nbsp;箱：<input id="EMAIL" name="EMAIL" sname="EMAIL" value="<?php echo $rs["EMAIL"]?>" class="inputcss" type="text"   noedit  />
                             </td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="33%">
                        	        邮政编码：<input id="YZBM" name="YZBM" sname="YZBM" value="<?php echo $rs["YZBM"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="66%">
                                                                        通讯地址：<input id="TXDZ" name="TXDZ" sname="TXDZ" value="<?php echo $rs["TXDZ"]?>" class="inputcss" type="text" style="width:400px;"  noedit  />
                            </td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="33%">家庭电话：<input id="KHTEL" name="KHTEL" sname="KHTEL" value="<?php echo $rs["KHTEL"]?>" class="inputcss" type="text"   noedit  /></td>
                            <td  width="66%">录入时间：<input id="INPUT_DATE" name="INPUT_DATE" sname="INPUT_DATE" value="<?php echo $rs["INPUT_DATE"]?>" class="inputcss" type="text"   noedit  /></td>
                        </tr>
                    </table>
              </td>
            </tr>
           <tr>
           	  <td  style="height:220px;">
                	<table >
                    	<tr>
                       	  <td valign="top" align="left" width="">客户留言：</td>
                         <td valign="middle" >
                             <textarea id="CONTENT" name="CONTENT" sname="CONTENT"  style="width:650px; height:200px;border: 0;margin-top:10px;" noedit ><?php echo $rs["CONTENT"]?></textarea>
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
        	    <input  value="返回列表" type="button" onclick="window.location.href='<?php echo $redirect_url?>';"  />
        	</td>
        </tr>
      </table>
       </form>	
    </div>  
   
      
    </div>
  </div>
  </div>
<?include 'tail.php';?>