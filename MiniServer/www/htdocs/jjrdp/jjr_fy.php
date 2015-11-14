<?php 
$pos = "经纪人店铺";
$posd="列表";
?>
<?php include_once '../head.php';?>

<?php 
include_once '../action/JjrAction.php';
include_once '../action/FyAction.php';
$id = filterParaAllByName("id");
$type=filterParaAllByName("type");
$jjrAction=new JjrAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);

$jjr_rs = $jjrAction->getJjrDetail($id);

if($type=="mm")
	$result=$fyAction->getMmFyList(6);
else
	$result=$fyAction->getZlFyList(6);
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
	<?php include_once 'jjr_dp_search.php';?>
    </div>
    <div id="right_box_2">
    
      	<div id="right_box_2_tit">
        	<span class="blu">共找到<span class="org1"><?php echo $result["rows"]?></span>套房子</span>
        </div>
        <div id="right_box_2main">
               <?php
               
               while($rs = mysql_fetch_array($result["result"])){
                ?>
                
          <div id="main_box" class="changeColor">
              <div id="main_box_img"> <img src="<?php if ($rs["PHOTO"]!=""){$photo = explode(";",$rs["PHOTO"]); echo $photo[0];}else {echo ZW_FY_L;}?>" width="172" height="134" /> </div>
              <div id="main_box_tex">
              	<div id="tit_tex">
               	<a href="<?php echo $rs["TYPE"]=="出售"?"/mmfy_detail.php":"/zlfy_detail.php"?>?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a> 
                </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:30px;">
                	<tr>
                    	<td width="390" style="color:#666;"><?php echo $rs["ADDRESS"]?>，<?php echo $rs["JZ_YEAR"]!=""?$rs["JZ_YEAR"]."年建":""?><?php echo $rs["FYFL"]?></td>
                    </tr>
                    <tr>
                    	<td><?php echo $rs["H_SHI"]!=""?$rs["H_SHI"]."室":""?><?php echo $rs["H_TING"]!=""?$rs["H_TING"]."厅":""?><?php echo $rs["H_WEI"]!=""?$rs["H_WEI"]."卫":""?>，<?php echo $rs["BUILD_AREA"]?>平米，<?php echo getFloor($rs["TOP_FLOOR"],$rs["FLOOR"])?></td>
                    </tr>
                    <tr>
                    	<td>单价：<?php echo getUnitPrice($rs["PRICE"],$rs["BUILD_AREA"],$rs["TYPE"])?>，首付约<?php echo $rs["SF_PRICE"]?>万，月供<?php echo $rs["YG_PRICE"]?>元</td>
                        <TD rowspan="3"><span class="org" style="font-size:18px;"><?php echo getPrice($rs["PRICE"],$rs["TYPE"])?></span></TD>
                    </tr>
                </table>
                
              </div>
            </div>
            <?php }?>
    

    
        </div>
        <?php echo $result["pagebar"];?>
       
      </div>
    
  </div>
  
</div>




<?php include_once '../tail.php';?>
