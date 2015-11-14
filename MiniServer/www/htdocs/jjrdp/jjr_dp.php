<?php 
$pos = "经纪人店铺";
$posd="首页";
?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/JjrAction.php';
include_once '../action/DkAction.php';
include_once '../action/FyAction.php';
$id = filterParaAllByName("jjrid");
$jjrAction=new JjrAction($conn, $CID);
$dkAction=new DkAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);
$jjrAction->addJjrClick($id);

$jjr_rs = $jjrAction->getJjrDetail($id);
?>
<div id="center">
  <?php include_once 'jjr_dp_left.php';?>
  <div id="right_box">
    <div id="right_box_1">
      <?php 
      $jjrid=$id; 
      include_once 'jjr_dp_menu.php';
      ?>
      <div id="right_box_cn"><?php echo $jjr_rs["DP_BANNER"];?></div>
      <div id="right_box_main">
      	 <table width="100%" border="0" cellpadding="0" cellspacing="0">
      	 <?php 
      	 $result=$dkAction->getDkListByJjr($id);
      	 while($rs=mysql_fetch_array($result["result"])){
      	 ?>
      	<tr>
        	<td>
            [最新带看]&nbsp;<?php echo $rs["INDATE"];?>&nbsp;带客户看房&nbsp; <span class="blu"><a href="<?php echo ($rs["TYPE"]=="出租"?"/zlfy_detail.php.php":"/mmfy_detail.php")."?id=".$rs["FK_FYID"]?>"><?php echo $rs["DISNAME"]?>&nbsp; <?php echo $rs["H_SHI"]?>室<?php echo $rs["H_TING"]?>厅&nbsp; <?php echo $rs["BUILD_AREA"]?>平&nbsp; <?php echo $rs["PRICE"]?><?php echo $rs["TYPE"]=="出租"?"元/月":"万"?></a></span>
            </td>
        </tr>
        <?php }?>
      </table>
      </div>
      </div>
      <div id="right_box_2">
      <?php $result=$fyAction->getFyByJjr(10,$id,"",true); ?>
      	<div id="right_box_2_tit">
        	<span class="left" style="font-size:18px;">店铺 <span class="org1" style="font-size:14px;font-weight:bold;"><?php echo $result["rows"];?>套</span> 热推房源</span>
        </div>
        <div id="right_box_2main">
        <?php         
        while($rs=mysql_fetch_array($result["result"])){
        ?>
        
      <div id="main_box" class="changeColor">
      <div id="main_box_img"> <a href="<?php echo $rs["TYPE"]=="出售"?"/mmfy_detail.php":"/zlfy_detail.php"?>?id=<?php echo $rs["ID"]?>"><img src="<?php $photo = explode(";",$rs["PHOTO"]); echo $photo[0];?>" width="172" height="134" /></a> </div>
      <div id="main_box_tex">
      	<div id="tit_tex">
       	<b>[&nbsp;<?php echo str_replace("出", "",$rs["TYPE"])?>&nbsp;]</b>&nbsp;&nbsp;<a href="<?php echo $rs["TYPE"]=="出售"?"/mmfy_detail.php":"/zlfy_detail.php"?>?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a> 
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:30px;">
        	<tr>
            	<td width="390" style="color:#666;"><?php echo $rs["ADDRESS"]?>，<?php echo $rs["JZ_YEAR"]!=""?$rs["JZ_YEAR"]."年建":""?><?php echo $rs["FYFL"]?></td>
            </tr>
            <tr>
            	<td><?php echo $rs["H_SHI"]!=""?$rs["H_SHI"]."室":""?><?php echo $rs["H_TING"]!=""?$rs["H_TING"]."厅":""?><?php echo $rs["H_WEI"]!=""?$rs["H_WEI"]."卫":""?>，<?php echo $rs["BUILD_AREA"]?>平米，<?php echo getFloor($rs["TOP_FLOOR"],$rs["FLOOR"])?></td>
            </tr>
            <tr>
            	<td>单价：<?php echo getUnitPrice($rs["PRICE"],$rs["BUILD_AREA"],$rs["TYPE"])?></td>
                <TD rowspan="3"><span class="org" style="font-size:18px;"><?php echo getPrice($rs["PRICE"],$rs["TYPE"])?></span></TD>
            </tr>
        </table>
        
      </div>
    </div>
    <?php }?>
    
    
   
    
  
    
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once '../tail.php';?>