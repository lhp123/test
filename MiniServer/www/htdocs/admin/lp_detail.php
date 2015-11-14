<?php 
include 'include/tools.php';
$POS="detail";
$prefix = "lp";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";
$title = "楼盘代理管理";

include 'action/LpAction.php';
$lp = new LpAction($conn,$CID);
$lp->setUrl($redirect_url);
$rs = $lp->control();


include_once 'head.php';
$lp->setDeptJson();
$lp->setPtJson("lable", "楼盘标签");
$lp->setPtJson("ZXZK", "装修情况");
$lp->setPtJson("JZLX", "楼型");
$lp->setPtJson("ZBPT", "周边配套");
$lp->setPtJson("SQ", "所属商圈");
?>
<div id="main">
<?include_once 'menu.php';?>
  <div id="main_right">
  	<?php echo_title1 ($title);?>
    
    <div id="main_right_main">
    <script type="text/javascript">
    $(document).ready(function(){
    	$("#myform").getRe({
   		 re1: $("#RE1"),
         re2: $("#RE2"),
        	});
    	
    	$("#LABLES").getPt({
			json:lable,
			title:'请选择楼盘标签'
        	});
    	$("#ZBPT").getPt({
			json:ZBPT,
			title:'请选择周边配套'
        	});
    	$("#SQ").getPt({
			json:SQ,
			title:'请选择所属商圈'
        	});
      });
    </script>    
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<table  width="100%" border="0" cellpadding="0" cellspacing="0" >
        	<tr>
            	<td>
                <table>
                	<tr>
                    	<td width="30%">&nbsp;&nbsp;标&nbsp;&nbsp;题：<input  name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>" class="inputcss" type="text" /></td>
                    	<td width="30%">楼盘名称：<input  name="LPNAME" sname="LPNAME" value="<?php echo $rs["LPNAME"]?>" class="inputcss" type="text" /></td>
                        <td align="left" width="40%">
                                <input  name="IF_ZD" sname="IF_ZD" <?php echo $rs["IF_ZD"]=="1"?"checked":""?> value="<?php echo $rs["IF_ZD"]?>" type="checkbox" /> 热推
                                <input  name="IF_CX" sname="IF_CX" <?php echo $rs["IF_CX"]=="1"?"checked":""?> value="<?php echo $rs["IF_CX"]?>" type="checkbox" /> 促销
                                <input  name="IF_KP" sname="IF_KP" <?php echo $rs["IF_KP"]=="1"?"checked":""?> value="<?php echo $rs["IF_KP"]?>" type="checkbox" /> 开盘
                                <input  name="IF_SHOW" sname="IF_SHOW" <?php echo $rs["IF_SHOW"]=="1"?"checked":""?> value="<?php echo $rs["IF_SHOW"]?>" type="checkbox" /> 显示
                                <input  name="TABORDER" sname="TABORDER"  value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text" style="width:40px;" />
                        </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td>
                	<table>
                    	<tr>
                        	<td width="50%" >所属区域：
                            	<select id="RE1" name="RE1" sname="RE1"  selt="<?php echo $rs["RE1"]?>"  class="selectcss"  style="width:80px;"/>
                            		                <option id='' value='' >请选择行政区</option>
                            	</select>
                            	<select id="RE2" name="RE2" sname="RE2"  selt="<?php echo $rs["RE2"]?>" class="selectcss" style="width:80px;"/>
                            		             <option id='' value='' >请选择片区</option>
                            	</select>
                        	</td>
                            <td width="50%" align="left">
                                                                            具体地址：<input  name="LPDZ" sname="LPDZ" value="<?php echo $rs["LPDZ"]?>" class="inputcss" type="text" style="width:280px;" />
                            </td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td>
                	<table >
                    	<tr>
	                    	 <td align="left" width="33%">
	                        		主推户型：
	                        		<input id="ZXZK" name="ZXZK" sname="ZXZK" selt="<?php echo $rs["ZXZK"]?>"  stype='select'  type="text" class="inputcss" style="width:80px;">
	                        		<input name="H_SHI" sname="H_SHI" value="<?php echo $rs["H_SHI"]?>"  type="text" class="inputcss" style="width:20px;">室
	                        			<input name="BUILD_AREA" sname="BUILD_AREA" value="<?php echo $rs["BUILD_AREA"]?>"  type="text" class="inputcss" style="width:30px;">㎡
	                        	</td>
	                        <td align="left" width="22%">
                        		均价：<input id="JUNJIA" name="JUNJIA" sname="JUNJIA" value="<?php echo $rs["JUNJIA"]?>"  type="text" class="inputcss" style="width:60px;" />元/㎡
                            </td>
                        	<td align="left" width="45%">
                        		楼盘标签：<input id="LABLES" name="LABLES" sname="LABLES" value="<?php echo $rs["LABLES"]?>"  type="text" class="inputcss" style="width:280px;" />
                            </td>
                         
                            
                        </tr>
                        
                    </table>
              </td>
            </tr>
           <tr>
            	<td>
                	<table>
                    	<tr>
                       	  
                          <td align="left" width="33%">
                        		开&nbsp;发&nbsp;商：<input id="KFS" name="KFS" sname="KFS" type="text" value="<?php echo $rs["KFS"]?>"  style="width:190px;" class="inputcss">
                          </td>
                          <td align="left" width="33%">
                        		项目特色：<input id="XMTS" name="XMTS" sname="XMTS" value="<?php echo $rs["XMTS"]?>" class="inputcss" type="text" style="width:190px;"/>
                          </td>
                      </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                	<table>
                    	<tr>
	                        <td align="left" width="50%">
	                        		售楼地址：<input id="SLDZ" name="SLDZ" sname="SLDZ" type="text"  value="<?php echo $rs["SLDZ"]?>" style="width:300px;" class="inputcss">
	                          </td>
	                          <td align="left" width="50%">
	                        		看房电话：<input id="TEL" name="TEL" sname="TEL" value="<?php echo $rs["TEL"]?>"  type="text" style="width:120px;" class="inputcss">
	                          </td>
                      </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                	<table >
                    	<tr>
                    	<td align="left" width="50%">
                        		物业公司：<input id="WYGS"  name="WYGS" sname="WYGS" value="<?php echo $rs["WYGS"]?>"  type="text" style="width:120px;" class="inputcss">
                            </td>
                          
                          <td align="left" width="50%">
                        		物业类型：<input name="WYLX" sname="WYLX" value="<?php echo $rs["WYLX"]?>"  type="text" class="inputcss" style="width:120px;">
                          </td>
                           
                        </tr>
                        
                    </table>
              </td>
            </tr>
               <tr>
            	<td>
                	<table  >
                    	<tr>
                    		<td align="left" width="50%">
                        		物业地址：<input  name="WYDZ" sname="WYDZ" value="<?php echo $rs["WYDZ"]?>"  type="text" class="inputcss" style="width:300px;" />
                            </td>
                    		 <td align="left" width="50%">
                        		物&nbsp;业&nbsp;费：<input id="WYF"  name="WYF" sname="WYF" type="text" value="<?php echo $rs["WYF"]?>" style="width:120px;" class="inputcss">
                           </td>
                    		
 						 </tr>
                        
                    </table>
                </td>
            </tr>
             <tr>
            	<td>
                	<table  >
                    	<tr>
                    		<td align="left" width="33%">
                        		建筑年代：<input id="DZND" name="DZND" sname="DZND" value="<?php echo $rs["DZND"]?>" onClick="WdatePicker({dateFmt:'yyyy'})" type="text" style="width:120px;" class="inputcss">
                          </td>
                    		 <td align="left" width="33%">
                        		入住时间：<input id="RZSJ" name="RZSJ" sname="RZSJ" value="<?php echo $rs["RZSJ"]?>" onClick="WdatePicker({dateFmt:'yyyy.MM'})" type="text" class="inputcss" style="width:120px;"/>
                        	</td>
                            <td align="left" width="33%">
                        	        开盘时间：<input id="KPSJ" name="KPSJ" sname="KPSJ" value="<?php echo $rs["KPSJ"]?>"  onClick="WdatePicker({dateFmt:'yyyy.MM'})" type="text" class="inputcss" style="width:120px;" />
                        	 </td>
                        	
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                	<table  >
                    	<tr>
                    		<td align="left" width="33%">
                        		建筑类型：<input id="JZLX" name="JZLX" sname="JZLX" selt="<?php echo $rs["JZLX"]?>" stype="select" type="text" class="inputcss" style="width:120px;"/>
                            </td>
                          
                            <td align="left" width="33%">
                        		环线位置：<input id="HXWZ" name="HXWZ" sname="HXWZ" value="<?php echo $rs["HXWZ"]?>" class="inputcss" type="text" style="width:120px;" /></td>
                        	<td align="left" width="33%">
                        	            交通状况：<input id="JTZK" name="JTZK" sname="JTZK" value="<?php echo $rs["JTZK"]?>" type="text" class="inputcss" style="width:120px;" />
                            </td>
                         
                        </tr>
                        
                    </table>
              </td>
            </tr>
            <tr>
            	<td>
                	<table>
                    	<tr>
                       	  <td align="left" width="33%">
                        		绿&nbsp;化&nbsp;率：<input id = "LH" type="text" name="LH" sname="LH" value="<?php echo $rs["LH"]?>" style="width:120px;" class="inputcss">
                            </td>
                          <td align="left" width="33%">
                        		容&nbsp;积&nbsp;率：<input id="RJL" name="RJL" sname="RJL" value="<?php echo $rs["RJL"]?>"  type="text" style="width:120px;" class="inputcss">
                           </td>
                           <td align="left" width="33%">    
							车位信息：<input id = "CWXX" name="CWXX" sname="CWXX" value="<?php echo $rs["CWXX"]?>" type="text" class="inputcss"  style="width:120px;" />
                          </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
         
            <tr>
            	<td>
                	<table>
                    	<tr>
                    	 <td align="left" width="33%">    
							占地面积：<input id = "ZDMJ" name="ZDMJ" sname="ZDMJ" value="<?php echo $rs["ZDMJ"]?>" type="text" class="inputcss"  style="width:120px;" />㎡
						 </td>
                       	  <td align="left" width="33%">
                        		建筑面积：
                            <input id="JZMJ" name="JZMJ" sname="JZMJ" type="text" value="<?php echo $rs["JZMJ"]?>" style="width:120px;" class="inputcss" />
                         </td>
                          <td align="left" width="33%">
                        		总&nbsp;户&nbsp;数：<input id="ZHS" name="ZHS" sname="ZHS" value="<?php echo $rs["ZHS"]?>" type="text" style="width:120px;" class="inputcss">
                           </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
           <tr>
            	<td>
               	  <table>
                    	<tr>
                       	  <td align="left" width="48%">    
							周边配套：<input id = "ZBPT" name="ZBPT" sname="ZBPT" value="<?php echo $rs["ZBPT"]?>" type="text" class="inputcss"  style="width:300px;"/>
						</td>
                          <td align="left" width="48%">
                        	所属商圈：<input id="SQ" name="SQ" sname="SQ" value="<?php echo $rs["SQ"]?>" type="text" style="width:300px;" class="inputcss">
                          </td>
                        </tr>
                    </table>
                </td>
            </tr>
             <tr>
            	<td>
               	  <table>
                    	<tr>
                       	  <td align="left" width="96%">    
							户&nbsp;型&nbsp;图：<input id="HXT" name="HXT" sname="HXT" value="<?php echo $rs["HXT"]?>" stype="upfile" updir="NEWHOUSE" type="text"  style="height:23px;width:400px;  border:1px #7f9db9 solid;"  /><br>
                          </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
               	  <table>
                    	<tr>
                          <td align="left" width="968%">
                        	实&nbsp;景&nbsp;图：<input id="PHOTO" name="PHOTO" sname="PHOTO" value="<?php echo $rs["PHOTO"]?>" stype="mupfile" updir="NEWHOUSE" type="text"  style="height:23px;width:400px;  border:1px #7f9db9 solid;"  readonly/>                          
                          </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
             
             <tr>
            	<td>
               	  <table>
                    	<tr>
                       	  <td align="left" width="60%">    
							地图坐标：<input id = "MAP_X" name="MAP_X" sname="MAP_X" value="<?php echo $rs["MAP_X"]?>" type="text" class="inputcss"  style="width:120px;"/> -
							          
        							<input id = "MAP_Y" name="MAP_Y" sname="MAP_Y" value="<?php echo $rs["MAP_Y"]?>" type="text" class="inputcss"  style="width:120px;" />
                                    <input id="mapselt" type="button" stype="map" value="选择坐标"	 />  
                          </td>
                        </tr>
                    </table>
                </td>
            </tr>
               <tr>
            	<td>
               	  <table>
                    	<tr>
                       	  <td valign="top" nowrap >楼盘简介：</td>
                          <td valign="middle" ><textarea id="LPZK" name="LPZK"  stype="kindeditor"  style="width:600px; height:180px;"><?php echo $rs["LPZK"]?></textarea>
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
<?include_once 'tail.php';?>