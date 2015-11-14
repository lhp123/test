<?php 
$pos = "对比";
$posd="对比";
?>
<?php include_once 'head.php';?>
<?php
$fyids=$_GET["fyid"];
$dbtype=filterParaAllByName("db_type");
include_once PATH_WEBROOT.'action/FyAction.php';
// include_once 'action/PjAction.php';
// $pjAction=new PjAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);
foreach ($fyids as $fid){
	$fyids_str.=",".$fid;
}
$fyids_str=strpos($fyids_str,",")==0?substr($fyids_str, 1):$fyids_str;
$result=$fyAction->getFyByFyids(4,$fyids_str,($dbtype=="mm"?"出售":"出租"),"");
$fy_result=$result["result"];

$classname="four";
switch($result["rows"]){
	case 1:$classname="one";break;
	case 2:$classname="two";break;
	case 3:$classname="three";break;
	case 4:$classname="four";break;
}
?>

<div id="center">
  <div id="fysm"> <span class="blu"><a href="index.php">首页</a></span>&nbsp;>&nbsp;
  <span class="blu">
  <?php if($dbtype=="mm"){?>
  <a href="mmfy_list.php">二手房</a>
  <?php }else{?>
  <a href="zlfy_list.php">租房</a>
  <?php }?>
  </span>&nbsp;>&nbsp;房源对比结果</div>
  <div id="xqxx_tit"> <span style=" font-size:16px; font-weight:bold;">房源对比</span> </div>
  <div id="fydb_main">

  <div class="essesantial">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
    <td colspan="5" class="nonebor">
    	<div class="botsste">
        	<ul>
            	<li class="one">&nbsp;</li>
            	<?php for($i=0;$i<$result["rows"];$i++){?>
            	<li class="<?php echo $classname;?>"><a hreflang="#" class="reds"></a></li>
            	<?php }?>
            </ul>
        </div>
  </td>
  </tr>
   <tr>
    <td colspan="5" class="nonebor">
    	<div class="botwrite">
        	<ul>
            	<li class="one">&nbsp;</li>
            	<?php             	
            	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
            	<li class="<?php echo $classname;?>"><a href="<?php echo ($dbtype=="mm"?"mmfy_detail.php":"zlfy_detail.php")."?id=".$dbrs["ID"]?>" target="_blank"><img onerror="this.src='/frontpage/media/upload/non_house_small.png';" src="<?php echo getPicWithFirst($dbrs["PHOTO"],$dbrs["FXT"],ZW_FY_L);?>" /></a></li>
            	<?php }?>
            </ul>
        </div>
  </td>
  </tr>
  <tr>
    <td colspan="4" class="nonebor"><div class="botomdi"><strong>基本信息</strong></div></td>
  </tr>
  <tr>
    <td class="guding">标题</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
        <td class="border_four blu"><a href="<?php echo ($dbtype=="mm"?"mmfy_detail.php":"zlfy_detail.php")."?id=".$dbrs["ID"]?>" target="_blank"><?php echo $dbrs["TITLE"]?></a></td>
        <?php }?>
      </tr>
  <tr>
    <td class="guding">小区</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
        <td class="blu"><a href="<?php echo ($dbtype=="mm"?"mmfy_detail.php":"zlfy_detail.php")."?id=".$dbrs["ID"]?>" target="_blank"><?php echo $dbrs["DISNAME"]?></a></td>
        <?php }?>
      </tr>
  <tr>
    <td class="guding">区域</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
        <td class="blu"><a href="<?php echo ($dbtype=="mm"?"mmfy_detail.php":"zlfy_detail.php")."?id=".$dbrs["ID"]?>" target="_blank"><?php echo $dbrs["RE1"]?></a>&nbsp;<a href="/ershoufang/d1b5/" target="_blank"><?php echo $dbrs["RE2"]?></a></td>
        <?php }?>
 </tr>
  <tr>
    <td class="guding">总价</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><span><?php echo $dbrs["PRICE"]?>万</span></td>        
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">均价</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><span><?php echo $dbrs["JUNJIA"]?>元/平米</span></td>
    	<?php }?>
	  </tr>
  <tr>
    <td class="guding">面积</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><span><?php echo $dbrs["BUILD_AREA"]?>平米</span></td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">户型</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["H_SHI"]?>室<?php echo $dbrs["H_TING"]?>厅</td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">楼层</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo getFloor($dbrs["TOP_FLOOR"], $dbrs["FLOOR"])?>/<?php echo $dbrs["TOP_FLOOR"]?>层</td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">朝向</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["DIRECTION"]?></td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">物业类型</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["FRAME"]?></td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">建筑年代</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["JZ_YEAR"]?></td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">装修情况</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["FITMENT"]?></td>
    	<?php }?>
      </tr>
  <tr>
    <td class="guding">配套</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["PTINFO"]?></td>
    	<?php }?>
  </tr>
  <tr>
    <td class="guding">其它</td>
    	<?php 
    	mysql_data_seek($fy_result,0);
    	for($i=0;$i<$result["rows"]&&$dbrs=mysql_fetch_array($fy_result);$i++){?>
    	<td><?php echo $dbrs["MEMO"]?></td>
    	<?php }?>
  </tr>
  <tr>
    <td colspan="4" class="nonebor"><div class="botomdi"></div></td>
  </tr>
</table>
</div>

  
  </div>
</div>
<?php include_once 'tail.php';?>