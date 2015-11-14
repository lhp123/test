<?php 
include 'include/tools.php';
$POS="detail";
$title="用户管理";
$prefix = "user";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";


include 'action/UserAction.php';
$user = new UserAction($conn,$CID);
$user->setUrl($redirect_url);
$rs = $user->control();


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
                    	<td >
                    	        用户姓名：<input id="USERNAME" name="USERNAME" sname="USERNAME" noedit value="<?php echo $rs["USERNAME"]?>" class="inputcss" type="text"   />
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
                    	        登&nbsp;陆&nbsp;名：<input id="LOGINNAME" name="LOGINNAME" sname="LOGINNAME" noedit value="<?php echo $rs["LOGINNAME"]?>" class="inputcss" type="text"   />
                        </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>
                    	        年&nbsp;&nbsp;&nbsp;&nbsp;龄：<input id="AGE" name="AGE" sname="AGE" noedit value="<?php echo $rs["AGE"]?>" class="inputcss" type="text"   />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>
                    	        电&nbsp;&nbsp;&nbsp;&nbsp;话：<input id="TEL" name="TEL" sname="TEL" noedit value="<?php echo $rs["TEL"]?>" class="inputcss" type="text"   />
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
                    	    公司名称：<input id="SCGS" name="SCGS" sname="SCGS" noedit value="<?php echo $rs["SCGS"]?>" class="inputcss" type="text"  />
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
                    	   公司地点：<input id="GZDD" name="GZDD" sname="GZDD" noedit value="<?php echo $rs["GZDD"]?>" class="inputcss" type="text"  />
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
                    	    邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<input id="EMAIL" name="EMAIL" sname="EMAIL" noedit value="<?php echo $rs["EMAIL"]?>" class="inputcss" type="text"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="38">
                    	        用户类型：<input id="TYPE" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]?>" noedit noeditclass="inputcss" type="text"   />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
          
      </table>
      <div id="fy" style="text-align:center;">
      <table border="0" align="left" cellpadding="0" cellspacing="0">
      	<tr>
      	    <td width="100px"></td>
        	<td align="left">
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