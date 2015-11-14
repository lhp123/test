<?php

$pos="楼盘代理";

$posd="详细";

?>

<?php include_once '../head.php';

?>

<?php 

 include_once '../action/LpAction.php';

 $lpid = filterParaNumberByName("lpid");

 $lpAction = new LpAction($conn, $CID);

 $rs = $lpAction->getLpDetail($lpid);

?>

<div id="center">

  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="lpdl.php">楼盘代理</a></span>&nbsp;>&nbsp;<span class="blu"><a href="lpdl_list.php?re1=<?php echo $rs["RE1"]?>"><?php echo $rs["RE1"]?></a></span>&nbsp;>&nbsp;<span class="blu"><a href="lpdl_list.php?re2=<?php echo $rs["RE2"]?>"><?php echo $rs["RE2"]?></a></span>&nbsp;>&nbsp;<span class="blu"><a href="#"><?php echo $rs["LPNAME"];?></a></span>&nbsp;</div>

  <div id="xxy_tit">

    <table width="100%"  border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td align="left" style="padding-left:10px; padding-right:10px;"></td>

        <td align="left"  style="padding-right:10px;"><strong style="float:left;"><?php echo "【".$rs["LPNAME"]."】&nbsp;".$rs["TITLE"];?></strong>

          			<?

				        $color=array("","#f55823","#f29219","#8fc843","#f96fab");

				        $labels=explode(";",$rs["LABLES"]);

				        for($li=0;$li<(count($labels)<6?count($labels)-1:5);$li++){

					?>

							<div class="tex2_bq" style="background:<?php echo $color[$li]?>;"><?php echo $labels[$li];?></div>

					<?		

						}        

			        ?>

       

      </tr>

    </table>

  </div>

  <div id="tit_main">

    <div id="tit_main_img">

      <?php 

    //$DPhotoAlt=$rs["TITLE"]==""?$rs["RE2"].$rs["DISNAME"].numberFormatBySelf($rs["PRICE"])."万".$rs["H_SHI"]."居":$rs["TITLE"];

    $DPhotos=getPicsWithAll($rs["PHOTO"],$rs["HXT"]);

    include_once '../fy_img_scroll_detail.php';

    ?>

    </div>

    <div id="tit_main_tex">

      <table border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="400" class="tit_mian_line">

          	楼盘地址：<?php echo $rs["LPDZ"];?>

          </td>

          <td class="tit_mian_line">

          	物业类型：<?php echo $rs["WYLX"];?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	开盘时间：<?php echo $rs["KPSJ"];?>

          </td>

          <td class="tit_mian_line">

          	开发商：<?php echo $rs["KFS"];?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	建筑面积：<?php echo $rs["JZMJ"];?>

          </td>

          <td class="tit_mian_line">

          	占地面积：<?php echo $rs["ZDMJ"];?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	容 积 率：<?php echo $rs["RJL"];?>

          </td>

          <td class="tit_mian_line">

          	绿 化 率：<?php echo $rs["LH"];?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	车位信息：<?php echo $rs["CWXX"];?>

          </td>

          <td class="tit_mian_line">

          	物 业 费：<?php echo $rs["WYF"];?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	主推户型：<?php echo $rs["ZXZK"].($rs["H_SHI"]!=""?$rs["H_SHI"]."室":"").($rs["BUILD_AREA"]!=""?$rs["BUILD_AREA"]."平":"");?>

          </td>

          <td class="tit_mian_line">

          	总 户 数：<?php echo $rs["ZHS"]!=""?$rs["ZHS"]."户":"" ;?>

          </td>

        </tr>

        <tr>

          <td class="tit_mian_line" width="400">

          	参考价格：<span class="org"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/平米":"";?></span>

          </td>

          <td class="tit_mian_line">

          	服务热线：<span class="org"><?php echo $rs["TEL"];?></span>

          </td>

        </tr>

      </table>

    </div>

    

  </div>

  <div id="fyjs_tit">

    <ul>

      <li style="background:#f7ab00; color:#FFF;" class="fy_tit1"><a href="#">楼盘概述</a></li>

      <li class="fy_tit2"><a href="#fyjs_img">户型图</a></li>

      <li class="fy_tit2"><a href="#fyjs_map">地理位置</a></li>

      <li class="fy_tit2"><a href="#cjfy">意向登记</a></li>

     

    </ul>

  </div>

  <div id="fyjs_main">

    <div style="font-size:16px; color:#333; padding:10px 0px;"><?php echo $rs["LPZK"];?></div>

    <div>

    </div>

  </div>

  <div id="fyjs_img">

    <div id="fyjs_img_tit"> 户型图 </div>

    <div id="fyjs_img_div">

    <?php 

    	$photo = getPicsWithAll($rs["PHOTO"], $rs["HXT"]);

    	foreach ($photo as $p){

    ?>

      <div class="fy_img_box1"> <img src="<?php echo $p==""?ZW_FY_L:$p;?>" width="422" height="301" /> </div>

    <?php }?>

    </div>

  </div>

  

  

  

  <div id="fyjs_map">

    <div id="fyjs_img_tit"> 地理位置 </div>

    

    	<iframe src="lpdl_map_detail.php?lpid=<?php echo $rs["ID"]?>"   style="width:1003px;height:251px;" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>

    

  </div>

  <div id="cjfy">

    <div id="fyjs_img_tit" style="margin-bottom:0px; margin-top:20px;"> 意向登记 </div>

    <div id="cjfy_main">

	  <div id="yxdj_main">我对这个项目很感兴趣，我要登记。（<span class="red">*</span>为必填项）</div>

      <div id="yxdj_mian">

      		<form id="myform">

      			<input type="hidden" name="FK_ID" value="<?php echo $rs["ID"];?>">

      		<table>

            	<tr>

                	<td class="blu">

                		<input name="IF_TG" type="checkbox" value="1" />&nbsp;参加该楼盘团购&nbsp;&nbsp;

                		<input name="IF_GY" type="checkbox" value="1" />&nbsp;购邮寄楼书给我&nbsp;&nbsp;

                		<input name="IF_XC" type="checkbox" value="1" />&nbsp;登记现场看房&nbsp;&nbsp;

                		<input name="IF_DZYJ" type="checkbox" value="1" />&nbsp;请通过电子邮寄联系&nbsp;&nbsp;

                		<input name="IF_TEL" type="checkbox" value="1" />&nbsp;请通过电话联系

                	</td>

                </tr>

                <tr>

                	<td>

                    	<table style="line-height:30px;">

                        	<tr>

                           	  <td width="100" align="right"><span class="red">*</span>给开发商留言：</td>

                              <td colspan="3"><textarea name="CONTENT" cols="80" rows="5"></textarea></td>

                          </tr>

                            <tr>

                           	  <td align="right"><span class="red">*</span>姓 名：</td>

                                <td>

                                	<input type="text" size="30" name="KHNAME" />

                                </td>

                                <td width="100" align="right">性别：</td>

                                <td><input name="SEX" type="radio" value="男" />&nbsp;男&nbsp;&nbsp;<input name="SEX" type="radio" value="女" />&nbsp;女&nbsp;&nbsp;</td>

                            </tr>

                            <tr>

                           	  <td align="right"><span class="red">*</span>手机：</td>

                                <td>

                                	<input type="text" size="30"  name="SHOUJI"/>

                                </td>

                                <td width="100" align="right">年龄：</td>

                                <td><input type="text" size="30" name="AGE"/></td>

                            </tr>

                            <tr>

                           	  <td align="right">QQ：</td>

                                <td>

                                	<input type="text" size="30" />

                                </td>

                                <td width="100" align="right">家庭电话：</td>

                                <td><input type="text" size="30" name="KHTEL"/></td>

                            </tr>

                            <tr>

                           	  <td align="right"><span class="red">*</span>电子邮件：</td>

                                <td>

                                	<input type="text" size="30"  name="EMAIL" />

                                </td>

                                <td width="100" align="right"><span class="red">*</span>邮政编码：</td>

                                <td><input type="text" size="30" name="YZBM"/></td>

                            </tr>

                            <tr>

                           	  <td align="right"><span class="red">*</span>通信地址：</td>

                                <td colspan="3">

                                	<input type="text" size="80" name="TXDZ" />

                                </td>

                                

                            </tr>

                            <tr>

                           	  <td align="right"></td>

                                <td colspan="3" align="center">

                                	<input id="dengji" type="button" size="80" value="登记"/>

                                </td>

                                

                            </tr>

                        </table>

                  </td>

                </tr>

            </table>

           </form>

      </div>

    </div>

  </div>

</div>





<?php include_once '../tail.php';?>