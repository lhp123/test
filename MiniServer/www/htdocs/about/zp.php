<?php 
$pos = "招聘";
?>
<?php include_once '../head.php';?>
<?php 
$id = filterParaAllByName("id");
$type = filterParaByName("type");
?>
<div id="center">
  
<?php include_once 'left.php';?>
  
  <div id="jjr_list">
    <div id="jjr_list_titi"> 智能招聘 </div>
    <div id="news_main1">
      <div id="zpbox1">
        <ul>
<?php 
$stmt = mysql_query("select DISTINCT TYPE from XT_ZP WHERE TYPE!='' AND CID = '".$CID."' ",$conn);
//ECHO "select DISTINCT TYPE from XT_ZP WHERE CID = '".$CID."' ";
while ($rs = mysql_fetch_array($stmt)){
?>
    <li><?=$rs[0]?>：
    <?php 
        $stmt3 = mysql_query("select ID,TITLE FROM XT_ZP WHERE TYPE = '".$rs[0]."' and CID = '".$CID."'",$conn);
        while($rs3= mysql_fetch_array($stmt3)){
            echo "<span class='blu'><a href='zp.php?id=".$rs3["ID"]."'>".$rs3["TITLE"]."</a></span>";
        }
    ?>
    </li>
<?php }?>
        </ul>
      </div>
<?php 
if ($id!=""){
    $stmt1 = mysql_query("select DUTY,ZIGE,TYPE,TITLE from XT_ZP WHERE ID='".$id."' and CID = '".$CID."'",$conn);
}else{
    $stmt1 = mysql_query("select * from XT_ZP where CID='".$CID."' limit 0,1",$conn);
}
    

?>
     
<?php 
while($rs2 = mysql_fetch_array($stmt1)){
?>    
        <div id="news_main_zp_tit"><?=$rs2["TYPE"]?> </div>
      <div id="news_main_zp_main"> <span class="blu2" style="font-size:14px;"><p><?=$rs2["TITLE"]?></p></span>
        <div style=" margin-left:25px; display:block;"><strong>岗位职责</strong><br />
        <?=$rs2["DUTY"]?>
        <br /><strong>任职要求</strong><br />
        <?=$rs2["ZIGE"]?>
        </div>
      </div>
 <?php }?>
 <div>
        	<p class="yell blu2" style="font-size:14px;">联系方式</p>
            <div style=" margin-left:25px; display:block; font-weight:bold;">
        	<?php 
        	$stmt = mysql_query("select * from XT_COM WHERE ID = '".$CID."'",$conn);
        	while($rs = mysql_fetch_array($stmt)){
                 $tel = $rs["TEL"];
                 $yx = $rs["YX"];   
             }
        	?>
			<span>联系电话：<?=$tel?></span><br>
			<span>简历投递邮箱：<?=$yx?></span><p></p>
           </div>
        </div>
    </div>
  </div>
</div>
<?php include_once '../tail.php';?>