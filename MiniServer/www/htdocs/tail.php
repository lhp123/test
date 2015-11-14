  <div id="footer">

    <div id="footer_main">

      <div id="footer_main_yq">

        <table border="0" cellpadding="0" cellspacing="0">

          <tr>

            <td valign="middle" width="70" height="73"><strong>合作伙伴:</strong></td>

            <td><ul>

                <?php 

                $stmt = mysql_query("select * from XT_LINK WHERE CID = '".$CID."'",$conn);

                while ($rs= mysql_fetch_array($stmt)){

                ?>

                <li><a href="<?php echo $rs["URL"];?>"><?php echo $rs["MEMO"];?></a></li>

                <?php }?>

              </ul></td>

          </tr>

        </table>

      </div>

    </div>

    <div id="footer_line"></div>

    <div id="footer_main2"> <a href="/index.php">首页</a> | <a href="/mmfy_list.php">二手房</a> | <a href="/zlfy_list.php">租房</a> | <a href="/xq/xq_list.php">小区</a> | <a href="/jjr_list.php">经纪人</a> | <a href="/lpdl/lpdl.php">一手楼</a> | <a href="/map.php">地图</a> | <a href="/about/zp.php">招聘</a> | <a href="/about/gywm.php">关于我们</a><br />

      <?php echo $E_BANQUAN;?> <br />

      公司地址：<?php echo $COMADDRESS;?>  联系电话：<?php echo $COMTEL;?> <a href="/admin/login.php" target="_blank"><strong>管理后台</strong></a><br />

      版权所有：<?php echo $BANQUAN;?>   ICP备案号：<?php echo $BEIAN;?> </div>

  </div>

</div>







<div id="tbox"> <a id="gotop" href="javascript:void(0)"></a> </div>

</body>

</html>