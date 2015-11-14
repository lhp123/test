  <?php 
  include_once 'action/DkAction.php';
  $yewu=filterPara($yewu);
  $kffyid=filterParaAll($kffyid);
  ?>
  <?php 
  $dkAction=new DkAction($conn, $CID);
  $result=$dkAction->getDkListByFy($kffyid, $yewu);
  if($result["rows"]>0){
  ?>
    <div id="fyjs_img_kfjl_main">
      <div><span style="font-size:14px;">最近2周增加<span class="org"><?php echo $dkAction->getDkCountByFy($kffyid,14)?></span>个客户看了本房，累计看房客户<span class="org"><?php echo $dkAction->getDkKhCountByFy($kffyid,14)?></span>户</span></div>
      <div><br />
        <table width="98%" border="0" cellpadding="0" cellspacing="0" style="border:#e4e4e4 1px solid;">
        <tr>
        <td height="180" valign="top">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr  align="center" style="background:#f5f5f5; height:32px; line-height:20px;">
            <td class="des" align="center">看房日期</td>
            <td class="des">带看经纪人</td>
            <td class="des">带看次数</td>
            <td class="des">咨询电话</td>
          </tr>
          <?php
          while($rsdk=mysql_fetch_array($result["result"])){
          ?>
          <tr align="center" style="height:32px; line-height:32px;">
            <td class="des1"><?php echo $rsdk["INPUT_DATE"]?></td>
            <td class="des1"><?php echo $rsdk["USERNAME"]?></td>
            <td class="des1"><?php echo $rsdk["C"]?>次</td>
            <td class="des1"><?php echo $rsdk["USERTEL"]?></td>
          </tr>
          <?php }?>
        </table>
        </td>
             <td width="200" height="180" align="center" valign="middle" style="background:#f5f5f5;" >
            <?php 
            $rsdkgj=$dkAction->getDkGuanjun($kffyid, $yewu);
            ?>
              <div id="kfjl_img"> <img src="<?php echo ($rsdkgj["USERPHOTO"]==""?ZW_JJR:$rsdkgj["USERPHOTO"]);?>" width="106" height="139" /> </div>
              <span class="blu"><?php echo $rsdkgj["USERNAME"]?></span><br />
              <span class="org" style="font-size:14px;"><strong><?php echo $rsdkgj["USERTEL"]?></strong></span>
            </td>
                          </tr>
        </table>
        <div id="fany">
           <?php echo $result["pagebar"];?>
        </div>
      </div>
    </div>
    <?php }?>
