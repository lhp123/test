<!-- 房源搜索 条件 -->
<style type="text/css">
#search1 #searchform dl {
	display: block;
}
</style>

<div id="search1">
  <form id ="searchform" action="" method="get">
   <input name="mohu" type="hidden" value="<?php echo filterParaByName("mohu")?>" id="mohu">
    <dl>    
<script>
  function clearmohu(){
	 document.getElementById("mohu").value="";
  }
</script>
      <dd class="dd1">区域：</dd>
      <dd class="dd2" stype='re'> <a href="javascript:void(0);" <?php echo filterParaByName("re1")==""&&filterParaByName("re2")==""?"style='color: #ff7f00;'":""?> onclick="clearmohu()">不限</a>
        <?php 
       $i= 0;
       $re1 = array();
       $stmt1 = mysql_query("select * from PZ_RE1 where CID = '".$CID."' and IF_TB = 1",$conn);
       while($rs1 = mysql_fetch_array($stmt1)){
            $i++;
            $re1[$i] = array('name' =>$rs1["NAME"],'i'=>$i );
            echo "<a href='javascript:void(0);' ".(filterParaByName("re1")==$rs1["NAME"]?"style='color: #ff7f00;'":"").">".$rs1["NAME"]."</a>";
        }
       
   ?>
        <input  id= "re1" name="re1" type="hidden" value="<?php echo filterParaByName("re1")?>"/>
        <input  id= "re2" name="re2" type="hidden" value="<?php echo filterParaByName("re2")?>"/>
      </dd>
      <div class="clear"></div>
      <dt>
        <?php  foreach ($re1 as $re11) { ?>
        <div id="aa<?php echo $re11["i"]?>" style ="display: none; margin:0 0 0 57px;" class="all_area2">
          <div class="apDiv1">
  <p style="
    margin: 0px;
    padding: 0px;
"><img src="/images/jt.png" width="11" height="7" /></p> 
  </div>
          <div  class="all_area">
            <ul>
              <li><a href='javascript:void(0);' value="<?php echo $re11["name"]?>" <?php echo filterParaByName("re1")!=""&&filterParaByName("re2")==""?"style='color: #ff7f00;font-weight:bold;'":""?>>不限</a></li>
              <?php 
            	$stmt2 = mysql_query("select * from PZ_RE2 where CID = '".$CID."' and PNAME='".$re11["name"]."' order by taborder limit 0,50",$conn);
            	while($rs2 = mysql_fetch_array($stmt2)){
        	        echo "<li>&nbsp;<a href='javascript:void(0);' ".(filterParaByName("re2")==$rs2["NAME"]?"style='color: #ff7f00;font-weight:bold;'":"")." >".$rs2["NAME"]."</a>&nbsp;</li>";
                 }
        	?>
            </ul>
            <ul>
              <li><b style='color:#0180B5;'><?php echo $re11["name"]?>热点商圈:</b></li>
              <?php 
            	$stmtzd = mysql_query("select * from PZ_RE2 where CID = '".$CID."' and PNAME='".$re11["name"]."' and if_zd=1 order by taborder",$conn);
            	while($rszd = mysql_fetch_array($stmtzd)){
        	        echo "<li>&nbsp;<a href='javascript:void(0);' ".(filterParaByName("re2")==$rszd["NAME"]?"style='color: #ff7f00;font-weight:bold;'":"")." >".$rszd["NAME"]."</a>&nbsp;</li>";
                 }
        	?>
            </ul>
          </div>
        </div>
        <?php }?>
    </dl>
    <?php if($pos=="二手房"){?>
    <dl>
      <dd class="dd1">售价：</dd>
      <dd class="dd2" stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("pricedown")==""&&filterParaByName("priceup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='价格区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("pricedown")==$rs["DOWN"]&&filterParaByName("priceup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        <input type="text" size="3" id="down" name="pricedown" value="<?php echo filterParaNumberByName("pricedown")?>"/>
        -
        <input type="text" size="3" id="up" name="priceup" value="<?php echo filterParaNumberByName("priceup")?>" />
        万 </a>
        <input type="submit" value="确定" / style="color: #666666;border: 1px solid #DDDDDD;background: none repeat scroll 0 0 #F3F3F3;">
      </dd>
    </dl>
    <?php }elseif($pos=="租房"){?>
    <dl>
      <dd class="dd1">租金：</dd>
      <dd class="dd2"  stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("pricedown")==""&&filterParaByName("priceup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='租赁价格区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("pricedown")==$rs["DOWN"]&&filterParaByName("priceup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        <input type="text" size="3" id="down" name="pricedown" value="<?php echo filterParaNumberByName("pricedown")?>"/>
        -
        <input type="text" size="3" id="up" name="priceup" value="<?php echo filterParaNumberByName("priceup")?>"/>
        元 </a>
        <input type="submit" value="确定" / style="color: #666666;border: 1px solid #DDDDDD;background: none repeat scroll 0 0 #F3F3F3;">
      </dd>
    </dl>
    <?php }elseif ($pos=="小区"){?>
    <dl>
      <dd class="dd1">均价：</dd>
      <dd class="dd2" stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("pricedown")==""&&filterParaByName("priceup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='成交均价区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("pricedown")==$rs["DOWN"]&&filterParaByName("priceup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        <input type="text" size="3" id="down" name="pricedown" value="<?php echo filterParaNumberByName("pricedown")?>" />
        -
        <input type="text" size="3" id="up" name="priceup" value="<?php echo filterParaNumberByName("priceup")?>"/>
        万 </a>
        <input type="submit" value="确定" / style="color: #666666;border: 1px solid #DDDDDD;background: none repeat scroll 0 0 #F3F3F3;">
      </dd>
    </dl>
    <?php }elseif ($pos=="楼盘代理"){?>
    <dl>
      <dd class="dd1">均价：</dd>
      <dd class="dd2" stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("pricedown")==""&&filterParaByName("priceup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='楼盘价格区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("pricedown")==$rs["DOWN"]&&filterParaByName("priceup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        <input type="text" size="3" id="down" name="pricedown" value="<?php echo filterParaNumberByName("pricedown")?>"/>
        -
        <input type="text" size="3" id="up" name="priceup" value="<?php echo filterParaNumberByName("priceup")?>" />
        万 </a>
        <input type="submit" value="确定" / style="color: #666666;border: 1px solid #DDDDDD;background: none repeat scroll 0 0 #F3F3F3;">
      </dd>
    </dl>
    <?php } ?>
    <?php if($pos=="二手房"||$pos=="租房"){?>
    <dl>
      <dd class="dd1">面积：</dd>
      <dd class="dd2" stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("areadown")==""&&filterParaByName("areaup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='面积区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("areadown")==$rs["DOWN"]&&filterParaByName("areaup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        <input id="down" name="areadown" type="hidden" value="<?php echo filterParaNumberByName("areadown")?>"/>
        <input id="up" name="areaup" type="hidden" value="<?php echo filterParaNumberByName("areaup")?>"/>
      </dd>
    </dl>
    <dl>
      <dd class="dd1">房型：</dd>
      <dd class="dd2" stype="dan"> <a href="javascript:void(0);" value="" <?php echo filterParaByName("shi")==""?"style='color: #ff7f00;'":""?>>不限</a> <a href="javascript:void(0);" value="1" <?php echo filterParaByName("shi")=="1"?"style='color: #ff7f00;'":""?>>1室</a> <a href="javascript:void(0);" value="2" <?php echo filterParaByName("shi")=="2"?"style='color: #ff7f00;'":""?>>2室</a> <a href="javascript:void(0);" value="3" <?php echo filterParaByName("shi")=="3"?"style='color: #ff7f00;'":""?>>3室</a> <a href="javascript:void(0);" value="4" <?php echo filterParaByName("shi")=="4"?"style='color: #ff7f00;'":""?>>4室</a> <a href="javascript:void(0);" value="5" <?php echo filterParaByName("shi")=="5"?"style='color: #ff7f00;'":""?>>5室</a> <a href="javascript:void(0);" value="6" <?php echo filterParaByName("shi")=="6"?"style='color: #ff7f00;'":""?>>5室以上</a>
        <input id="dan" name="shi" type="hidden" value="<?php echo filterParaNumberByName("shi")?>" >
      </dd>
    </dl>
    <dl >
      <dd class="dd1" style="border:none;">筛选：</dd>
      <dd class="dd2" style="border:none;" stype='dan'>
        <div style="position: absolute; margin:0px; padding:0px;">
          <div id="nav">
            <ul>
              <li class="menu2" onMouseOver="this.className='menu1'" onMouseOut="this.className='menu2'" ><?php echo filterParaByName("chaoxiang")==""?"朝向":filterParaByName("chaoxiang")?>
                <div class="list"> <?php echo filterParaByName("chaoxiang")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                  <?php 
                      $stmt = mysql_query("select * from PZ_PROFILE where TYPE='朝向' and CID='".$CID."' order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                      }
                  ?>
                  <input type="hidden" name="chaoxiang" value="<?php echo filterParaByName("chaoxiang")?>" id="dan" />
                </div>
              </li>
            </ul>
          </div>
          <div id="nav">
            <ul>
              <li class="menu4" onMouseOver="this.className='menu3'" onMouseOut="this.className='menu4'" ><?php echo filterParaByName("jz_year")==""?"楼龄":filterParaByName("jz_year")?>
                <div class="list"> <?php echo filterParaByName("jz_year")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                  <?php 
                      $stmt = mysql_query("select * from PZ_BOUND where TYPE='楼龄' and CID='".$CID."'  order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["DOWN"]."-".$rs["UP"]."'>".$rs["MEMO"]."</a><BR />";
                      }
                  ?>
                  <input type="hidden" name="jz_year" value="<?php echo filterParaByName("jz_year")?>" id="dan" />
                </div>
              </li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="menu4" onMouseOver="this.className='menu3'" onMouseOut="this.className='menu4'" ><?php echo filterParaByName("floor")==""?"楼层":filterParaByName("floor")?>
              <div class="list"> <?php echo filterParaByName("floor")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                      $stmt = mysql_query("select * from PZ_PROFILE where TYPE='楼层' and CID='".$CID."'  order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                      }
                  ?>
                <input type="hidden" name="floor" value="<?php echo filterParaByName("floor")?>" id="dan" />
              </div>
            </li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="menu6" onMouseOver="this.className='menu5'" onMouseOut="this.className='menu6'" ><?php echo filterParaByName("label")==""?"全部标签":filterParaByName("label")?>
              <div class="list"> <?php echo filterParaByName("label")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                      $stmt = mysql_query("select * from PZ_PROFILE where TYPE='房屋标签' and CID='".$CID."'  order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                      }
                  ?>
                <input type="hidden" name="label" value="<?php echo filterParaByName("label")?>" id="dan" />
              </div>
            </li>
            </ul>
          </div>
          <?
            
            $ordern=filterParaAllByName("ordern");
            $ordert=filterParaAllByName("ordert");
            ?>
          <div id="nav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：</div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="default"||$ordern=="")?"menu7":"menu8"?>"><a href="javascript:void(0);"  stype="paixu" value="default">默认排序</a></li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="BUILD_AREA")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="BUILD_AREA;<?php echo changePxType("BUILD_AREA",$ordern,$ordert,"up")?>">面积<b class="<?php echo changePxImg("BUILD_AREA",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav">
            <?php if($pos=="二手房"){?>
            <ul>
            <li class="<?php echo ($ordern=="INPUT_DATE")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="INPUT_DATE;<?php echo changePxType("INPUT_DATE",$ordern,$ordert,"down")?>">时间<b class="<?php echo changePxImg("INPUT_DATE",$ordern,$ordert,"pxdefdown")?>">&nbsp;</b></a></li>
            </ul>
            <?php }else if($pos=="租房"){?>
            <ul>
            <li class="<?php echo ($ordern=="LAST_OPER_DATE")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="LAST_OPER_DATE;<?php echo changePxType("LAST_OPER_DATE",$ordern,$ordert,"down")?>">时间<b class="<?php echo changePxImg("LAST_OPER_DATE",$ordern,$ordert,"pxdefdown")?>">&nbsp;</b></a></li></ul>
            <?php }?>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="JUNJIA")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="JUNJIA;<?php echo changePxType("JUNJIA",$ordern,$ordert,"up")?>">单价<b class="<?php echo changePxImg("JUNJIA",$ordern,$ordert)?>">&nbsp;</b></a></li></ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="PRICE")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="PRICE;<?php echo changePxType("PRICE",$ordern,$ordert,"up")?>">总价<b class="<?php echo changePxImg("PRICE",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="NUM")?"menu7":"menu8"?>" style="width:80px;"><a href="javascript:void(0);" stype="paixu" value="NUM;<?php echo changePxType("NUM",$ordern,$ordert,"down")?>">客户足迹<b class="<?php echo changePxImg("NUM",$ordern,$ordert)?>">&nbsp;</b></a></li>
          </ul>
          </div>
          <input type="hidden" name="ordern" value="<?php echo $ordern?>" id="ordern" />
          <input type="hidden" name="ordert" value="<?php echo $ordert?>" id="ordert" />
        </div>
      </dd>
    </dl>
    <?php }?>
    <?php if($pos=="小区"){?>
    <dl>
      <dd class="dd1" style="border:none;">筛选：</dd>
      <dd class="dd2" style="border:none;" stype="dan">
        <div style="position: absolute; margin:0px; padding:0px;">
          <div id="nav">
          <ul>
            <li  class="menu6" onMouseOver="this.className='menu5'" onMouseOut="this.className='menu6'" ><?php echo filterParaByName("zzlx")==""?"住宅类型":filterParaByName("zzlx")?>
              <div class="list"> <?php echo filterParaByName("zzlx")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                  $stmt = mysql_query("select * from PZ_PROFILE where TYPE='住宅类型' and CID='".$CID."'  order by TABORDER",$conn);
                  while($rs = mysql_fetch_array($stmt)){
                      echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                  }
                  ?>
                <input type="hidden" name="zzlx" id="dan" value="<?php echo filterParaByName("zzlx")?>" />
              </div>
            </li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="menu4" onMouseOver="this.className='menu3'" onMouseOut="this.className='menu4'" ><?php echo filterParaByName("jzlx")==""?"建筑类型":filterParaByName("jzlx")?>
              <div class="list"> <?php echo filterParaByName("jzlx")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                  $stmt = mysql_query("select * from PZ_PROFILE where TYPE='建筑类型' and CID='".$CID."'  order by TABORDER",$conn);
                  while($rs = mysql_fetch_array($stmt)){
                      echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                  }
                  ?>
                <input type="hidden" name="jzlx" id="dan" value="<?php echo filterParaByName("jzlx")?>" />
              </div>
            </li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="menu6" onMouseOver="this.className='menu5'" onMouseOut="this.className='menu6'" ><?php echo filterParaByName("jz_year")==""?"楼龄":filterParaByName("jz_year")?>
              <div class="list"> <?php echo filterParaByName("jz_year")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                      $stmt = mysql_query("select * from PZ_BOUND where TYPE='楼龄' and CID='".$CID."'  order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["DOWN"]."-".$rs["UP"]."'>".$rs["MEMO"]."</a><BR />";
                      }
                  ?>
                <input type="hidden" name="jz_year" id="dan" value="<?php echo filterParaByName("jz_year")?>" />
              </div>
            </li>
            </ul>
          </div>
          <?            
            $ordern=filterParaAllByName("ordern");
            $ordert=filterParaAllByName("ordert");
            ?>
          <div id="nav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：</div>
          <input type="hidden" name="ordern" value="<?php echo $ordern?>" id="ordern" />
          <input type="hidden" name="ordert" value="<?php echo $ordert?>" id="ordert" />
          <div id="nav" stype="order">
          <ul>
            <li class="<?php echo ($ordern=="default"||$ordern=="")?"menu7":"menu8"?>"><a href="javascript:void(0);"  stype="paixu" value="default">默认排序</a></li>
            </ul>
          </div>
          <div id="nav" stype="order">
          <ul>
            <li class="<?php echo ($ordern=="JUNJIA")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="JUNJIA;<?php echo changePxType("JUNJIA",$ordern,$ordert,"up")?>">均价<b class="<?php echo changePxImg("JUNJIA",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav" stype="order">
          <ul>
            <li class="<?php echo ($ordern=="ZHANGDIE")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="ZHANGDIE;<?php echo changePxType("ZHANGDIE",$ordern,$ordert,"up")?>">涨跌幅<b class="<?php echo changePxImg("ZHANGDIE",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav" stype="order">
          <ul>
            <li class="<?php echo ($ordern=="CJSUM")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="CJSUM;<?php echo changePxType("CJSUM",$ordern,$ordert,"down")?>">成交量<b class="<?php echo changePxImg("CJSUM",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
        </div>
      </dd>
    </dl>
    <?php }?>
    <?php if($pos=="楼盘代理"){?>
    <dl>
      <dd class="dd1">面积：</dd>
      <dd class="dd2" stype="qujian"> <a href="javascript:void(0);" down="" up="" <?php echo filterParaByName("areadown")==""&&filterParaByName("areaup")==""?"style='color: #ff7f00;'":""?>>不限</a>
        <?php 
      $stmt = mysql_query("select * from PZ_BOUND where TYPE='面积区间' and CID='".$CID."' order by TABORDER ");
      while($rs = mysql_fetch_array($stmt)){
          echo "<a href='javascript:void(0);' down='".$rs["DOWN"]."' up ='".$rs["UP"]."' ".(filterParaByName("areadown")==$rs["DOWN"]&&filterParaByName("areaup")==$rs["UP"]?"style='color: #ff7f00;'":"").">".$rs["MEMO"]."</a>";
      }
  ?>
        (主推面积)
        <input id="down" name="areadown" type="hidden" value="<?php echo filterParaNumberByName("areadown")?>"/>
        <input id="up" name="areaup" type="hidden" value="<?php echo filterParaNumberByName("areaup")?>"/>
      </dd>
    </dl>
    <dl>
      <dd class="dd1">房型：</dd>
      <dd class="dd2" stype="dan"> <a href="javascript:void(0);" value="" <?php echo filterParaByName("shi")==""?"style='color: #ff7f00;'":""?>>不限</a> <a href="javascript:void(0);" value="1" <?php echo filterParaByName("shi")=="1"?"style='color: #ff7f00;'":""?>>1室</a> <a href="javascript:void(0);" value="2" <?php echo filterParaByName("shi")=="2"?"style='color: #ff7f00;'":""?>>2室</a> <a href="javascript:void(0);" value="3" <?php echo filterParaByName("shi")=="3"?"style='color: #ff7f00;'":""?>>3室</a> <a href="javascript:void(0);" value="4" <?php echo filterParaByName("shi")=="4"?"style='color: #ff7f00;'":""?>>4室</a> <a href="javascript:void(0);" value="5" <?php echo filterParaByName("shi")=="5"?"style='color: #ff7f00;'":""?>>5室</a> <a href="javascript:void(0);" value="6" <?php echo filterParaByName("shi")=="6"?"style='color: #ff7f00;'":""?>>5室以上</a>(主推房型)
        <input id="dan" name="shi" type="hidden" value="<?php echo filterParaNumberByName("shi")?>" >
      </dd>
    </dl>
    <dl >
      <dd class="dd1" style="border:none;">筛选：</dd>
      <dd class="dd2" style="border:none;" stype='dan'>
        <div style="position: absolute; margin:0px; padding:0px;">
          <div id="nav">
          <ul>
            <li class="menu6" onMouseOver="this.className='menu5'" onMouseOut="this.className='menu6'" ><?php echo filterParaByName("label")==""?"全部标签":filterParaByName("label")?>
              <div class="list"> <?php echo filterParaByName("label")!=""?"<a href='javascript:void(0);' value=''>全部</a><BR />":""?>
                <?php 
                      $stmt = mysql_query("select * from PZ_PROFILE where TYPE='楼盘标签' and CID='".$CID."'  order by TABORDER",$conn);
                      while($rs = mysql_fetch_array($stmt)){
                          echo "<a href='javascript:void(0);' value='".$rs["NAME"]."'>".$rs["NAME"]."</a><BR />";
                      }
                  ?>
                <input type="hidden" name="label" value="<?php echo filterParaByName("label")?>" id="dan" />
              </div>
            </li>
            </ul>
          </div>
          <div id="nav">&nbsp;&nbsp;
            <input type="checkbox" name="ifrt" <?php echo filterParaAllByName("ifrt")=="1"?"checked":""?> />
            热推&nbsp;&nbsp;</div>
          <div id="nav">
            <input type="checkbox" name="ifcx" <?php echo filterParaAllByName("ifcx")=="1"?"checked":""?> />
            促销</div>
          <?
            
            $ordern=filterParaAllByName("ordern");
            $ordert=filterParaAllByName("ordert");
            ?>
          <div id="nav" style="width: 350px;text-align: right;">排序：</div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="default"||$ordern=="")?"menu7":"menu8"?>"><a href="javascript:void(0);"  stype="paixu" value="default">默认排序</a></li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="BUILD_AREA")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="BUILD_AREA;<?php echo changePxType("BUILD_AREA",$ordern,$ordert,"up")?>">面积<b class="<?php echo changePxImg("BUILD_AREA",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="INPUT_DATE")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="INPUT_DATE;<?php echo changePxType("INPUT_DATE",$ordern,$ordert,"down")?>">时间<b class="<?php echo changePxImg("INPUT_DATE",$ordern,$ordert,"pxdefdown")?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <div id="nav">
          <ul>
            <li class="<?php echo ($ordern=="JUNJIA")?"menu7":"menu8"?>" style="width:60px;"><a href="javascript:void(0);" stype="paixu" value="JUNJIA;<?php echo changePxType("JUNJIA",$ordern,$ordert,"up")?>">单价<b class="<?php echo changePxImg("JUNJIA",$ordern,$ordert)?>">&nbsp;</b></a></li>
            </ul>
          </div>
          <input type="hidden" name="ordern" value="<?php echo $ordern?>" id="ordern" />
          <input type="hidden" name="ordert" value="<?php echo $ordert?>" id="ordert" />
        </div>
      </dd>
    </dl>
    <?php }?>
    <div class="clear"></div>
  </form>
</div>
