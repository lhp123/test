<?php 
include 'include/tools.php';
$POS="detail";
$title="门店管理";
$prefix = "dept";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/DeptAction.php';
$dept = new DeptAction($conn,$CID);
$dept->setUrl($redirect_url);
$rs = $dept->control();


include 'head.php';
$dept->setDeptJson();

?>
<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
    
<script type="text/javascript">
     $(document).ready(function(){
      	$("#myform").getRe({
     	   re1: $("#RE1"),
           re1id: $("#RE1ID"),
          	});
 });
 </script>                        
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
                    	<td width="40%"> 
                    	        部门名称：<input id="DEPTNAME" name="DEPTNAME" sname="DEPTNAME" value="<?php echo $rs["DEPTNAME"]?>" class="inputcss" type="text"  />
                    	</td>
                   		
                    	<td width="30%"> 行&nbsp;政&nbsp;区:
                    	    <select id="RE1" name="RE1" sname="RE1"   class="selectcss"  selt="<?php echo $rs[RE1]?>">
                        		    <option other='' value='' >请选择行政区</option>
                        	</select>
                        	<input type="hidden" id="RE1ID" name="RE1ID" sname="RE1ID" value="<?php echo $rs["RE1ID"]?>" />
                    	</td>
                    	<td width="30%"> 
                    	        显示顺序：<input id="TABORDER" name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text" style="width:80px;"   />
                    	        显示<input id="IF_SHOW" name="IF_SHOW" sname="IF_SHOW" <?php echo $rs["IF_SHOW"]=="1"?"checked":""?> value="<?php echo $rs["IF_SHOW"]?>" type="checkbox"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="50%"> 
                    	        地&nbsp;&nbsp;&nbsp;&nbsp;址：<input id="ADDRESS" name="ADDRESS" sname="ADDRESS" value="<?php echo $rs["ADDRESS"]?>" class="inputcss" type="text"  style="width:270px;"  />
                    	</td>
                   
                    	<td width="50%"> 
                    	        部门电话：<input id="TEL" name="TEL" sname="TEL" value="<?php echo $rs["TEL"]?>" class="inputcss" type="text"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="50%"> 
                    	        照&nbsp;&nbsp;&nbsp;&nbsp;片：<input id="PHOTO" name="PHOTO" sname="PHOTO" value="<?php echo $rs["PHOTO"]?>" readonly stype="upfile" updir="DEPT" style="height:23px;  border:1px #7f9db9 solid;"  type="text"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="50%"> 
                    	        热点楼盘：<input id="RDLP" name="RDLP" sname="RDLP" value="<?php echo $rs["RDLP"]?>" class="inputcss" type="text"  style="width:270px"  />&nbsp;&nbsp;注:楼盘之间请用;隔开
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td width="50%"> 
                    	        地图坐标：<input id="MAP_X" name="MAP_X" 	sname="MAP_X" value="<?php echo $rs["MAP_X"]?>" class="inputcss"	type="text" style="width: 70px;" />&nbsp;-&nbsp;
								    <input	id="MAP_Y" name="MAP_Y" sname="MAP_Y"	value="<?php echo $rs["MAP_Y"]?>" class="inputcss" type="text"	style="width: 70px;" /> 
									<input id="mapselt" type="button" stype="map" value="选择坐标"	 />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                	    <td width="50%"> 
                	                    店&nbsp;长&nbsp;名：<input id="DZNAME" name="DZNAME" sname="DZNAME" value="<?php echo $rs["DZNAME"]?>" class="inputcss" type="text"   />
                	    </td>
                    	<td width="50%%"> 
                    	            店长寄语：<input id="DZJY" name="DZJY" sname="DZJY" value="<?php echo $rs["DZJY"]?>" class="inputcss" type="text" style="width:270px"  />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <!--  
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap> 店内公告：</td>
                    	<td> 
                    	    <textarea id="DNGG" name="DNGG" sname="DNGG" stype='kindeditor' cols="" rows="" style="width:650px; height:150px;"><?php echo $rs["DNGG"]?></textarea>
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            -->
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap> 门店介绍：</td>
                    	<td>
                    	   <textarea id="MDJS" name="MDJS" sname="MDJS" stype='kindeditor' cols="" rows="" style="width:650px; height:150px;"><?php echo $rs["MDJS"]?></textarea>
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