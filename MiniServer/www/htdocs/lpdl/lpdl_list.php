<?php
$pos="楼盘代理";
$posd="列表";
?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/LpAction.php';
$lpAction = new LpAction($conn, $CID);
$result = $lpAction->getLpList();
?>
<div id="center">
	<div id="fysm">
		<span class="blu"><a href="lpdl.php">楼盘代理</a></span>&nbsp;>&nbsp;共<span class="org"><?php echo $result["rows"];?></span>套在售楼盘
	</div>
  <?php include_once '../INHEAD/search.php';?>
  
  <div id="main">
  <?php 
  	while ($rs = mysql_fetch_array($result["result"])){
			?>
    <div class="main_box changeColor">

			<div id="main_box_img"><a href="lpdl_detail.php?lpid=<?php echo $rs["ID"];?>" target="_blank">
				<img src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_L);?>" width="172" height="134" />
			</a></div>
			<div id="main_box_tex">
				<div id="tit_tex">
					<a href="lpdl_detail.php?lpid=<?php echo $rs["ID"];?>" target="_blank">
						<?php echo $rs["TITLE"];?> <?php echo $rs["IF_ZD"]=="1"?"[热推]":"";?> <?php echo $rs["IF_CX"]=="1"?"[促销]":"";?>
					</a>
				</div>
				<div id="tex1">
					<ul>
						<li class="one">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td>楼盘：<?php echo $rs["LPNAME"];?></td>
									<td>主推户型：<?php echo $rs["ZXZK"].($rs["H_SHI"]!=""?$rs["H_SHI"]."室":"").($rs["BUILD_AREA"]!=""?$rs["BUILD_AREA"]."平":"");?></td>

								</tr>
							</table>

						</li>
						<li class="two"><span style="font-size: 18px;"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/㎡":"" ;?></span></li>
						<li class="three">服务热线：<span class="org" style="font-size: 16px;"><?php echo $rs["TEL"];?></span></li>
						<li class="four" id="ckx" style="display: none;">
								<!-- 
								<label> 
									<input type="checkbox" name="CheckboxGroup1" value="对比" id="CheckboxGroup1_0" onclick="ShowDiv('apDiv2')" /> 对比
								</label>
								 -->
						</li>
					</ul>
				</div>
				<div id="tex2">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="430" style="color: #9b9b9b; line-height: 22px;">
								开发商：<?php echo $rs["KFS"];?>，占地面积：<?php echo $rs["ZDMJ"]!=""?$rs["ZDMJ"]."平米":"" ;?>
								<br /><?php echo "[".$rs["RE1"].$rs["RE2"]."]&nbsp;".$rs["LPDZ"];?>，<?php echo $rs["KPSJ"]!=""?$rs["KPSJ"]."开盘":"" ;?>，<?php echo $rs["ZXZK"];?>
							</td>

						</tr>
					</table>

				</div>
				<div>
					<div class="time"><?php $rs["INPUT_DATE"];?>发布</div>
					<?
				        $color=array("","#f55823","#f29219","#8fc843","#f96fab");
				        $labels=explode(";",$rs["LABLES"]);
				        for($li=0;$li<(count($labels)<6?count($labels)-1:5);$li++){
					?>
							<div class="tex2_bq" style="background:<?php echo $color[$li]?>;"><?php echo $labels[$li];?></div>
					<?		
						}        
			        ?>
				</div>
			</div>


		</div>
<?php }?>

<?php echo $result["pagebar"];?>
    
    <?php include_once '../wy.php';?>

	</div>
</div>
<?php include_once '../tail.php';?>
