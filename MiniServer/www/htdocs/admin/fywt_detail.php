<?php 
include 'include/tools.php';
$POS="detail";
$title = "房源委托信息";
$prefix = "fywt";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/FyWtAction.php';
$wt = new FyWtAction($conn,$CID);
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
                    	<td width="33%" > 
                    	        联&nbsp;系&nbsp;人：<input id="LINKNAME" name="LINKNAME" sname="LINKNAME" value="<?php echo $rs["LINKNAME"]?>" class="inputcss" type="text"    noedit />
                    	</td>
                        <td width="33%">
                           &nbsp;&nbsp;电&nbsp;&nbsp;话：<input id="LINKTEL" name="LINKTEL" sname="LINKTEL" value="<?php echo $rs["LINKTEL"]?>" class="inputcss" type="text"    noedit  />
                        </td>
                        <td width="33%">
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
                        	<td  width="33%">
                        	        委托类型：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="33%">
                                                                        行&nbsp;政&nbsp;区：<input id="RE1" name="RE1" sname="RE1" value="<?php echo $rs["RE1"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                            <td  width="33%">
                              &nbsp;&nbsp;小&nbsp;&nbsp;区：<input id="DISNAME" name="DISNAME" sname="DISNAME" value="<?php echo $rs["DISNAME"]?>" class="inputcss" type="text"  noedit  />
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
                        	   &nbsp;&nbsp;面&nbsp;&nbsp;积：<input id="AREA" name="AREA" sname="AREA" value="<?php echo $rs["AREA"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="33%">
                                                                        房屋价格：<input id="PRICE" name="PRICE" sname="PRICE" value="<?php echo $rs["PRICE"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                            <td  width="33%">
                                &nbsp;&nbsp;户&nbsp;&nbsp;型：
                                    <input id="H_SHI" name="H_SHI" sname="H_SHI" value="<?php echo $rs["H_SHI"]?>" class="inputcss" type="text" style="border: 0;width:20px;"  noedit  />室
                                    <input id="H_TING" name="H_TING" sname="H_TING" value="<?php echo $rs["H_TING"]?>" class="inputcss" type="text" style="border: 0;width:20px;"  noedit  />厅
                                    <input id="H_WEI" name="H_WEI" sname="H_WEI" value="<?php echo $rs["H_WEI"]?>" class="inputcss" type="text" style="border: 0;width:20px;"  noedit  />卫
                            
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
                        	        建筑年代：<input id="JZ_YEAR" name="JZ_YEAR" sname="JZ_YEAR" value="<?php echo $rs["JZ_YEAR"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="33%">
                                                                        装修情况：<input id="FITMENT" name="FITMENT" sname="FITMENT" value="<?php echo $rs["FITMENT"]?>" class="inputcss" type="text"   noedit  />
                            </td>
                            <td  width="33%">
                                &nbsp;&nbsp;朝&nbsp;&nbsp;向：<input id="DIRECTION" name="DIRECTION" sname="DIRECTION" value="<?php echo $rs["DIRECTION"]?>" class="inputcss" type="text"   noedit  />
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
                        	            房屋用途：<input id="PURPOSE" name="PURPOSE" sname="PURPOSE" value="<?php echo $rs["PURPOSE"]?>" class="inputcss" type="text"   noedit  />
                        	</td>
                            <td  width="66%">
                                                                            详细地址：<input id="ADDRESS" name="ADDRESS" sname="ADDRESS" value="<?php echo $rs["ADDRESS"]?>" class="inputcss" type="text"   noedit  />
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
                        	    访&nbsp;问&nbsp;IP：<input id="IP" name="IP" sname="IP" value="<?php echo $rs["IP"]?>" class="inputcss" type="text"   noedit  />
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
                              <textarea id="MEMO" name="MEMO" sname="MEMO"  style="width:650px; height:200px;margin-top:10px;" noedit ><?php echo $rs["MEMO"]?></textarea>
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