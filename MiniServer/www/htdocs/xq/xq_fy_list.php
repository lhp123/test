<?php 
$pos="小区";
$posd="详细";

?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/XqAction.php';
include_once '../action/FyAction.php';
$id = filterParaAllByName("xqid");
$type = filterParaByName("type");
$xqAction=new XqAction($conn,$CID);
$xq_rs=$xqAction->XqDetail($id);
$fyAction=new FyAction($conn, $CID);


if($type=="mm"){

    $result=$fyAction->getMmFyList1(6,$id);

}else {

    $result=$fyAction->getZlFyList1(6,$id);

}
?>

<div id="center">
<?php 
$menu = $type=="mm"?"二手房":"租房";
$xq_re1=$xq_rs["PPNAME"];
$xq_re2=$xq_rs["PNAME"];
$xq_disname=$xq_rs["NAME"];
$xq_id=$xq_rs["ID"];
$xq_address=$xq_rs["ADDRESS"];
include_once 'xq_menu.php';
?>


<div class="xq_fy">
<div class="xq_fy_sm"> 
    <span class="blu">小区房源</span>&nbsp;>&nbsp;共<span class="org"><?php echo $result["rows"]?></span>套在售房源

</div>
<?php include_once 'xq_fy_search.php';?>

<div class ="xq_fy_main">
     <?php
               
               while($rs = mysql_fetch_array($result["result"])){
    ?>
    <div class="main_box changeColor" >
              <div class="main_box_img"> <img src="<?php if ($rs["PHOTO"]!=""){$photo = explode(";",$rs["PHOTO"]); echo $photo[0];}else {echo ZW_FY_L;}?>" width="172" height="134"> </div>
              <div class="main_box_tex">
              	<div class="tit_tex">
                   	<a href="<?php echo $rs["TYPE"]=="出售"?"/mmfy_detail.php":"/zlfy_detail.php"?>?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a> 
                </div>
                <table width="700px" border="0" cellpadding="0" cellspacing="0" style="line-height:30px;">
                	<tbody>
                    		<tr>
                    	<td  style="color:#666;"><?php echo $rs["ADDRESS"]?>，<?php echo $rs["JZ_YEAR"]!=""?$rs["JZ_YEAR"]."年建":""?><?php echo $rs["FYFL"]?></td>
                    </tr>
                    <tr>
                    	<td><?php echo $rs["H_SHI"]!=""?$rs["H_SHI"]."室":""?><?php echo $rs["H_TING"]!=""?$rs["H_TING"]."厅":""?><?php echo $rs["H_WEI"]!=""?$rs["H_WEI"]."卫":""?>，<?php echo $rs["BUILD_AREA"]?>平米，<?php echo getFloor($rs["TOP_FLOOR"],$rs["FLOOR"])?></td>
                    </tr>
                    <tr>
                    	<td>单价：<?php echo getUnitPrice($rs["PRICE"],$rs["BUILD_AREA"],$rs["TYPE"])?>，首付约<?php echo $rs["SF_PRICE"]?>万，月供<?php echo $rs["YG_PRICE"]?>元</td>
                        <TD rowspan="3"><span class="org" style="font-size:18px;"><?php echo getPrice($rs["PRICE"],$rs["TYPE"])?></span></TD>
                    </tr>
                    </tbody>
                </table>
                
              </div>
            </div>
       <?php }?>

    </div>
    <?php echo $result["pagebar"];?>
</div>

<?php include_once '../tail.php';?>