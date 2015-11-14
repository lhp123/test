<?php 
$pos = "二手房";
$posd="列表";
?>
<?php include_once 'head.php';?>
<?php include_once 'fy_duibi.php';?>
<?php 
include_once 'action/FyAction.php';
include_once 'action/DkAction.php';
include_once 'action/PjAction.php';
$pjAction=new PjAction($conn, $CID);
$dkAction=new DkAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);
$result=$fyAction->getMmFyList();
?>

<div id="center">
  <div id="fysm"> <span class="blu">二手房</span>&nbsp;>&nbsp;共<span class="org"><?php echo $result["rows"]?></span>套在售房源 </div>
      <?php include_once 'INHEAD/search.php';?>
      
    <div id="main">
     <?php   
     $i=0;
     while ($rs = mysql_fetch_array($result["result"])){
     ?>
    <div class="main_box">
      <div id="main_box_img"> <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank">
      <img src="<?php echo getPicWithFirst($rs["TITLE_PHOTO"],$rs["PHOTO"],ZW_FY_L);?>" width="172" height="134" />
      </a> </div>
      <div id="main_box_tex">
      	<div id="tit_tex">
       	<a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank" id="db_title_<?php echo $i;?>" ><b><?php echo $rs["TITLE"]?></b></a> 
       	</div>
        <div id="tex1">
          <ul>
          	<li class="one">
            	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td><b><?php echo $rs["RE2"]?></b></td>
                        <td id="db_housetype_<?php echo $i;?>"><b><?php echo $rs["H_SHI"]?>室<?php echo $rs["H_TING"]?>厅</b></td>
                        <td id="db_area_<?php echo $i;?>"><b><?php echo numberFormatBySelf($rs["BUILD_AREA"])?>平米</b></td>
                    </tr>
                </table>
           </li>
            <li class="two" id="db_price_<?php echo $i;?>"><span style="font-size:25px;" ><?php echo numberFormatBySelf($rs["PRICE"])?></span>万<img src="<?php echo $rs["PRICE"]>$rs["LAST_PRICE"]?"images/ico5.png":"images/ico4.png";?>" width="6" height="9" /></li>
            <li class="three"><span>客户足迹：</span><span style="margin-right:20px; color:#333;"><?php echo $rs["NUM"]?></span> 经纪人房评：<span style="color:#333;"><?php echo $pjAction->getPjCountByFy($rs["ID"])?></span></li>
            <li class="four" id="ckx" style="display:none;">
                  <input type="checkbox" name="CheckboxGroup1" value="对比" id="CheckboxGroup1_<?php echo $i;?>" index_num="<?php echo $i;?>" fyid="<?php echo $rs["ID"];?>"/>对比
            </li>
          </ul>
        </div>
        <div id="tex2">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="430" style="color:#9b9b9b; line-height:22px;">
	                    	<?php echo getFloor($rs["TOP_FLOOR"],$rs["FLOOR"])?><?php //echo $rs["TOP_FLOOR"]?>
	                    	<?php echo $rs["DIRECTION"]==""?"":("，".$rs["DIRECTION"])?>
	                    	<?php echo $rs["FITMENT"]==""?"":("，".$rs["FITMENT"])?> 
	                    	<br /><?php echo $rs["DISNAME"]?>
	                    	<?php echo $rs["JZ_YEAR"]==""?"":("，".$rs["JZ_YEAR"]."年建")?>
	                    	<?php echo $rs["FRAME"]==""?"":("，".$rs["FRAME"])?>
                    	</td>
                        <td valign="top"> <?php echo numberFormatBySelf($rs["JUNJIA"])?>元/平米</td>
                    </tr>
                </table>
        	   
        </div>
        <div>
        <?php
        $color=array("","#f55823","#f29219","#8fc843","#f96fab");
        $labels=explode(";",$rs["LABLES"]);
        for($li=0;$li<(count($labels)<6?count($labels)-1:5);$li++){
		?>
		<div class="tex2_bq" style="background:<?php echo $color[$li]?>;"><?php echo $labels[$li];?></div>
		<?php		
		}        
        ?>
           <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><div class="ckxq" id="ckx2" style="display:none;">查看详情&gt;&gt;</div></a>
        </div>
      </div>
    </div>
<?php $i++;}?>

<?php echo $result["pagebar"];?>
    
    <?php include_once 'wy.php';?>
  </div>
</div>

<?php include_once 'tail.php';?>
  