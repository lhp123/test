<?php
include 'include/tools.php';
$POS = "detail";
$title = "小区管理";
$prefix = "xq";
$page = $prefix . "_detail.php";
$redirect_url = $prefix . "_list.php";


include 'action/XqAction.php';
$xq = new XqAction($conn,$CID);
$xq->setUrl($redirect_url);
$rs = $xq->control();


include 'head.php';
$xq->setDeptJson();
$xq->setUserJson();
$xq->setPtJson("LX","楼型");
$xq->setPtJson("ZX","装修情况");
$xq->setPtJson("JG","建筑类型");
$xq->setPtJson("XZ","房屋性质");
$xq->setPtJson("YT","住宅类型");
?>

<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
		 <?php echo_title1 ($title);?>
		

<script type="text/javascript">
    $(document).ready(function(){
    	$("#myform").getRe({
        	   re1: $("#PPNAME"),
               re1id: $("#PPID"),
               re2: $("#PNAME"),
               re2id: $("#PID")
          	});
      	
      	$("#USER").getUser({
      	    id:$("#FK_USERID"),
      	    json:users
         });
        
    });

</script>
		<div id="main_right_main">
			<input id='json' type='hidden' value="<?php echo $rs["js"]?>" />

			<form id="myform" action="<?php echo $page?>?action=save"  method="post">
				<input id='sname' name='sname' type='hidden' value='' /> 
				<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" /> 
				<input type="hidden" name="CID" sname='CID' value="<?php echo $CID ?>" />
				<table width="100%" border="0" cellpadding="0" cellspacing="0" >
					<tr>
						<td >
							<table >
								<tr>
									<td width="25%">
									        小区名称：<input id="NAME" name="NAME"	sname="NAME" value="<?php echo $rs["NAME"]?>" class="inputcss"	type="text" style="width: 90px;" />
									</td>
									<td width="35%">
									            所属区域：<select id="PPNAME" name="PPNAME" sname="PPNAME"  selt="<?php echo $rs["PPNAME"]?>" class="selectcss" style="width: 80px;" />
    										        <option other='' value=''>请选择行政区</option> 
    										 </select> 
    										 <input	type="hidden" id="PPID" name="PPID" sname="PPID" value="<?php echo $rs["PPID"]?>" /> 
    										 <select id="PNAME" name="PNAME" sname="PNAME" selt="<?php echo $rs["PNAME"]?>" class="selectcss" style="width: 80px;" /> 
    										      <option other='' value=''>请选择片区</option> 
    										 </select>
    										<input type="hidden" id="PID" name="PID" sname="PID" value="<?php echo $rs["PID"]?>" />
									</td>
									<td width="40%">
									            具体地址：<input id="ADDRESS" name="ADDRESS" sname="ADDRESS" value="<?php echo $rs["ADDRESS"]?>" class="inputcss" type="text" style="width: 150px;" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
									<td width="25%">
									        建筑面积：<input id="JQ" name="JQ" sname="JQ" 	value="<?php echo $rs["JQ"]?>" class="inputcss" type="text" style="width: 90px;" />㎡
									</td>
									<td width="25%">
    									楼&nbsp;&nbsp;&nbsp;&nbsp;型：<input id="LX"	name="LX" sname="LX" selt="<?php echo $rs ["LX"]?>" type="text"  stype="select" class="inputcss"  style="width: 90px;" />
									</td>

									<td width="25%">
    									    装修情况：<input id="ZX" name="ZX" sname="ZX" selt="<?php echo $rs ["ZX"]?>" type="text"  stype="select" class="inputcss" style="width: 90px;" />
									</td>
									<td width="25%">
									            显示顺序：<input id="TABORDER" name="TABORDER" sname="TABORDER" value="<?php echo $rs["TABORDER"]?>" class="inputcss" type="text" style="width: 30px;" />&nbsp;
									              <input id="IF_TJ" name="IF_TJ" sname="IF_TJ" <?php echo $rs["IF_TJ"]=="1"?"checked":""?> value="<?php echo $rs["IF_TJ"]?>" type="checkbox" />推荐
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
								<td width="25%">
    								         建筑类型：<input id="JG" name="JG" sname="JG" selt="<?php echo $rs ["JG"]?>" type="text"  stype="select" class="inputcss" style="width: 90px;" />
									</td>
									<td width="25%">
									        房屋性质：<input id="XZ" name="XZ" sname="XZ" selt="<?php echo $rs ["XZ"]?>" type="text"  stype="select" class="inputcss"  style="width: 90px;" />
									</td>
									<td width="25%">
    									房屋类型：<input id="YT" name="YT" sname="YT" selt="<?php echo $rs ["YT"]?>" type="text"  stype="select" class="inputcss" style="width: 90px;" />
									</td>
									<td width="25%">
									            建成年代：<input id="ND" name="ND" sname="ND" 	value="<?php echo $rs["ND"]?>" class="inputcss" type="text"  style="width: 90px;"/>
									</td>
									
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
								    <td width="25%">
									            绿&nbsp;化&nbsp;率：<input id="LHL" name="LHL"	sname="LHL" value="<?php echo $rs["LHL"]?>" class="inputcss"	type="text" style="width: 90px;" />
									</td>
									<td width="25%" >
									            小区面积：<input id="XQ_AREA" name="XQ_AREA"	sname="XQ_AREA" value="<?php echo $rs["XQ_AREA"]?>" class="inputcss"	type="text" style="width: 90px;" />
									</td>
									<td width="25%">
									            开&nbsp;发&nbsp;商：<input id="KFS" name="KFS"	sname="KFS" value="<?php echo $rs["KFS"]?>" class="inputcss"	type="text"  style="width: 90px;" />
									</td>
									<td width="25%">
									        物业公司：<input id="WYGS" name="WYGS" sname="WYGS"	value="<?php echo $rs["WYGS"]?>" class="inputcss" type="text"	style="width: 120px;" />
									</td>
									

								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
								    <td width="25%">    
									        物&nbsp;业&nbsp;费：<input id="WYF" name="WYF"	sname="WYF" value="<?php echo $rs["WYF"]?>" class="inputcss"	type="text"  style="width: 90px;"  />
									</td>
									<td width="25%">
									        停&nbsp;车&nbsp;费：<input id="DCF" name="DCF"	sname="DCF" value="<?php echo $rs["DCF"]?>" class="inputcss"	type="text" style="width: 90px;"  />
									</td>
									<td width="25%">
									        燃&nbsp;气&nbsp;费：<input id="RQF" name="RQF"	sname="RQF" value="<?php echo $rs["RQF"]?>" class="inputcss"	type="text" style="width: 90px;"  />
									</td>
									<td width="25%">
									        卫&nbsp;星&nbsp;费：<input id="WXF" name="WXF"	sname="WXF" value="<?php echo $rs["WXF"]?>" class="inputcss"	type="text"  style="width: 90px;"  />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
									<td width="25%">
									        水&nbsp;&nbsp;&nbsp;&nbsp;费：<input id="SF"	name="SF" sname="SF" value="<?php echo $rs["SF"]?>" class="inputcss"	type="text" style="width: 90px;"  />
									</td>
									<td width="25%">
									        会&nbsp;所&nbsp;费：<input id="HSF" name="HSF"	sname="HSF" value="<?php echo $rs["HSF"]?>" class="inputcss"	type="text" style="width: 90px;" />
									</td>
									<td width="25%">
									        供&nbsp;暖&nbsp;费：<input id="GNF" name="GNF"	sname="GNF" value="<?php echo $rs["GNF"]?>" class="inputcss"	type="text" style="width: 90px;"  />
									</td>
									<td width="25%">
									        宽&nbsp;带&nbsp;费：<input id="KDF" name="KDF"	sname="KDF" value="<?php echo $rs["KDF"]?>" class="inputcss"	type="text" style="width: 90px;"  />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
									<td width="25%">
									        车位数量：<input id="CWSL" name="CWSL" sname="CWSL"	value="<?php echo $rs["CWSL"]?>" class="inputcss" type="text"	style="width: 90px;"  />
									</td>
									<td width="25%">
									        标志建筑：<input id="BZJZ" name="BZJZ" sname="BZJZ"	value="<?php echo $rs["BZJZ"]?>" class="inputcss" type="text" style="width: 90px;" />
									</td>
									<td >
									    标&nbsp;&nbsp;&nbsp;&nbsp;签：<input id="LABLES" name="LABLES" sname="LABLES"	value="<?php echo $rs["LABLES"]?>" class="inputcss" type="text"	style="width: 90px;" />
									</td>
									<td>
									        均&nbsp;&nbsp;&nbsp;&nbsp;价：<input id="JUNJIA" name="JUNJIA" sname="JUNJIA"	value="<?php echo numberFormatBySelf($rs["JUNJIA"])?>" class="inputcss" type="text"	style="width: 46px;"  />元/平米
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
									        附近学校：<input id="XX" name="XX" sname="XX"	 value="<?php echo $rs["XX"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									        附近医院：<input id="YY" name="YY" sname="YY"	 value="<?php echo $rs["YY"]?>" class="inputcss" type="text"    style="width: 170px;" />
									</td>
									<td >
									        附近商场：<input id="SC" name="SC" sname="SC" value="<?php echo $rs["SC"]?>" class="inputcss" type="text" 	style="width: 170px;" />
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
									        附近公交：<input id="JT"	name="JT" sname="JT" value="<?php echo $rs["JT"]?>" class="inputcss"	type="text" style="width: 170px;" />
									</td>
									<td >
									        附近银行：<input id="YH" name="YH" sname="YH"	value="<?php echo $rs["YH"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									        其&nbsp;&nbsp;&nbsp;&nbsp;他：<input id="QT"	name="QT" sname="QT" value="<?php echo $rs["QT"]?>" class="inputcss"	type="text" style="width: 170px;" />
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
									    居住环境：<input id="JZHJ" name="JZHJ" sname="JZHJ"	value="<?php echo $rs["JZHJ"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									    地段优势：<input id="DDYS" name="DDYS" sname="DDYS"	value="<?php echo $rs["DDYS"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									    投资回报：<input id="TZHB" name="TZHB" sname="TZHB"	value="<?php echo $rs["TZHB"]?>" class="inputcss" type="text"	style="width: 170px;" />
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
									    升值空间：<input id="SZKJ" name="SZKJ" sname="SZKJ"	value="<?php echo $rs["SZKJ"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									    户型特点：<input id="HXTD" name="HXTD" sname="HXTD" 	value="<?php echo $rs["HXTD"]?>" class="inputcss" type="text"	style="width: 170px;" />
									</td>
									<td >
									    其他优势：<input id="QTYS" name="QTYS" sname="QTYS"	value="<?php echo $rs["QTYS"]?>" class="inputcss" type="text"	style="width: 170px;" />
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
									        摆&nbsp;位&nbsp;图：<input id="BWT" name="BWT" sname="BWT"	stype="upfile" updir="DIS" value="<?php echo $rs["BWT"]?>" readonly	class="inputcss" type="text" style="width: 400px;" />
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
									        实&nbsp;景&nbsp;图：<input id="SJT" name="SJT" sname="SJT"	stype="mupfile" updir="DIS" value="<?php echo $rs["SJT"]?>"		readonly class="inputcss" type="text" style="width: 400px;" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
									<td width="350px">
									        地图坐标：<input id="MAP_X" name="MAP_X" 	sname="MAP_X" value="<?php echo $rs["MAP_X"]?>" class="inputcss"	type="text" style="width: 70px;" />&nbsp;-&nbsp;
									            <input	id="MAP_Y" name="MAP_Y" sname="MAP_Y"	value="<?php echo $rs["MAP_Y"]?>" class="inputcss" type="text"	style="width: 70px;" /> 
									                <input id="mapselt" type="button" stype="map" value="选择坐标"/>
									</td>
									<td>
									        所属经纪人：<input id="USER" name="USER" sname="USER" 		value="<?php echo $rs["USER"]?>" class="inputcss" type="text" style="width: 170px;" />
									              <input type="hidden" id="FK_USERID" name="FK_USERID" sname="FK_USERID"/>
									</td>

								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table >
								<tr>
									<td >小区介绍：</td>
									<td>
									    <textarea id="DESCRIPTION" name="DESCRIPTION" 	 stype='kindeditor' 	style="width: 650px; height: 150px;"><?php echo $rs["DESCRIPTION"]?></textarea>
									</td>
								</tr>
							</table>
						</td>
					</tr>


				</table>
				
				
				<div id="fy" style="text-align: center;">
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
</div>



<?include 'tail.php';?>