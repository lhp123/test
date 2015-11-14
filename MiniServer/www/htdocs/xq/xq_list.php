<?php 
$pos = "小区";
$posd="列表";
?>
<?php include_once '../head.php';?>

<?php 
include_once '../action/XqAction.php';
include_once '../action/CjAction.php';
$xqAction=new XqAction($conn, $CID);
$cjAction=new CjAction($conn,$CID);
$result=$xqAction->getXqList();
?>

<div id="center">
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="xq_list.php">小区</a></span>&nbsp;共<span class="org"><?php echo $result["rows"]?></span>个小区 </div>
    <?php include_once '../INHEAD/search.php';?>
     <div id="main">
     <?
     while ($rs = mysql_fetch_array($result["result"])){
     ?>
    <div class="main_box " >
      <div id="main_box_img"> <a href="xq_detail.php?xqid=<?php echo $rs["ID"]?>"><img src="<?php echo getPicWithFirst($rs["SJT"],$rs["BWT"],ZW_FY_L);?>" width="172" height="134" /></a> </div>
      <div id="main_box_tex">
      	<div id="tit_tex">
       	<a href="xq_detail.php?xqid=<?php echo $rs["ID"]?>"><?php echo $rs["NAME"]."&nbsp;".$rs["TITLE"]?></a> </div>
        <div id="tex1">
          <ul>
          	<li style="font-size:12px;">
            	<table width="781" border="0" cellpadding="0" cellspacing="0">
                	<tr align="center">
                    	<td height="28" align="left" width="40%"><span class="blu">[<?php echo $rs["PPNAME"]."&nbsp;".$rs["PNAME"]?>]</span></td>
                        <td width="20%">成交均价</td>
                        <td width="20%">涨跌幅</td>
                        <td width="20%">近30天成交</td>
                    </tr>
                    <tr  align="center">
                    	<td align="left" height="25"><?php echo substr($rs["ND"],0,4)?>年建成&nbsp;<?php echo str_replace(";","&nbsp;",$rs["JG"])?></td>
                        <td><span class="org" style="font-size:16px;"><?php echo numberFormatBySelf($rs["JUNJIA"])//getXqCjJunjia_CurMonth($rs["ID"],$CID,$conn)?>元/平米</span></td>
                        <td>环比上月<span class="org" style="font-size:16px;"><?php
                        $hbper=getXqHuanBiPer($cjAction->getXqCjJunjia_LastMonth($rs["ID"]),$cjAction->getXqCjJunjia_CurMonth($rs["ID"]));//$rs["ZHANGDIE"];
                        echo (($hbper>0?"&uarr;":($hbper<0?"&darr;":"")).$hbper);
                        ?>%</span></td>
                        <td><span class="blu" style="font-size:16px;"><?php echo $rs["CJNUM"]//getXqCjTaoshu($rs["ID"],$CID,$conn," and datediff(NOW(),CJ_DATE)<=30")?></span></td>
                    </tr>
                </table>
           </li>

          </ul>
        </div>
        <div id="tex2">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td width="430" style="color:#9b9b9b; line-height:22px;">出售：                    	
                    	<?php 
                    	$mmc=getFyCountByDistrict($rs["ID"],"出售",$CID,$conn);
                    	if($mmc>0){
                    	?>
                    	<a href="/mmfy_list.php?xqid=<?php echo $rs["ID"];?>" target="_blank"><span class="org"><?php echo $mmc; ?></span></a>
                    	<?php }else{?>
                    	<span class="org"><?php echo $mmc;?></span>
                    	<?php }?>                    	
                    	&nbsp;|&nbsp;出租：
                    	<?php 
                    	$zlc=getFyCountByDistrict($rs["ID"],"出租",$CID,$conn);
                    	if($zlc>0){
                    	?>
                    	<a href="/zlfy_list.php?xqid=<?php echo $rs["ID"];?>" target="_blank"><span class="org"><?php echo $zlc; ?></span></a>
                    	<?php }else{?>
                    	<span class="org"><?php echo $zlc;?></span>
                    	<?php }?>  
                    </tr>
                </table>
        	   
        </div>
        <div>
       	<?php echo $rs["LABLES"]==""?"":("<div class='tex2_bq'>".$rs["LABLES"]."</div>")?>
           <a href="xq_detail.php?xqid=<?php echo $rs["ID"]?>" target="_blank"><div class="ckxq" id="ckx2" style="display:none;" >查看详情&gt;&gt;</div></a>
        </div>
      </div>
    </div>
   
   <?php }?>
   
    </div>
    
	<?php echo $result["pagebar"];?>
    <?php include_once '../wy.php';?>
  </div>
</div>

<?php include_once '../tail.php';?>
