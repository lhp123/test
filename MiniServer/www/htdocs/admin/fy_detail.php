<?php 
include 'include/tools.php';
$POS="detail";
$prefix = "fy";
$type = filterParaByName("type");
if($type == ""||$type=="出售"){
    $title = "买卖房源管理";
}elseif($type=="出租"){
    $title = "租赁房源管理";
}
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php?type=".$type;

include 'action/FyAction.php';
$fy = new FyAction($conn,$CID);
$fy->setUrl($redirect_url);
$rs = $fy->control();

include_once 'head.php';
$fy->setDeptJson();
$fy->setXqJson1();
$fy->setUserJson();
$fy->setPtJson("PTINFO","房屋配套");
$fy->setPtJson("FITMENT","装修情况");
$fy->setPtJson("STATUS","房屋现状");
$fy->setPtJson("DIRECTION","朝向");
$fy->setPtJson("PURPOSE","房屋用途");
$fy->setPtJson("FRAME","结构");
$fy->setPtJson("HOUSE_PROP","房屋性质");
$fy->setPtJson("FYFL","房源分类");

$fy->setPtJson("lable","房屋标签");

?>
<div id="main">
<?include_once 'menu.php';?>
  <div id="main_right">
  	<?php echo_title1 ($title);?>
    
 <div id="main_right_main">
    <script type="text/javascript">

    function qx(){
        if($('#selectall').prop('checked')){
            var length=$("input[name='selectsub']").length;
     	   $("input[name='selectsub']").prop('checked',true);


        }
     }
 
   $(document).ready(function(){
    	$("#myform").getRe({
   		 re1: $("#RE1"),
         re2: $("#RE2")
        	});
   	   $("#DISNAME").getXq({
      		id   :$("#DISID"),
            pid:$('#RE1'),
            ppid:$('#RE2'),
           disid:$('#DISID'),
      		json:xq
	        });
   		<?php 
			if(ifSysRootAdmin()){?>
				$("#USERNAME").getUser({
					id:$("#USERID"),
					json:users
				});
		<?php	}
		?>
      	$("#PTINFO").getPt({
      	    json:PTINFO,
      	    title:"选择房屋配套"
          	});
      	$("#LABLES").getPt({
      	    json:lable,
      	    title:"选择网站端标签"
          	});
      	$("#FWLABLE").getPt({
      	    json:lable,
      	    title:"选择移动端标签"
          	});
      });

        //清除默认小区名称
    function clearxq(){
        var xq = document.getElementById("DISNAME");
        xq.value = '';
    }
    function clearxqre(){
        var xqre = document.getElementById("DISNAME");
        xqre.value = '';
    }

    function clearxx(){
        var username=document.getElementById('USERNAME');
        username.value='';
    }

    </script>    
    <form id="myform" action="<?php echo $page?>?action=save&type=<?php echo $type?>" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $rs["CID"]==""?$CID:$rs["CID"] ?>" />
    	<input type="hidden" name="TYPE" sname="TYPE" value="<?php echo $rs["TYPE"]==""?$type:$rs["TYPE"] ?>" />

    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table>
                	<tr>
                    	<td width="32%">
                    	  &nbsp;标&nbsp;&nbsp;题&nbsp;：<input id="TITLE" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>"  type="text" class="inputcss" style="width:180px;" />
                    	</td>
                    	<td width="22%">
                    	    房屋编号：<input id="CONTRACT_CODE" name="CONTRACT_CODE" sname="CONTRACT_CODE" value="<?php echo $rs["CONTRACT_CODE"]?>" class="inputcss" type="text"  style="width:100px;" />
                        </td>

                            <td width="41%">
                                                                               显示顺序： <input id="TABORDER" name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>"  class="inputcss" type="text" style="width:40px;"  />
                                           <input id="IF_SHOW" name="IF_SHOW" sname="IF_SHOW" <?php echo $rs["IF_SHOW"]=="1"?"checked":""?> value="<?php echo $rs["IF_SHOW"]?>" type="checkbox" />显示
                                          <input id="IF_DJ" name="IF_DJ" sname="IF_DJ" <?php echo $rs["IF_DJ"]=="1"?"checked":""?> value="<?php echo $rs["IF_DJ"]?>" type="checkbox"  />独家
                                          <input id="IF_YZ" name="IF_YZ" sname="IF_YZ" <?php echo $rs["IF_YZ"]=="1"?"checked":""?> value="<?php echo $rs["IF_YZ"]?>" type="checkbox"  />优质
                                          <input id="IF_TJ" name="IF_TJ" sname="IF_TJ" <?php echo $rs["IF_TJ"]=="1"?"checked":""?> value="<?php echo $rs["IF_TJ"]?>" type="checkbox"  />热门
                            </td>
                    </tr>
                </table>
              </td>
            </tr>
           <tr>
            <td >
                <table>
                	<tr>
                		<td width="50%">

                                                                     所属小区：<select id="RE1" name="RE1" sname="RE1"  selt="<?php echo $rs["RE1"]?>"  class="selectcss"  style="width:80px;" onchange="clearxq()"/>

                        		                <option id='' value='' >请选择行政区</option>
                        		      </select>

                               <select id="RE2" name="RE2" sname="RE2"  selt="<?php echo $rs["RE2"]?>" class="selectcss" style="width:80px;" onchange="clearxqre()"/>
                        		             <option id='' value='' selected="selected">请选择片区</option>

                        		            </select>
                              <input id="DISNAME" name="DISNAME" sname="DISNAME" value="<?php echo $rs["DISNAME"]?>" type="text" class="inputcss" style="width:100px;" />
                              <input id="DISID" name="DISID"  sname="DISID" value="<?php echo $rs["DISID"]?>" type="hidden" />
                         </td>
                    	 <td width="50%" >
                    	             房屋地址：<input id="ADDRESS" name="ADDRESS" sname="ADDRESS" value="<?php echo $rs["ADDRESS"]?>" class="inputcss" type="text" style="width:280px;" />
                    	 </td>


                    </tr>
                </table>
              </td>
            </tr>
                     <tr>
            <td >
                <table>
                	<tr>
                    	 <td width="50%" >
                    	     标&nbsp;&nbsp;&nbsp;&nbsp;签：<input id="LABLES" name="LABLES" sname="LABLES" value="<?php echo $rs["LABLES"]?>" class="inputcss" type="text" style="width:240px;" /> (网站)
                    	 </td>
                         <td width="50%">
                                                                     标&nbsp;&nbsp;&nbsp;&nbsp;签：<input id="FWLABLE" name="FWLABLE" sname="FWLABLE" value="<?php echo $rs["FWLABLE"]?>" class="inputcss" type="text" style="width:240px;" /> (移动端)
                         </td>

                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="25%">
                        		建筑面积：<input id="BUILD_AREA" name="BUILD_AREA" sname="BUILD_AREA" value="<?php echo $rs["BUILD_AREA"]?>" type="text" class="inputcss" size="5" />㎡
                            </td>
                           <td  width="25%">
                        		使用面积：<input id="SY_AREA" name="SY_AREA" sname="SY_AREA" value="<?php echo $rs["SY_AREA"]?>"  type="text" class="inputcss" style="width:50px;" />㎡
                            </td>
                            <td width="25%">
                        		建筑年代：<input id="JZ_YEAR" name="JZ_YEAR" sname="JZ_YEAR" value="<?php echo $rs["JZ_YEAR"]?>" onClick="WdatePicker({dateFmt:'yyyy.MM'})" type="text" class="inputcss" size="5" />年
                            </td>

                          <td width="25%">
                        		产权：<input id="CQ" name="CQ" sname="CQ" value="<?php echo $rs["CQ"]?>"  type="text" class="inputcss" style="width:60px;">
                           </td>

                        </tr>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>

                          <td width="25%">
                        		所在楼层：<input id="FLOOR" name="FLOOR" sname="FLOOR" value="<?php echo $rs["FLOOR"]?>"  type="text" class="inputcss" style="width:47px;" />
                        		 &nbsp;/&nbsp;<input id="TOP_FLOOR" name="TOP_FLOOR" sname="TOP_FLOOR" value="<?php echo $rs["TOP_FLOOR"]?>"  type="text" class="inputcss" style="width:47px;" /></td>
                          <td  width="25%">
                        		梯&nbsp;&nbsp;&nbsp;&nbsp;户：<input id="TI" name="TI" sname="TI" value="<?php echo $rs["TI"]?>" type="text" class="inputcss" style="width:30px;" />梯&nbsp;
                        		<input id="HU" name="HU" sname="HU" value="<?php echo $rs["HU"]?>" type="text" class="inputcss" style="width:30px;" />户
                           </td>
                        <td width="50%" >
                   		                  户&nbsp;&nbsp;&nbsp;&nbsp;型：&nbsp;<input id="H_SHI" name="H_SHI" sname="H_SHI" value="<?php echo $rs["H_SHI"]?>"  class="inputcss" type="text" style="width:30px;" />室&nbsp;
                   		  			<input id="	H_TING" name="H_TING" sname="H_TING" value="<?php echo $rs["H_TING"]?>" class="inputcss" type="text" size="1" style="width:30px;" />厅&nbsp;
                   		  			<input id="H_WEI" name="H_WEI"  sname="H_WEI" value="<?php echo $rs["H_WEI"]?>" class="inputcss" type="text" size="1" style="width:30px;" />卫&nbsp;
                   		 			<input id="H_TAI" name="H_TAI" sname="H_TAI" value="<?php echo $rs["H_TAI"]?>" class="inputcss" type="text" size="1"  style="width:30px;" />台
                   		 </td>
                        </tr>

                    </table>
              </td>
            </tr>


             <tr>
            	<td >
               	  <table >
                    	<tr>

                          <td align="left" width="25%">
                        		房源分类：<input id="FYFL" name="FYFL" sname="FYFL" selt="<?php echo $rs["FYFL"]?>" type="text"  stype="select" style="width:120px;"class="inputcss">
                          </td>
                          <td align="left" width="25%">
                        		房屋用途：<input id="PURPOSE"  name="PURPOSE" sname="PURPOSE" selt="<?php echo $rs["PURPOSE"]?>"  type="text" stype="select" style="width:120px;" class="inputcss">

                           </td>
                            <td align="left" width="25%">
                        		房屋属性：<input id="HOUSE_PROP" name="HOUSE_PROP" sname="HOUSE_PROP" selt="<?php echo $rs["HOUSE_PROP"]?>"  type="text"  stype="select"   style="width:120px;" class="inputcss">
                           </td>
                           <td align="left" width="25%">
                            		房屋状态：<input id="STATUS" name="STATUS" sname="STATUS" selt="<?php echo $rs["STATUS"]?>"  type="text" stype="select"  style="width:120px;"  class="inputcss">
                                  </td>
                        </tr>

                    </table>
                </td>
            </tr>

            <tr>
            	<td >
                	<table >
                    	<tr>

                           	  <td align="left" width="25%">
                        		        房屋结构：<input id="FRAME"  name="FRAME" sname="FRAME" type="text" selt="<?php echo $rs["FRAME"]?>"  stype="select"   style="width:120px;" class="inputcss">
                               </td>
                           	  <td align="left" width="25%">
                        		        装修情况：<input id = "FITMENT" type="text" stype="select" name="FITMENT" sname="FITMENT" selt="<?php echo $rs["FITMENT"]?>"  style="width:120px;" class="inputcss">
                                </td>
                                <td align="left" width="25%">
                        		   朝&nbsp;&nbsp;&nbsp;&nbsp;向：<input id="DIRECTION" name="DIRECTION" sname="DIRECTION" selt="<?php echo $rs["DIRECTION"]?>"  type="text" stype="select" style="width:120px;" class="inputcss">
                              	</td>

                              	<td width="25%">

                              	</td>

                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
            	<td >
               	  <table >
                    	<tr>
                       	  <td align="left" width="40%">
							房屋配套：<input id = "PTINFO" name="PTINFO" sname="PTINFO" value="<?php echo $rs["PTINFO"]?>" style="width:200px;" type="text" class="inputcss"  />
                          </td>
                         <td  width="20%">
                        		房屋价格：<input id="PRICE" name="PRICE" sname="PRICE" value="<?php echo $rs["PRICE"]?>"  type="text" class="inputcss" style="width:50px;" /><?php echo $type=="出售"?"万":"元/月"?></td>
                          <td  width="20%">
                        		均价：<input id="JUNJIA" name="JUNJIA" sname="JUNJIA" value="<?php echo $rs["JUNJIA"]?>" class="inputcss" type="text" style="width:50px;" />元/㎡
                          </td>
                          <?php if($type=="出售"){?>
                              <td  width="20%">
                            	首付：<input id="SF_PRICE" name="SF_PRICE" sname="SF_PRICE" value="<?php echo $rs["SF_PRICE"]?>" class="inputcss" type="text" style="width:50px;" />万
                              </td>
                          <?php }elseif($type=="出租"){?>
                          <td width="20%">
                               <input id="IF_ZY" name="IF_ZY" sname="IF_ZY"  <?php echo $rs["IF_ZY"]=="1"?"checked":""?> value="<?php echo $rs["IF_ZY"]?>" type="checkbox"  />是否有租约
                          </td>
                          <?php } ?>
                       </tr>

                    </table>
                </td>
            </tr>

            <tr>
            	<td >
                	<table >
                    	<tr>
                    	<td align="left" width="20%">
                        		经&nbsp;纪&nbsp;人：<input id="USERNAME" name="USERNAME" sname="USERNAME" type="text" style="width:140px;"   value="<?php echo $rs["USERNAME"]==""?getUsername():$rs["USERNAME"]?>" class="inputcss">

                            <input id="USERID" name="USERID" sname="USERID" value="<?php echo $rs["USERID"]==""?getUserid():$rs["USERID"]?>" type="hidden" id="USERID" />
                          </td>
                       	  <td align="left" width="30%">
                        		所属部门：<select id="DEPTID" name="DEPTID" sname="DEPTID"   class="selectcss" >
                        		                <option other='' value='' >请选择部门</option>
                                		    <?php 
												if(ifSysRootAdmin()){
													$cons="";	
												}else{
													$cons=" AND ID='".getDeptid()."'";
												}
                                		        $stmt = mysql_query("SELECT ID,DEPTNAME FROM XT_DEPT WHERE CID = '".$CID."'".$cons,$conn);
                                		        while ($rs_TYPE = mysql_fetch_array($stmt)){
                                                     echo "<option  value='".$rs_TYPE ["ID"]."'".($rs_TYPE["ID"]==$rs["DEPTID"]?"selected":"").">".$rs_TYPE['DEPTNAME']."</option>";   
                                                }
                                		    ?>

                            </td>



                      </tr>

                   </table>
                </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                       	  <td valign="middle" align="left" width="792">
                          <table>
                          	<tr>
                            	<td>房型图片：<input id="FXT" name="FXT" sname="FXT" value="<?php echo $rs["FXT"]?>" stype="upfile" updir="FY" type="text" readonly style="height:23px;width:400px;  border:1px #7f9db9 solid;"  /> </td>
                            </tr>
                          </table>
                          </td>

                        </tr>

                    </table>
                </td>

            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                       	  <td valign="middle" align="left" width="792">
                          <table>
                          	<tr>
                            	<td>房源照片：<input id="PHOTO" name="PHOTO" sname="PHOTO" stype="mupfile"  updir="FY" value="<?php echo $rs["PHOTO"]?>" readonly style="height:23px; width:400px; border:1px #7f9db9 solid;"  type="text" /></td>

                            </tr>
                          </table>

                          </td>

                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                       	  <td valign="middle" align="left" width="792">
                          <table>
                          	<tr>
                            	<td>标&nbsp;题&nbsp;图：<input id="TITLE_PHOTO" name="TITLE_PHOTO" sname="TITLE_PHOTO" title="<?php echo $rs["TITLE_PHOTO_MS"]==""?$rs["TITLE"]:$rs["TITLE_PHOTO_MS"]; ?>" value="<?php echo $rs["TITLE_PHOTO"];?>" stype="upfile" updir="FY" type="text" readonly style="height:23px;width:400px;  border:1px #7f9db9 solid;"  />
                            	<input type="hidden" id="TITLE_PHOTO_MS" name="TITLE_PHOTO_MS" sname="TITLE_PHOTO_MS" value="<?php echo $rs["TITLE_PHOTO_MS"]==""?$rs["TITLE"]:$rs["TITLE_PHOTO_MS"]; ?>"> </td>
                            </tr>
                          </table>
                          </td>

                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
           	  <td  style="height:220px;">
                	<table >
                    	<tr>
                       	  <td valign="top" align="left">房源描述：</td>
                          <td valign="middle" ><textarea id="MEMO" name="MEMO"  stype="kindeditor"  style="width:600px; height:180px;"><?php echo $rs["MEMO"]?></textarea>
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