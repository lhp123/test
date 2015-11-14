<?php 
include_once '../action/JjrAction.php';
$id = filterParaAllByName("jjrid");
$jjrAction=new JjrAction($conn, $CID);

$jjr_rs = $jjrAction->getJjrDetail($id);
?>
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="/jjr_list.php">经纪人</a></span>&nbsp;>&nbsp;<span class="blu"><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $jjr_rs["ID"]?>"><?php echo $jjr_rs["USERNAME"]?>的店铺</a></span></div>
 
  <div id="left_box">
    <ul>
      <li>
        <div class="left"> <img src="<?php echo $jjr_rs["PHOTO"]!=""?$jjr_rs["PHOTO"]:ZW_JJR;?>" width="90" height="118" /> </div>
        <div class="left" style="line-height:20px; margin-left:10px;"> <span style="font-size:16px; line-height:30px; font-weight:bold;"><?php echo $jjr_rs["USERNAME"]?></span><br />
                                      所在门店：<?php echo $jjr_rs["DEPTNAME"]?><br />
                                      近30天带看量：<span class="org1"><?php echo $jjr_rs["DK_NUM"]?></span><br />
                                      待出售房源量：<span class="org1"><?php echo getSameUserCount($conn,$CID,$jjr_rs["ID"],"出售")?></span>套<br />
          <div id="scdp"><a href="javascript:alert('请使用\&quot;Ctrl \+ d\&quot;添加收藏栏!');">+ 收藏店铺</a></div>
        </div>
      </li>
    </ul>
    <div id="left_box_tel"><?php echo $jjr_rs["TEL"]?> </div>
    <div id="left_box1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><span style="font-size:18px; font-weight:bold; line-height:40px;">擅长业务</span></td>
        </tr>
        <tr valign="top">
          <td width="60">熟悉商圈:</td>
          <td>
                  <?php 
                    $sxsq = explode(";",$jjr_rs["FWSQ"]);
                     echo implode("&nbsp;",$sxsq); 
                  ?>
          </td>
        </tr>
        <tr valign="top">
          <td>熟悉小区:</td>
          <td>
                  <?php 
                    $sxsq = explode(";",$jjr_rs["ZGXQ"]);
                     echo implode("&nbsp;",$sxsq); 
                  ?>
          </td>
        </tr>
        <tr valign="top">
          <td>擅长业务:</td>
          <td>
                  <?php 
                    $sxsq = explode(";",$jjr_rs["SCYW"]);
                     echo implode("&nbsp;",$sxsq); 
                  ?>
          </td>
        </tr>
      </table>
    </div>
    <div id="left_box1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><span style="font-size:18px; font-weight:bold; line-height:40px;">个人介绍</span></td>
        </tr>
        <tr valign="top">
          <td><?php echo $jjr_rs["MEMO"]?></td>
        </tr>
      </table>
    </div>
  </div>
  