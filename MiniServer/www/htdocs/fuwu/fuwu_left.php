<?php
include_once '../action/NewsAction.php';
$newsAction=new NewsAction($conn, $CID);
$subtype=filterParaByName("subtype");
?>
  <div class="left" id="news_right">
  <div id="zjjjr1" style="margin-left:0px;">
  	<div id="zjjjr_tit" style="background:#FFF; border-bottom:none; "><span class="left" style="margin-left:5px; color:#0180b5; font-size:15px; font-family:'微软雅黑';">服务项目</span></div>
    <div id="zjjjr_main2">
     <ul>
     <?php 
     $result=$newsAction->getSubtypeByType("交易工具");     
     while($rst = mysql_fetch_array($result["result"])){
	?>
        <li class="<?php echo $subtype==$rst["NAME"]?"fwleftvisit":"fwleft"?>">
          <a href="fuwu_list.php?subtype=<?php echo $rst["NAME"]?>"><strong>+</strong>&nbsp;<?php echo $rst["NAME"]?></a> 
        </li>
	<?php 
     }
     ?>
        <li class="<?php echo $subtype==""?"fwleftvisit":"fwleft"?>" style="border-bottom:none;">
          <a href="fuwu.php"><strong>+</strong>&nbsp;房贷计算器</a>
       	</li>
     </ul>
    </div>
  </div>
  </div>
  